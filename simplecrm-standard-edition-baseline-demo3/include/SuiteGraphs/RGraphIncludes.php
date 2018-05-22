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

$chart = <<<EOD
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.common.core.js' ></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.common.dynamic.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.common.key.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.common.effects.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.common.tooltips.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.common.context.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.common.annotate.js'></script>

        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.funnel.js' ></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.drawing.rect.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.drawing.text.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.pie.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.bar.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.line.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.radar.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.hbar.js'></script>
        <script type='text/javascript' src='include/SuiteGraphs/rgraph/libraries/RGraph.rose.js'></script>

        <script>
            function rgraphMouseMove(e,shape)
            {
                e.target.style.cursor = 'pointer';
            }

            	var maxYForSmallNumbers = 5;    //The Y axis for bars needs to have at least a max of 5 of it shows (0,0,0,1,1) as per bug 876
                function calculateMaxYForSmallNumbers(dataPoints)
                {
                    var largest = null;
                    if(dataPoints !== undefined && dataPoints.length > 0)
                        largest = Math.max.apply(Math,dataPoints);//http://stackoverflow.com/a/14693622/3894683

                    if(largest === null || largest < maxYForSmallNumbers)
                        largest = maxYForSmallNumbers;
                    return(largest);
                }

            function resizeGraph(graph)
            {
                var maxWidth = 500;
                var maxHeight = 400;
                var maxTextSize = 10;

                if($(window).width() * 0.8 > maxWidth)
                    graph.width  = maxWidth;
                else
                    graph.width = $(window).width() * 0.8;
                if($(window).width() * 0.5 > maxHeight)
                    graph.height = maxHeight;
                else
                    graph.height = $(window).width() * 0.5;



                var text_size = Math.min(12, ($(window).width() / 1000) * 10 );
                if(text_size > maxTextSize) text_size = maxTextSize;
                graph.__object__["properties"]["chart.text.size"] = text_size;
                graph.__object__["properties"]["chart.key.text.size"] = text_size;

                RGraph.redrawCanvas(graph);
            }

            function resizeGraphs()
            {


             var graphs = $(".resizableCanvas");
             $.each(graphs,function(i,v){
                resizeGraph(v);

             });
            }

            $(window).resize(function ()
            {
                resizeGraphs();
            });


            function myPipelineBySalesStageClick(e,bar)
            {
                                if( bar !== undefined
                &&  bar[5] !== undefined
                &&  bar['object'] !== undefined
                &&  bar['object']['properties'] !== undefined
                &&  bar['object']['properties']['chart.tooltips']!== undefined
                &&  bar['object']['properties']['chart.tooltips'][bar[5]] !== undefined)
                {
                    var stage = encodeURI(bar['object']['properties']['chart.labels'][bar[5]]);
                    var graphId = bar[0]['id'];
                    var divHolder = $("#"+graphId).parent();
                    var module = $(divHolder).find(".module").val();
                    var action = $(divHolder).find(".action").val();
                    var query = $(divHolder).find(".query").val();
                    var searchFormTab = $(divHolder).find(".searchFormTab").val();
                    var userId = $(divHolder).find(".userId").val();
                    var startDate = encodeURI($(divHolder).find(".startDate").val());
                    var endDate = encodeURI($(divHolder).find(".endDate").val());
                    window.open('index.php?module='+module+'&action='+action+'&query='+query+'&searchFormTab='+searchFormTab+'&assigned_user_id[]='+userId+'&date_closed_advanced_range_choice=between&start_range_date_closed_advanced='+startDate+'&end_range_date_closed_advanced='+endDate+'&sales_stage_advanced[]='+stage,'_self');
                }
            }

            function outcomeByMonthClick(e,bar)
            {
                 if( bar !== undefined
                &&  bar[5] !== undefined
                &&  bar['object'] !== undefined
                &&  bar['object']['properties'] !== undefined
                &&  bar['object']['properties']['chart.tooltips']!== undefined
                &&  bar['object']['properties']['chart.tooltips'][bar[5]] !== undefined)
                {
                    var info = bar['object']['properties']['chart.tooltips'][bar[5]];
                    var stage = $(info).find('.stage').val();
                    var date = $(info).find('.date').val();

                    stage = encodeURI($.trim(stage));
                    date = encodeURI($.trim(date));
                    //console.log(stage + ' ' + date);
                    window.open('index.php?module=Opportunities&action=index&query=true&searchFormTab=advanced_search&date_closed_advanced='+date+'&sales_stage='+stage,'_self');
                }
            }

            function allOpportunititesByLeadSourceByOutcomeClick(e,bar)
            {
                if( bar !== undefined
                &&  bar[5] !== undefined
                &&  bar['object'] !== undefined
                &&  bar['object']['properties'] !== undefined
                &&  bar['object']['properties']['chart.tooltips']!== undefined
                &&  bar['object']['properties']['chart.tooltips'][bar[5]] !== undefined)
                {
                    var info = bar['object']['properties']['chart.tooltips'][bar[5]];
                    var stage = $(info).find('.stage').val();
                    var category = $(info).find('.category').val();

                    stage = encodeURI($.trim(stage));
                    category = encodeURI($.trim(category));
                    window.open('index.php?module=Opportunities&action=index&query=true&searchFormTab=advanced_search&lead_source='+category+'&sales_stage='+stage,'_self');
                }
            }

            function opportunitiesByLeadSourceDashletClick(e,bar)
            {
            if(bar['object']!== undefined && bar['object']['id']!==undefined)
            {
                var graphId = bar['object']['id'];
                var divHolder = $("#"+graphId).parent();
                var module = $(divHolder).find(".module").val();
                var action = $(divHolder).find(".action").val();
                var query = $(divHolder).find(".query").val();
                var searchFormTab = $(divHolder).find(".searchFormTab").val();

                var labels = bar["object"]["properties"]["chart.labels"];
                var clicked = encodeURI(labels[bar[5]]);

                window.open('index.php?module='+module+'&action='+action+'&query='+query+'&searchFormTab='+searchFormTab+'&lead_source='+clicked,'_self');
            }
                else
                alert("Sorry, there has been an error with the click-through event");
            }

            function myFunnelClick(e,bar)
            {
            if(bar[0]!== undefined && bar[0]['id']!==undefined)
            {
                var graphId = bar[0]['id'];
                var divHolder = $("#"+graphId).parent();
                var module = $(divHolder).find(".module").val();
                var action = $(divHolder).find(".action").val();
                var query = $(divHolder).find(".query").val();
                var searchFormTab = $(divHolder).find(".searchFormTab").val();
                var startDate = $(divHolder).find(".startDate").val();
                var endDate = $(divHolder).find(".endDate").val();

                var labels = bar["object"]["properties"]["chart.labels"];
                var keys = window["chartHBarKeys"+graphId];
                var clicked = encodeURI(keys[bar[5]]);

                window.open('index.php?module='+module+'&action='+action+'&query='+query+'&searchFormTab='+searchFormTab+'&start_range_date_closed='+startDate+'&end_range_date_closed='+endDate+'&sales_stage='+clicked,'_self');
            }
                else
                alert("Sorry, there has been an error with the click-through event");
            }
        </script>
EOD;
echo($chart);
