{*
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 
 * SimpleCRM standard edition is an extension to SuiteCRM 7.8.5 and SugarCRM Community Edition 6.5.24. 
 * It is developed by SimpleCRM (https://www.simplecrm.com.sg)
 * Copyright (C) 2016 - 2017 SimpleCRM
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 
 * SimpleCRM standard edition is an extension to SuiteCRM 7.8.5 and SugarCRM Community Edition 6.5.24. 
 * It is developed by SimpleCRM (https://www.simplecrm.com.sg)
 * Copyright (C) 2016 - 2017 SimpleCRM
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

*}

{php}
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
{/php}

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

                    {php}
                        
                        if($result_charts->num_rows > 0){
                                echo '<option value="">Select Report</option>';
                            while($rows_charts = $db->fetchByAssoc($result_charts)){
                                echo '<option value="'.$rows_charts['id'].'">'.$rows_charts['name'].'</option>';
                            }
                        }else{
                            echo '<option value="">No Data</option>';
                        }
                        
                    {/php}
                </select>
            </div>
            <div id="chart_values" class="row ptop5 col-md-12"></div>

        </div>
    </div>
</div>
<!--Generic Intelligence Panel-->
{literal}
    <script src="modules/AOR_Reports/AOR_Report.js"></script>
    <script type="text/javascript">
                    var last = '{/literal}{$last_report_id}{literal}';

                    function getIntelReports() {
                        var id = $('#intel_pane_select').val();
                        var u_id = '{/literal}{$user_id}{literal}';
                        var module_name = '{/literal}{$smarty.request.module}{literal}';

                        var str = '<div class="loader_pane"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';
                        $('#chart_values').html(str);
                        $.ajax({
                            url: 'intelligence_pane.php',
                            data: {id: id, module: module_name, user_id: u_id},
                            type: 'post',
                            success: function (data) {
                                var obj = data;
                                $('#chart_values').html(obj);

                            }
                        });
                    }


                    $(document).ready(function () {
                        $('#intel_pane_select').val(last);
                        getIntelReports();
                    });
    </script>
{/literal}
