<?php


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

 /**
 * 
 * 
 * @package 
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */
require_once 'include/MVC/View/views/view.detail.php';
require_once 'modules/AOW_WorkFlow/aow_utils.php';
require_once 'modules/AOR_Reports/aor_utils.php';
class AOR_ReportsViewDetail extends ViewDetail {

    private function getReportParameters(){
        if(!$this->bean->id){
            return array();
        }
        $conditions = $this->bean->get_linked_beans('aor_conditions','AOR_Conditions', 'condition_order');
        $parameters = array();
        foreach($conditions as $condition){
            if(!$condition->parameter){
                continue;
            }
            $condition->module_path = implode(":",unserialize(base64_decode($condition->module_path)));
            if($condition->value_type == 'Date'){
                $condition->value = unserialize(base64_decode($condition->value));
            }
            $condition_item = $condition->toArray();
            $display = getDisplayForField($condition->module_path, $condition->field, $this->bean->report_module);
            $condition_item['module_path_display'] = $display['module'];
            $condition_item['field_label'] = $display['field'];
            if(!empty($this->bean->user_parameters[$condition->id])){
                $param = $this->bean->user_parameters[$condition->id];
                $condition_item['operator'] = $param['operator'];
                $condition_item['value_type'] = $param['type'];
                $condition_item['value'] = $param['value'];
            }
            if(isset($parameters[$condition_item['condition_order']])) {
                $parameters[] = $condition_item;
            }
            else {
                $parameters[$condition_item['condition_order']] = $condition_item;
            }
        }
        return $parameters;
    }

    public function preDisplay() {
        global $app_list_strings;
        parent::preDisplay();
        $this->ss->assign('report_module',$this->bean->report_module);



        $this->bean->user_parameters = requestToUserParameters();

        //$reportHTML = $this->bean->build_group_report(0,true);
        $reportHTML = $this->bean->buildMultiGroupReport(0,true);

        $chartsHTML = $this->bean->build_report_chart(null, AOR_Report::CHART_TYPE_RGRAPH);

        $chartsPerRow = $this->bean->graphs_per_row;

        $this->ss->assign('charts_content', $chartsHTML);

        $this->ss->assign('report_content', $reportHTML);

        echo "<input type='hidden' name='report_module' id='report_module' value='{$this->bean->report_module}'>";
        if (!is_file('cache/jsLanguage/AOR_Conditions/' . $GLOBALS['current_language'] . '.js')) {
            require_once ('include/language/jsLanguage.php');
            jsLanguage::createModuleStringsCache('AOR_Conditions', $GLOBALS['current_language']);
        }
        echo '<script src="cache/jsLanguage/AOR_Conditions/'. $GLOBALS['current_language'] . '.js"></script>';

        $params = $this->getReportParameters();
        echo "<script>var reportParameters = ".json_encode($params).";</script>";

        $resizeGraphsPerRow = <<<EOD

       <script>
        function resizeGraphsPerRow()
        {
                var maxWidth = 500;
                var maxHeight = 400;
                var maxTextSize = 10;
                var divWidth = $("#detailpanel_report").width();

                var graphWidth = Math.floor(divWidth / $chartsPerRow);

                var graphs = document.getElementsByClassName('resizableCanvas');
                for(var i = 0; i < graphs.length; i++)
                {
                    if(graphWidth * 0.9 > maxWidth)
                    graphs[i].width  = maxWidth;
                else
                    graphs[i].width = graphWidth * 0.9;
                if(graphWidth * 0.9 > maxHeight)
                    graphs[i].height = maxHeight;
                else
                    graphs[i].height = graphWidth * 0.9;


                /*
                var text_size = Math.min(12, (graphWidth / 1000) * 12 );
                if(text_size < 6)text_size=6;
                if(text_size > maxTextSize) text_size = maxTextSize;

                if(     graphs[i] !== undefined
                    &&  graphs[i].__object__ !== undefined
                    &&  graphs[i].__object__["properties"] !== undefined
                    &&  graphs[i].__object__["properties"]["chart.text.size"] !== undefined
                    &&  graphs[i].__object__["properties"]["chart.key.text.size"] !== undefined)
                 {
                    graphs[i].__object__["properties"]["chart.text.size"] = text_size;
                    graphs[i].__object__["properties"]["chart.key.text.size"] = text_size;
                 }
                //http://www.rgraph.net/docs/issues.html
                //As per Google Chrome not initially drawing charts
                RGraph.redrawCanvas(graphs[i]);
                */
                }
                if (typeof RGraph !== 'undefined') {
                    RGraph.redraw();
                }
        }
        </script>

EOD;



        echo $resizeGraphsPerRow;
        echo "<script> $(document).ready(function(){resizeGraphsPerRow();}); </script>";
        echo "<script> $(window).resize(function(){resizeGraphsPerRow();}); </script>";

    }



}
