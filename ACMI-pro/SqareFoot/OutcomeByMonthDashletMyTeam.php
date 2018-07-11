<?php
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
/* * *******************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
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
 * ****************************************************************************** */





require_once('include/Dashlets/DashletGenericChart.php');

class OutcomeByMonthDashletMyTeam extends DashletGenericChart {

    public $obmdmt_ids = array();
    public $obmdmt_date_start;
    public $obmdmt_date_end;

    /**
     * @see DashletGenericChart::$_seedName
     */
    protected $_seedName = 'Opportunities';

    /**
     * @see DashletGenericChart::__construct()
     */
    public function __construct(
    $id, array $options = null
    ) {
        global $timedate;

        if (empty($options['obmdmt_date_start']))
            $options['obmdmt_date_start'] = $timedate->nowDbDate();

        if (empty($options['obmdmt_date_end']))
            $options['obmdmt_date_end'] = $timedate->asDbDate($timedate->getNow()->modify("+6 months"));

        parent::__construct($id, $options);
    }

    /**
     * @see DashletGenericChart::displayOptions()
     */
    public function displayOptions() {
//        if (!isset($this->obmdmt_ids) || count($this->obmdmt_ids) == 0)
//            $this->_searchFields['obmdmt_ids']['input_name0'] = array_keys(get_user_array(false));

        return parent::displayOptions();
    }

    /**
     * @see DashletGenericChart::display()
     */
    public function display() {

        $currency_symbol = $GLOBALS['sugar_config']['default_currency_symbol'];

        if ($GLOBALS['current_user']->getPreference('currency')) {

            $currency = new Currency();
            $currency->retrieve($GLOBALS['current_user']->getPreference('currency'));
            $currency_symbol = $currency->symbol;
        }
        $thousands_symbol = translate('LBL_OPP_THOUSANDS', 'Charts');
        $module = 'Opportunities';
        $action = 'index';
        $query = 'true';
        $searchFormTab = 'advanced_search';
        $groupBy = array('m', 'sales_stage',);


        $data = $this->getChartData($this->constructQuery());

        //I have taken out the sort as this will throw off the labels we have calculated
        $data = $this->sortData($data, 'm', false, 'sales_stage', true, true);

        //If Sales stage is empty so automaically generating empty sales stage array element by roshan sarode 22-5-18
        foreach ($data as $k => $v) {
            //   $smys =  $GLOBALS['app_list_strings']['sales_stage_dom'];
            $dataunique[] = $v['sales_stage'];
        }
        foreach ($GLOBALS['app_list_strings']['sales_stage_dom'] as $k => $v) {
            //   $smys =  $GLOBALS['app_list_strings']['sales_stage_dom'];
            $allsalesstages[] = $v;
        }
        $unique_sales_stages = array_unique($dataunique);
        $count_sales_stages = count($unique_sales_stages);
        $result_unique = array_diff($GLOBALS['app_list_strings']['sales_stage_dom'], $unique_sales_stages);


        $total_months = (count($data) / count($unique_sales_stages));
        if (count($result_unique) > 0) {

            foreach ($result_unique as $k => $v) {

                $get_missing[] = array_search($GLOBALS['app_list_strings']['sales_stage_dom'][$k], $allsalesstages);
            }

            foreach ($get_missing as $v) {
                $dom_value = array_search($allsalesstages[$v], $result_unique);

                array_splice($data, $v, 0, array(array('total' => 0, 'count' => 0, 'm' => $data[$v]['m'], 'sales_stage' => $allsalesstages[$v], 'sales_stage_dom_option' => $dom_value)));
                $plus = 1;
                for ($i = 0; $i < $total_months - 1; $i++) {
                    $plus = $plus + $count_sales_stages + $v;
                    // $data[$plus]=array('total'=>0,'count'=>0,'m'=>$data[$plus]['m'],'sales_stage'=>$allsalesstages[$v],'sales_stage_dom_option'=>$dom_value);
                    array_splice($data, $plus, 0, array(array('total' => 0, 'count' => 0, 'm' => $data[$plus]['m'], 'sales_stage' => $allsalesstages[$v], 'sales_stage_dom_option' => $dom_value)));
                }
                unset($plus);
            }
        }
        //If Sales stage is empty so automaically generating empty sales stage array element by roshan sarode 22-5-18
        //  print_r($data);

        $chartReadyData = $this->prepareChartData($data, $currency_symbol, $thousands_symbol);
        $canvasId = 'rGraphOutcomeByMonth' . uniqid();
        $chartWidth = 500;
        $chartHeight = 400;
        $autoRefresh = $this->processAutoRefresh();

        //    $chartReadyData['data'] = [[1.1,2.2],[3.3,4.4]];
        // $jsonData = json_encode($chartReadyData['data']);
        // $jsonLabels = json_encode($chartReadyData['labels']);
        // $jsonLabelsAndValues = json_encode($chartReadyData['labelsAndValues']);
        //echo $jsonTooltips;
//
//
        $jsonKey = json_encode($chartReadyData['key']);
        //print_r($chartReadyData['key']);
        //print_r($jsonKey);
        //$jsonTooltips = json_encode($chartReadyData['tooltips']);
//
//        $colours = "['#a6cee3','#1f78b4','#b2df8a','#33a02c','#fb9a99','#e31a1c','#fdbf6f','#ff7f00','#cab2d6','#6a3d9a','#ffff99','#b15928']";


        if (!is_array($chartReadyData['data']) || count($chartReadyData['data']) < 1) {
            return "<h3 class='noGraphDataPoints'>$this->noDataMessage</h3>";
        }


        $chartHeight = $chartHeight . "px";
        $chartWidth = $chartWidth . "px";
        $bar_lv = $chartReadyData['labels'];
        $bar_dv = $chartReadyData['data'];
        // print_r($bar_dv);

        $barcomb_arr = array_combine(array_values($bar_lv), array_values($bar_dv));

        $colours = array('#3366CC', '#DC3912', '#FF9900', '#109618', '#990099', '#3B3EAC', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395', '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300', '#8B0707', '#329262', '#5574A6', '#3B3EAC');

        $colur_count = 1;

        foreach ($barcomb_arr as $k => $v) {
// if(!empty($k)){

            $col_color = $colours[$colur_count++];
            if (empty($col_color)) {
                $col_color = "blue";
            }
            $bar_cht .= "['" . $k . "'," . implode(',', $v) . "],";
            //}
        }
        //$bar_cht=rtrim($bar_cht,",");
//           print_r($bar_cht);
//        echo "<pre>";
//       print_r($bar_lv);
        //print_r($GLOBALS['sugar_config']['site_url']);
        //print_r($bar_cht);

        $url = $GLOBALS['sugar_config']['site_url'];
        $smys = $GLOBALS['app_list_strings']['sales_stage_dom'];
        $obmdmt_date_start = $this->obmdmt_date_start;
        $obmdmt_date_end = $this->obmdmt_date_end;
        $chart = <<<EOD
                
                 <script type="text/javascript">
              
      $(document).ready(function(){
               
			$(window).resize(function(){
			obmdmt_drawChart();
			});
function highlightBar(chart, options, view) {
    var selection = chart.getSelection();
    if (selection.length) {
        var row = selection[0].row;
        var column = selection[0].column;


        //1.insert style role column to highlight selected column 
        var styleRole = {
            type: 'string',
            role: 'style',
            calc: function (dt, i) {
                return (i == row) ? 'stroke-color: #000000; stroke-width: 2' : null;
            }
        };
        var indexes = [0, 1, 2, 3, 4, 5, 6];
        var styleColumn = obmdmt_findStyleRoleColumn(view)
        if (styleColumn != -1 && column > styleColumn)
            indexes.splice(column, 0, styleRole);
        else
            indexes.splice(column + 1, 0, styleRole);
        view.setColumns(indexes);
        //2.redraw the chart
        chart.draw(view, options);
    }
}

function obmdmt_findStyleRoleColumn(view) {
    for (var i = 0; i < view.getNumberOfColumns() ; i++) {
        if (view.getColumnRole(i) == "style") {
            return i;
        }
    }
    return -1;
}
function obmdmt_drawChart() {
var h = $jsonKey;
h.unshift('Year');
var data = google.visualization.arrayToDataTable([h,$bar_cht]);

    var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
    };

     var formatter = new google.visualization.NumberFormat({prefix: 'Rs ',suffix:'K'});
        formatter.format(data, 1);             
        formatter.format(data, 2);             
        formatter.format(data, 3);             
        formatter.format(data, 4);             
    var chart = new google.visualization.ColumnChart(document.querySelector('#chart_div_myteam$canvasId'));
        
   google.visualization.events.addListener(chart, 'select', selectHandler);
 function selectHandler() {
    var selection = chart.getSelection();
   var str = '';
   var ddd = '';
   var type = '';
   var type1 = '';
   var uuu = '$url';
    for (var i = 0; i < selection.length; i++) {
        var item = selection[i];
        str = data.getFormattedValue(item.row, item.column);
        ddd = data.getValue(chart.getSelection()[0].row, 0);
        type = item.column;
    }
                
    if(type == 1){
        type1 = 'Draft';
   }else if(type == 2){
       type1 = 'Negotiation/Review';
   }else if(type == 3){
       type1 = 'Closed Won';
   }else{
       type1 = 'Closed Lost';
   }
        var st_range = coverttoDateFormat(ddd,1);
        var end_range = coverttoDateFormat(ddd,0);
        var url = uuu+'/index.php?module=Opportunities&action=index&query=true&searchFormTab=advanced_search&date_closed_advanced_range_choice=between&end_range_date_closed_advanced='+end_range+'&sales_stage_advanced[]='+type1+'&start_range_date_closed_advanced='+st_range;    
     location.href= url;         
}

    google.visualization.events.addListener(chart, 'onmouseover', obmdmt_uselessHandler2);
    google.visualization.events.addListener(chart, 'onmouseout', obmdmt_uselessHandler3);            
        
     // use the 'ready' event to modify the chart once it has been drawn
  google.visualization.events.addListener(chart, 'ready', function () {
    var axisLabels = document.querySelector('#chart_div_myteam$canvasId').getElementsByTagName('text');
    for (var i = 0; i < axisLabels.length; i++) {
      if (axisLabels[i].getAttribute('text-anchor') === 'end') {
        axisLabels[i].innerHTML = 'Rs ' + axisLabels[i].innerHTML;
      }
    }
  });  
      chart.draw(data, {
        vAxis: { format: 'short', gridlines: {count: 6}, textStyle: {fontSize: 12}, },         
        legend: { position: 'top', maxLines: 3 },
        isStacked: true,
        });
}
google.load('visualization', '1', {packages:['corechart'], callback: obmdmt_drawChart});

  });
    function obmdmt_uselessHandler2() {
        $('#chart_div_myteam$canvasId').css('cursor','pointer')
    }  
    function obmdmt_uselessHandler3() {
        $('#chart_div_myteam$canvasId').css('cursor','default')
    }  
      
   
    function coverttoDateFormat(d1,x) {                    
        var yy,mm,dd,zz,st_m,st_d,en_m,en_d;
        var z =cal_date_format;
        var obmdmt_st = '$obmdmt_date_start';
        var obmdmt_end = '$obmdmt_date_end';
        st_d =   getFistLastDateMonth(obmdmt_st,1);  
        st_m =   getFistLastDateMonth(obmdmt_st,0);  
        en_d =   getFistLastDateMonth(obmdmt_end,1);  
        en_m =   getFistLastDateMonth(obmdmt_end,0);  
         zz = d1.split('-');
         yy = zz[0];
         mm = zz[1];
         var lastday = function(y,m){
            return  new Date(y, m, 0).getDate();
         }
         
         if(mm == st_m && x == 1){
            dd = st_d;
         }else if( mm == en_m && x == 0){
            dd = en_d; 
         }else if (mm != st_m && x == 1){
            dd = '01'; 
         }else if(mm != en_m && x == 0){
            dd = lastday(yy,parseInt(mm)); 
         }else{       
            dd = (x==1)?'01':lastday(yy,parseInt(mm));
         }
        z = z.replace('%Y',yy);
        z = z.replace('%m',mm);
        z = z.replace('%d',dd);
       return z;
    }
    
     function getFistLastDateMonth(d1,x) {                    
                    var yy,mm,dd,zz;
                    var z =cal_date_format; 
                    zz = d1.split('-');
                    yy = zz[0];
                    mm = zz[1];
                    dd = zz[2];
                   return (x==1)?dd:mm;
                }
                 
        </script>


    <div id="chart_div_myteam$canvasId" class="google_chart"></div><br>
                            $autoRefresh

EOD;

        //        <canvas id='$canvasId' class='resizableCanvas'  width='$chartWidth' height='$chartHeight'>[No canvas support]</canvas>
//            $autoRefresh
        $chart1 = <<<EOD
                
                

        <script>
//           var bar = new RGraph.Bar({
//            id: '$canvasId',
//            data:$jsonData,
//            options: {
//                grouping: 'stacked',
//                labels: $jsonLabels,
//                xlabels:true,
//                textSize:10,
//                labelsAbove: true,
//                //labelsAboveSize:10,
//                labelsAboveUnitsPre:'$currency_symbol',
//                labelsAboveUnitsPost:'$thousands_symbol',
//                labelsAbovedecimals: 2,
//                //linewidth: 2,
//                eventsClick:outcomeByMonthClick,
//                //textSize:10,
//                strokestyle: 'white',
//                //colors: ['Gradient(#4572A7:#66f)','Gradient(#AA4643:white)','Gradient(#89A54E:white)'],
//                //shadowOffsetx: 1,
//                //shadowOffsety: 1,
//                //shadowBlur: 10,
//                //hmargin: 25,
//               // colors:$colours,
//                gutterLeft: 60,
//                gutterTop:50,
//                //gutterRight:160,
//                //gutterBottom: 155,
//                //textAngle: 45,
//                backgroundGridVlines: false,
//                backgroundGridBorder: false,
//                tooltips:$jsonTooltips,
//                tooltipsEvent:'mousemove',
//                colors:$colours,
//                key: $jsonKey,
//                keyColors: $colours,
//                keyBackground:'rgba(255,255,255,0.7)',
//                //keyPosition: 'gutter',
//                //keyPositionX: $canvasId.width - 150,
//                //keyPositionY: 18,
//                //keyPositionGutterBoxed: true,
//                axisColor: '#ccc',
//                unitsPre:'$currency_symbol',
//                unitsPost:'$thousands_symbol',
//                keyHalign:'right',
//                tooltipsCssClass: 'rgraph_chart_tooltips_css',
//                noyaxis: true
//            }
//        }).draw();
        /*.on('draw', function (obj)
        {
            for (var i=0; i<obj.coords.length; ++i) {
                obj.context.fillStyle = 'black';
                if(obj.data_arr[i] > 0)
                {
                RGraph.Text2(obj.context, {
                    font:'Arial',
                    'size':10,
                    'x':obj.coords[i][0] + (obj.coords[i][2] / 2),
                    'y':obj.coords[i][1] + (obj.coords[i][3] / 2),
                    'text':obj.data_arr[i].toString(),
                    'valign':'center',
                    'halign':'center'
                });
                }
            }
        }).draw();
        */

        bar.canvas.onmouseout = function (e)
        {
            // Hide the tooltip
            RGraph.hideTooltip();

            // Redraw the canvas so that any highlighting is gone
            RGraph.redraw();
        }
/*
         var sizeIncrement = new RGraph.Drawing.Text({
            id: '$canvasId',
            x: 10,
            y: 20,
            text: 'Opportunity size in ${currency_symbol}1$thousands_symbol',
            options: {
                font: 'Arial',
                bold: true,
                //halign: 'left',
                //valign: 'bottom',
                colors: ['black'],
                size: 10
            }
        }).draw();
*/
</script>
EOD;
        return $chart;
    }

    /**
     * @see DashletGenericChart::constructQuery()
     */
    protected function constructQuery() {

        global $current_user, $db;
        $mysecurity_group = array();
        $query_securitygroup = "SELECT securitygroup_id FROM securitygroups_users WHERE user_id  ='$current_user->id' AND deleted=0 AND primary_group = 1";
        $result = $db->query($query_securitygroup);
        while ($getteams = $db->fetchByAssoc($result)) {
            $mysecurity_group[] = "'" . $getteams['securitygroup_id'] . "'";
        }
        $team_id = implode(',', $mysecurity_group);
        $query = "SELECT sales_stage," .
                db_convert('opportunities.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " as m, " .
                "sum(amount_usdollar/1000) as total, count(*) as opp_count FROM opportunities ";
        if($current_user->is_admin){
            
        }else{
        $query .= " LEFT JOIN securitygroups_records sg ON opportunities.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = opportunities.assigned_user_id ";
        }
        $query .= " WHERE opportunities.date_closed >= " . db_convert("'" . $this->obmdmt_date_start . "'", 'date') .
                " AND opportunities.date_closed <= " . db_convert("'" . $this->obmdmt_date_end . "'", 'date') .
                " AND opportunities.deleted=0";
        if($current_user->is_admin){
            
        }else{
        $query .= " AND  sg.securitygroup_id IN ($team_id) and su.securitygroup_id IN ($team_id) and su.primary_group=1 AND sg.module = 'Opportunities' ";
        }
        /* if (count($this->obmdmt_ids) > 0){
          $query .= " AND opportunities.assigned_user_id IN ('" . implode("','", $this->obmdmt_ids) . "')";
          } */
        $query .= $this->getReportingSubId();
        $query .= " GROUP BY sales_stage," .
                db_convert('opportunities.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) .
                " ORDER BY m";
        //echo $query;
        return $query;
    }

    public function getReportingSubId() {
        global $current_user, $db;
        $logedin_user_id = $current_user->id;
        $sub_id = array();
        $query12 = "SELECT id FROM  users WHERE reports_to_id='$logedin_user_id' and deleted=0";
        $result = $db->query($query12, true);

        while ($getuserids = $db->fetchByAssoc($result)) {
            $sub_id[] = $getuserids['id'];
        }
        if ($logedin_user_id == '8ddc4e2b-b7d6-2fc8-95e8-558b90353953') {
            $sub_id[] = '38db8f0c-82e6-98c4-af06-5997e0ccc431';
        }
        $user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='" . $logedin_user_id . "' and before_value_string='Active' and date_created between '$this->obmdmt_date_start' and '$this->obmdmt_date_end' order by date_created desc limit 0,1";

        $user_audit_result = $db->query($user_audit_query);
        while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
            $sub_id[] = $user_audit_row['parent_id'];
        }
        $count = 0;
        count($sub_id);
       

        while (count($sub_id) > $count) {
            $flag = true;
            $query11 = "SELECT id FROM  users WHERE reports_to_id='" . $sub_id[$count] . "' and deleted=0 and status='Active'";
            $result = $db->query($query11, true);
            while ($getuser = $db->fetchByAssoc($result)) {
                $flag = false;
                $sub_id[] = $getuser['id'];
                $uid[]=$getuser = $db->fetchByAssoc($result);
            }
            print_r($uid);exit;
            //Added by Shakeer to get users list who become inactive during that peroid. 10Sep2015
            if ($flag) {
                $user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='" . $sub_id[$count] . "' and before_value_string='Active' and date_created between '$this->obmdmt_date_start' and '$this->obmdmt_date_end' order by date_created desc limit 0,1";

                $user_audit_result = $db->query($user_audit_query);
                while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
                    $sub_id[] = $user_audit_row['parent_id'];
                }
            }
            //Ended
            $count++;
        }


        $sub_id[] = $logedin_user_id;
        $subids = array();
        foreach ($sub_id as $v) {
            $subids[] = "'" . $v . "'";
        }
        $reporting_ids = implode(',', $subids);

        if ($current_user->is_admin) {
            return " ";
        } else {
            return " AND opportunities.assigned_user_id IN (" . $reporting_ids . ") ";
        }
    }

    protected function prepareChartData($data, $currency_symbol, $thousands_symbol) {
        //Use the  lead_source to categorise the data for the charts
        $chart['labels'] = array();
        $chart['data'] = array();
        //Need to add all elements into the key, as they are stacked (even though the category is not present, the value could be)
        $chart['key'] = array();
        $chart['tooltips'] = array();

        foreach ($data as $i) {
            $key = $i["m"];
            $stage = $i["sales_stage"];
            $stage_dom_option = $i["sales_stage_dom_option"];
            if (!in_array($key, $chart['labels'])) {
                $chart['labels'][] = $key;
                $chart['data'][] = array();
            }
            if (!in_array($stage, $chart['key']))
                $chart['key'][] = $stage;

            $formattedFloat = (float) number_format((float) $i["total"], 2, '.', '');
            $chart['data'][count($chart['data']) - 1][] = $formattedFloat;
            $chart['tooltips'][] = "<div><input type='hidden' class='stage' value='$stage_dom_option'><input type='hidden' class='date' value='$key'></div>" . $stage . '(' . $currency_symbol . $formattedFloat . $thousands_symbol . ') ' . $key;
        }
        return $chart;
    }

    public function custom_build_report_access_query(SugarBean $module, $alias) {

        //echo "sssss";
        $module->table_name = $alias;
        $where = '';
        if ($module->bean_implements('ACL') && ACLController::requireOwner($module->module_dir, 'list')) {
            global $current_user;
            $owner_where = $module->getOwnerWhere($current_user->id);
            $where = ' AND ' . $owner_where;
        }

        if (file_exists('modules/SecurityGroups/SecurityGroup.php')) {
            /* BEGIN - SECURITY GROUPS */
            if ($module->bean_implements('ACL') && ACLController::requireSecurityGroup($module->module_dir, 'list')) {
                require_once('modules/SecurityGroups/SecurityGroup.php');
                global $current_user;
                $owner_where = $module->getOwnerWhere($current_user->id);
                $group_where = SecurityGroup::getGroupWhere($alias, $module->module_dir, $current_user->id);
                if (!empty($owner_where)) {
                    $where .= " AND (" . $owner_where . " or " . $group_where . ") ";
                } else {
                    $where .= ' AND ' . $group_where;
                }
            }
            /* END - SECURITY GROUPS */
        }
        //echo $where; 
        return $where;
    }

}
