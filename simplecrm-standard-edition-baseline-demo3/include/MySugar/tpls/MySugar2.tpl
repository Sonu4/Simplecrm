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





*}
{php}
	global $current_user;
	$customer_360=$_SESSION[$current_user->user_name."_PREFERENCES"]['Home']['pages'][1]['pageTitle'];
	$this->assign("customer_360", $customer_360);
	$user_id = $current_user->id;
	$user_name = $current_user->user_name;
	$this->assign("user_id", $user_id);
	$this->assign("user_name", $user_name);


{/php}


<style>
    {literal}

        .menu{
            z-index:100;
        }

        .subDmenu{
            z-index:100;
        }

        div.moduleTitle {
            height: 10px;
        }

        .form_div_360
        {
            margin: 10px 0 0px 15px !important;
        }	
        .blue_btn
        {
            background-color:#2767A8 !important;color:white !important;
        }
        .dashletPanel
        {
            margin: 0px 15px 25px 0px;
        }
        .nav > li > a {
            padding: 8px 15px 8px 15px !important;
        }
    {/literal}	
</style>
{if $smarty.session.current_tab=='1' && $customer_360=="Customer 360"}
    <style>
        {literal}
            .dashlet_loader{
                margin:auto;
                margin:10% 45%;
            }
            #suggest-list{float:left;list-style:none;margin-top:-3px;padding:0;width:170px;position: absolute;z-index: 10;max-height:350px;border:1px solid #dad9d9;overflow:auto;}
            #suggest-list li{padding: 5px; background: #fff; }
            #suggest-list li:hover{background:#f5f5f5;cursor: pointer;}
            #auto_search{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}

            .flip_front,.flip_back {-webkit-backface-visibility: hidden !important;-moz-backface-visibility: hidden !important;-o-backface-visibility: hidden !important;backface-visibility: hidden !important;width:100%;height:100%;display:block;-webkit-perspective: 0;-webkit-transform: translate3d(0,0,0);visibility:visible;}

            .flip_back{-webkit-transform: rotateY( 180deg )!important;-moz-transform: rotateY( 180deg )!important;-o-transform: rotateY( 180deg )!important;transform: rotateY( 180deg )!important;}

            .flipped{-webkit-transform: rotateY( -180deg )!important;-moz-transform: rotateY( -180deg )!important;-o-transform: rotateY( -180deg )!important;transform: rotateY( -180deg )!important;}

            .custom_dashlet_container
            {
                -webkit-transition: -webkit-transform 1s !important;-moz-transition: -moz-transform 1s !important;-o-transition: -o-transform 1s !important;transition: transform 1s !important;-webkit-transform-style: preserve-3d !important;-moz-transform-style: preserve-3d !important;-o-transform-style: preserve-3d !important;transform-style: preserve-3d !important; height: 100%;
            }

            .row_box
            {
                padding:5px 5px 15px 5px;
                word-wrap: break-word;
            }
            .noBullet .active
            {
                margin-top:17px !important;
            }
            .dashletToolSet
            {
                margin:0px;
            }


            /*Generic Side Pane Start
By Swapnil
            */
            .preview_link a{
                color:#000;
            }
            .rating_container{
                text-align:center;
                font-size: 18px;
                color:#ccc;
            }
            .rating_active{
                color:#f5b300;
            }
            .header_pane{
                color:#2767A8;
                font-size:14px;
                padding: 10px 10px 0px;
                border-bottom:1px solid #e8e8e8;

            }
            .field_header{
                color:#000;
                font-weight:bold;
                text-align:right;
            }
            .field_values{
                text-align:left;
            }
            .image_pane{

                padding: 5px;
            }
            .image_pane img{
                width:100px;
                border-radius:50px;
            }
            .ptop5{
                padding-top:10px;
            }
            .loader_pane{
                margin:auto;
                margin:50% 45%;
            }
            .open_intel_pane{
                background: #eee;
                border: 1px solid #bbb;
                display: block;
                font-size: 18px;
                padding: 5px 10px;
                position: fixed;
                right: 0;
                top: 50px;
            }
            .open_intel_pane a{
                color:#000;
            }
            .intel_pane_dd{
                margin:0 auto;
            }
            #chart_values{
                margin:0 auto;
            }
            /*Generic Side Pane End*/

        {/literal}
    </style>
    <script>
        {literal}
            var user_id = "{/literal}{$user_id}{literal}";
            var user_name = "{/literal}{$user_name}{literal}";

//        		document.getElementsByClassName(".flip_open").setAttribute("href", "javascript:void(0)"); 



            $(".flip_open").attr("href", "javascript:void(0)");

            function flipOpen(x) {


                var pid = x.closest(".custom_dashlet_container").prop('id');
                $('#' + pid + ' .flip_back').css({'overflow-y': 'auto', 'overflow-x': 'hidden'});



                dashlet_id = pid.replace("dashlet_entire_", "");
                var str = '<div class="dashlet_loader"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';
                $("#" + pid + " .flip_back_inner").html(str);
                //  alert(user_id)
                var stuff = x.data('stuff');
                $.ajax({
                    url: "get_flip_data_dashlet.php",
                    type: "post",
                    data: {stuff: stuff, dashlet_id: dashlet_id, user_id: user_id},
                    success: function (result) {
                        $("#" + pid + " .flip_back_inner").html(result);
                        //alert(result); 
                    }});


            }

            function flipbackClose(x)
            {
                x.closest('.flip_back').css({'overflow-y': 'hidden', 'overflow-x': 'hidden'});

            }

            $(document).ready(function () {



                $(".flip_back .dashletToolSet").html('<a href="javascript:void(0)" class="flip_open pull-right" onclick="flipbackClose($(this));"><i class="fa fa-lg fa-arrows-h" aria-hidden="true"></i></a>');

                $('.flip_front').each(function () {
                    var id = $(this).parent('div').prop('id');


                    var frontHeight = $('#' + id + ' .flip_front').outerHeight();
                    var backHeight = $('#' + id + ' .flip_back').outerHeight();

                    if (frontHeight > backHeight) {
                        $('#' + id).css('height', frontHeight);
                        $('#' + id + ' .flip_front, #' + id + ' .flip_back').css('position', 'absolute');
                    } else {
                        $('#' + id).css('height', backHeight);
                        $('#' + id + ' .flip_front, #' + id + ' .flip_back').css('position', 'absolute');
                    }
                });
                $(".flip_open, .flip_back .dashletToolSet .flip_open").click(function () {
                    var id = $(this).closest('.custom_dashlet_container').prop('id');

                    $('#' + id).toggleClass('flipped');
                })


                $("#pageContainer .auto_search").keyup(function () {
                    var pid = $(this).parent('div').children('.show-suggesstion').prop('id');

                    var name = $("#name").val();
                    var phone_no = $("#phone_no").val();
                    var email_id = $("#email_id").val();
                    var val = $(this).val();
                    var id = (this.id);
                    $.ajax({
                        type: "POST",
                        url: "fetch_360_suggesstion.php",
                        data: {keyword: val, id: id, name: name, phone_no: phone_no, email_id: email_id},
                        beforeSend: function () {
                            $(this).css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                        },
                        success: function (data) {
                            //alert(data)
                            $("#" + pid).show();
                            $("#" + pid).html(data);
                            $(this).css("background", "#FFF");
                        }
                    });
                });

                $(".submit_customer_360").click(function () {

                    var name = $("#name").val();
                    var phone_no = $("#phone_no").val();
                    var email_id = $("#email_id").val();
                    if (name == "" && account_no == "" && nic_no == "")
                    {
                        $("#error_blank_360").html("Pease enter Customer name, Account No. or NIC No. ")
                        return false;
                    } else {
                        $("#error_blank_360").html("");
                        var customer_id = $("#retail_customer_id").val();

                        $.ajax({
                            url: "get_retail_customer_data.php",
                            type: "post",
                            data: {name: name, phone_no: phone_no, email_id: email_id, customer_id: customer_id, user_id: user_id, user_name: user_name},
                            success: function (result) {
                                var obj = JSON.parse(result);
                                //alert(obj.query);

                                //console.log(">>>>"+obj);
                                if (obj.no_data == "No Data")
                                {
                                    $(".custom_retail_customer_dashlet").html("<div class='header_pane'><h3><strong>No Data</strong></h3></div><table style='width:100%;' ><tr><td > </td></tr></table>");
                                } else
                                {

                                    $(".custom_retail_customer_dashlet").html(obj.html);
                                }
                                retrievePage(1);

                            }});
                    }
                })

                $.ajax({
                    url: "get_retail_customer_data.php",
                    type: "post",
                    data: {user_id: user_id, user_name: user_name},
                    success: function (result) {
                        //alert(result); 
                        var obj = JSON.parse(result);

                        //console.log(">>>>"+obj);
                        if (obj.no_data == "No Data")
                        {
                            $(".custom_retail_customer_dashlet").html("<div class='header_pane'><h3><strong>No Data</strong></h3></div><table style='width:100%'><tr><td > </td></tr></table>");
                        } else
                        {

                            $(".custom_retail_customer_dashlet").html(obj.html);
                        }




                    }});

                $(".dashletToolSet a .fa-close").parent("a").hide();



            })



            function selectDataSuggest(val, input_field, record_id) {

                val = val.replace("&#039;", "'");
                $("#" + input_field).val(val);
                $(".show-suggesstion").hide();
//$("#retail_customer_id"+input_field).val(record_id);
            }





        {/literal}
    </script>
{/if}





{sugar_getscript file="cache/include/javascript/sugar_grp_yui_widgets.js"}
{sugar_getscript file='include/javascript/dashlets.js'}

{$chartResources}
{$mySugarChartResources}

<div class="clear"></div>
<div id="pageContainer" class="yui-skin-sam">
    <div id="pageNum_{$activePage}_div">

        {if $smarty.session.current_tab=='1' && $customer_360=="Customer 360"}
            <div class="form_div_360">
                <input name="tab_title" id="tab_title" type="hidden">
                <form class="form-inline" autocomplete="off" action="" method="post">

                    <div class="form-group">
                        <input type="hidden" id="retail_customer_id" name="retail_customer_id_name">
                       
                        <input type="text" class="form-control auto_search" id="name" placeholder="Name">
                        <div id="suggesstion-box-name" class="show-suggesstion"></div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control auto_search" id="phone_no" placeholder="Phone No.">
                        <div id="suggesstion-box-pno" class="show-suggesstion"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control auto_search" id="email_id" placeholder="Email Id.">
                        <div id="suggesstion-box-eid" class="show-suggesstion"></div>
                    </div>
                    <div class="form-group" style="vertical-align: bottom;">

                        <button type="button" class="btn btn-primary blue_btn submit_customer_360" ><i class="fa fa-search" aria-hidden="true"></i></button>
                       

                    </div>
                    <div class="form-group text-danger" id="error_blank_360"> </div>
                </form>
            </div>
        {/if}      

        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 5px;">
            <tr>

                <td align='right'>
                    {if !$lock_homepage}<input id="add_dashlets" class="button" type="button" value="{$lblAddDashlets}" onclick="return SUGAR.mySugar.showDashletsDialog();"/>{/if}
                </td>
            </tr>
            <tr>
                <td>

                </td>

            </tr>

            <tr>

                {counter assign=hiddenCounter start=0 print=false}
                {foreach from=$columns key=colNum item=data}
                    <td valign='top' width='{$data.width}'>
                        <ul class='noBullet' id='col_{$activePage}_{$colNum}'>
                            <li id='page_{$activePage}_hidden{$hiddenCounter}b' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
                                {if $smarty.session.current_tab=='1' && $customer_360=="Customer 360"}
                                    {if $activePage=="1" && $colNum=="0"}
                                    <li class='noBullet' id='dashlet_retail_{$id}'>
                                        <div id='dashlet_entire_custom_{$id}' class='dashletPanel  custom_dashlet_container custom_retail_customer_dashlet'>

                                        </div>
                                    </li>
                                {/if}
                            {/if}


                            {foreach from=$data.dashlets key=id item=dashlet}
                                <li class='noBullet' id='dashlet_{$id}'>
                                    <div id='dashlet_entire_{$id}' class='dashletPanel  {if $smarty.session.current_tab=='1' && $customer_360=="Customer 360"}custom_dashlet_container{/if} '>
                                        {if $smarty.session.current_tab=='1' && $customer_360=="Customer 360"}

                                            <div class="flip_front">
                                                {$dashlet.script}
                                                {$dashlet.displayHeader}
                                                {$dashlet.display}
                                                {$dashlet.displayFooter}
                                            </div>
                                            <div class="flip_back" style="overflow-y:auto;overflow-x:hidden">
                                                {$dashlet.script}
                                                {$dashlet.displayHeader} 
                                                <div class="flip_back_inner"></div>
                                                {$dashlet.displayFooter}

                                            </div>       
                                        {else}
                                            {$dashlet.script}
                                            {$dashlet.displayHeader}
                                            {$dashlet.display}
                                            {$dashlet.displayFooter}

                                        {/if}


                                    </div>
                                </li>
                            {/foreach}
                            <li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
                        </ul>
                    </td>
                    {counter}
                {/foreach}
            </tr>
        </table>
    </div>

    {foreach from=$divPages key=divPageIndex item=divPageNum}
        <div id="pageNum_{$divPageNum}_div" style="display:none;">
        </div>
    {/foreach}



    <!--<div id="dashletsDialog" style="display:none;">
            <div class="hd" id="dashletsDialogHeader"><a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.closeDashletsDialog();">
                    <div class="container-close">&nbsp;</div></a>{$lblAdd}
    </div>
    <div class="bd" id="dashletsList">
        <form></form>
    </div>

    </div>-->


</div>
<script type="text/javascript">
    var activePage = {$activePage};
    var theme = '{$theme}';
    current_user_id = '{$current_user}';
    jsChartsArray = new Array();
    var moduleName = '{$module}';
    document.body.setAttribute("class", "yui-skin-sam");
    {literal}
        var mySugarLoader = new YAHOO.util.YUILoader({
            require: ["my_sugar", "sugar_charts"],
            // Bug #48940 Skin always must be blank
            skin: {
                base: 'blank',
                defaultSkin: ''
            },
            onSuccess: function () {
                initMySugar();
                initmySugarCharts();
                SUGAR.mySugar.maxCount = {/literal}{$maxCount}{literal};
                SUGAR.mySugar.homepage_dd = new Array();
                var j = 0;

    {/literal}
                        var dashletIds = {$dashletIds};

    {if !$lock_homepage}
                        for (i in dashletIds) {ldelim}
                                        SUGAR.mySugar.homepage_dd[j] = new ygDDList('dashlet_' + dashletIds[i]);
                                        SUGAR.mySugar.homepage_dd[j].setHandleElId('dashlet_header_' + dashletIds[i]);
                                        // Bug #47097 : Dashlets not displayed after moving them
                                        // add new property to save real id of dashlet, it needs to have ability reload dashlet by id
                                        SUGAR.mySugar.homepage_dd[j].dashletID = dashletIds[i];
                                        SUGAR.mySugar.homepage_dd[j].onMouseDown = SUGAR.mySugar.onDrag;
                                        SUGAR.mySugar.homepage_dd[j].afterEndDrag = SUGAR.mySugar.onDrop;
                                        j++;
        {rdelim}
        {if $hiddenCounter > 0}
                            for (var wp = 0; wp <= {$hiddenCounter}; wp++) {ldelim}
                                            SUGAR.mySugar.homepage_dd[j++] = new ygDDListBoundary('page_' + activePage + '_hidden' + wp);
            {rdelim}
        {/if}
                            YAHOO.util.DDM.mode = 1;
    {/if}
    {literal}
                        SUGAR.mySugar.renderDashletsDialog();
                        SUGAR.mySugar.sugarCharts.loadSugarCharts(activePage);
    {/literal}
    {literal}
                    }
                });
                mySugarLoader.addModule({
                    name: "my_sugar",
                    type: "js",
                    fullpath: {/literal}"{sugar_getjspath file='include/MySugar/javascript/MySugar.js'}"{literal},
                    varName: "initMySugar",
                    requires: []
                });
                mySugarLoader.addModule({
                    name: "sugar_charts",
                    type: "js",
                    fullpath: {/literal}"{sugar_getjspath file="include/SugarCharts/Jit/js/mySugarCharts.js"}"{literal},
                    varName: "initmySugarCharts",
                    requires: []
                });
                mySugarLoader.insert();
    {/literal}
</script>

