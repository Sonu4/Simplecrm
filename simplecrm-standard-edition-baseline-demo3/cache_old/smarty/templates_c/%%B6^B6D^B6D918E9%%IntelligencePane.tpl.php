<?php /* Smarty version 2.6.29, created on 2018-06-23 11:38:17
         compiled from include/ListView/IntelligencePane.tpl */ ?>

<?php 
global $db, $sugar_config,$current_user;
//require_once ('modules/AOR_Reports/controller.php');
 /*For dropdown values of intelligence pane*/
$module_name = $_REQUEST['module'];

$charts = "SELECT DISTINCT (aor_reports.id),aor_charts.id as chart_id, aor_reports.name
FROM `aor_reports` JOIN aor_charts ON aor_reports.id = aor_charts.aor_report_id WHERE aor_reports.report_module ='".$module_name."' AND  aor_reports.deleted =0 AND  aor_charts.deleted =0 GROUP BY aor_reports.id ORDER BY aor_reports.name";
$result_charts = $db->query($charts);


$get_last_report = "SELECT report_id FROM scrm_intelligence_pane WHERE um_id = '".$module_name.":".$current_user->id."' LIMIT 1";
$result_last_report = $db->query($get_last_report);
$row_last_report = $db->fetchByAssoc($result_last_report);

$this->assign("last_report_id", $row_last_report['report_id']);
/*For dropdown values of intelligence pane end*/
$this->assign("user_id", $current_user->id);
 ?>

<!--Generic Intelligence Panel-->
<div class="open_intel_pane" onclick="$('.gen_intel_pane').addClass('show_side_pane');">
    <a href="javascript:void(0);" ><i class="fa fa-angle-double-left"></i></a>
</div>
<div class="gen_intel_pane">
    <div class="intel_pane_container">
        <div class="preview_link">
            <a href="javascript:void(0);" onclick="$('.gen_intel_pane').removeClass('show_side_pane');"><i class="fa fa-angle-double-right"></i> Intelligence Pane</a>
        </div>
        <div id="intel_pane_container_data">
            <div class="row ptop5 col-md-12 intel_pane_dd">
                <select class="form-control" onchange="getIntelReports();" id="intel_pane_select">

                    <?php 
                        
                        if($result_charts->num_rows > 0){
                                echo '<option value="">Select Report</option>';
                            while($rows_charts = $db->fetchByAssoc($result_charts)){
                                echo '<option value="'.$rows_charts['id'].'">'.$rows_charts['name'].'</option>';
                            }
                        }else{
                            echo '<option value="">No Data</option>';
                        }
                        
                     ?>
                </select>
            </div>
            <div id="chart_values" class="row ptop5 col-md-12"></div>

        </div>
    </div>
</div>
<!--Generic Intelligence Panel-->
<?php echo '
    <script src="modules/AOR_Reports/AOR_Report.js"></script>
    <script type="text/javascript">
                    var last = \'';  echo $this->_tpl_vars['last_report_id'];  echo '\';

                    function getIntelReports() {
                        var id = $(\'#intel_pane_select\').val();
                        var u_id = \'';  echo $this->_tpl_vars['user_id'];  echo '\';
                        var module_name = \'';  echo $_REQUEST['module'];  echo '\';

                        var str = \'<div class="loader_pane"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>\';
                        $(\'#chart_values\').html(str);
                        $.ajax({
                            url: \'intelligence_pane.php\',
                            data: {id: id, module: module_name, user_id: u_id},
                            type: \'post\',
                            success: function (data) {
                                var obj = data;
                                $(\'#chart_values\').html(obj);

                            }
                        });
                    }


                    $(document).ready(function () {
                        $(\'#intel_pane_select\').val(last);
                        getIntelReports();
                    });
    </script>
'; ?>
