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

{include file='include/ListView/ListViewColumnsFilterDialog.tpl'}
<script type='text/javascript' src='{sugar_getjspath file='include/javascript/popup_helper.js'}'></script>

{*{php}
$allmodule = array_intersect($GLOBALS['moduleList'],array_keys($GLOBALS['beanList']));
$t = array();
require_once('include/utils.php');
foreach ($allmodule as $key => $value) {
    $t[$value] = translate('LBL_MODULE_NAME', $value);
}
//sort($t);
    
echo "<pre>";
    print_r($t);
echo "</pre>";
    
{/php}*}

<style>
    {literal}
        .main
        {
            margin:0px !important;
            padding:0px !important;
        }
        .search_form .view
        {
            width:100% !important;
        }
        .search
        {
            margin: -10px 0px 0px 0px !important;
            /*padding: 35px 20px 30px 20px !important;*/
        }

        .btn
        {
            border: 1px solid #E1E5EC !important;
        }
        /*
         .list tr.oddListRowS1 td{

             background-color:white !important;
         }
         */

        .listViewThLinkS1 {
            font-weight: normal !important;
        }
        .sumbitButtons button 
        {
            font-size:12px !important;
        }
        .sumbitButtons button i
        {
            font-size:small !important;
        }

        footer
        {
            margin-left:0px !important;
            margin-right:0px !important;
        }
        .checkbox, .radio
        {
            display:inherit !important;
        }
        /*Generic Side Pane Start
        By Swapnil
        */
        .gen_side_pane,.gen_intel_pane{
            background: url("themes/SuiteR/images/texture_5.png");
            background-color:#f5f5f5;
            display: block;
            font-size: 14px;
            height:100%;  
            position: fixed;
            right: -25%;    
            top: 50px;
            bottom:0px;
            transition: right 0.3s ease-in-out 0s;
            width: 25%;
            z-index: 100;
            border-right: 1px solid #aaa;
            padding-bottom:20px;
            box-shadow: 1px 0 12px #ddd;
        }
        .show_side_pane{
            right: 0; 
        }
        .pane_container,.intel_pane_container{
            padding: 6px 10px 10px 10px;

            height:100%;
            overflow-y:auto;
            overflow-x:hidden;
        }
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
            text-align:center;
            font-size:18px;
            padding: 10px;
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
            text-align:center;
            padding: 5px;
        }
        .image_pane img{
            width:80px;
        }
        .ptop5{
            padding-top:10px;
        }
        .loader_pane{
            margin:auto;
            margin:50% 45%;
        }
        .open_intel_pane{
            background: #f3f5f9;
            border: 1px solid #bbb;
            display: block;
            font-size: 25px;
            padding: 2px 15px;
            position: fixed;
            right: 1px;
            top: 50px;
            z-index: 1;
            cursor:pointer;
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

 ul.clickMenu > li
        {
            background-color: #2767A8 !important;
            padding:4px !important;
            border-radius: 0px !important;
        }
        .btnbackcolor
         {
        background-color: #2767A8 !important;
        padding:3px 8px !important;
        color: #ffffff !important;
         }
        .btnbackcolor:hover{
        background: #2767A8 none repeat scroll 0 0 !important;
        color: #000000 !important;
        }
       
       
        .selectActionsDisabled
        {
            background-color: #2767A8 !important;
            margin:0px !important;
            padding: 4px !important;

        }
        .selectActionsDisabled a
        {
            text-shadow: none;
            color:white !important;
        }
        ul.clickMenu li a
        {
           background-color: #2767A8 !important;
           font-size: 13px;
           padding-right: 10px;
           color: white !important;
        }
        .selectmenu .sugar_action_button 
        {
            padding:4px !important;
        }
        ul.clickMenu li ul.subnav li a
        {
        color: #000000 !important;
        }
        td.paginationActionButtons ul.clickMenu .massall
        {
            margin:0px !important;
        }
        .listViewBody{
            margin-top:40px;
        }
        /*-------------Listview checkbox count and action link design changes 16-3-2018 By Roshan Sarode start------------*/
        #selectedRecordsTop, #selectedRecordsBottom {
        color: #fff;
            margin:-3px ;
            padding:0px ;
        }
        ul.clickMenu li span{
            min-width:40px !important;
            margin:0px ;
        }
        #select_actions_disabled_top a, #select_actions_disabled_top span,#select_actions_disabled_bottom a, #select_actions_disabled_bottom span,#actionLinkTop .sugar_action_button #delete_listview_top, #actionLinkTop .sugar_action_button span,#actionLinkBottom .sugar_action_button #delete_listview_bottom, #actionLink_bottom .sugar_action_button span{
            margin-top:-3px;
        }
        /*-------------Listview checkbox count and action link design changes 16-3-2018 By Roshan Sarode end------------*/
        .paginationActionButtons .parent-dropdown-handler label {
        color: #fff;
        }
        
        /*for loader in list view for quick and advanced filter start*/
        #ajaxStatusDiv{
            z-index:999999999;
        }
         /*for loader in list view for quick and advanced filter end*/
         
    ul.SugarActionMenuIESub li a, ul.clickMenu li a, .list tr.pagination td.buttons ul.clickMenu > li > a:link, .list tr.pagination td.buttons ul.clickMenu > li > a {
    margin: 2px 2px 0 2px;
    }
    /*Changes  for listview pagination align center by Roshan Sarode 19-3-18  start*/
    @media screen and (max-width: 970px) {
    .custom_paginationActionsButtons {
        margin:auto;
        max-width:100%;
        text-align:center;
        width:100%;
    }
}
    /*Changes  for listview pagination align center by Roshan Sarode 19-3-18  end*/   
    
    {/literal}
</style>


<script>
    {literal}
    $(document).ready(function () {
      $("ul.clickMenu").each(function (index, node) {
        $(node).sugarActionMenu();
      });

      $('.selectActionsDisabled').children().each(function (index) {
        $(this).attr('onclick', '').unbind('click');
      });

      var selectedTopValue = $("#selectCountTop").attr("value");
      if (typeof(selectedTopValue) != "undefined" && selectedTopValue != "0") {
        sugarListView.prototype.toggleSelected();
      }

            $('.profile_pic_c_custom img').attr('class', 'img-circle');
           

            $('.profile_pic_c_custom img').on('click', function () {
                $('.gen_side_pane').addClass('show_side_pane');
                var str = '<div class="loader_pane"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';
                $('#pane_container_data').html(str);
                var previewid = $(this).parent('td').data('previewid');
                // $(this).closest('table tr').css('background-color','#white !important');
                //$(this).closest('tr').attr('style','background-color:#f5f5f5 !important');
                $.ajax({
                    url: 'customer_preview.php',
                    data: {id: previewid, },
                    type: 'post',
                    success: function (data) {
                        $('#pane_container_data').html(data);
                    }
    });
            });
        });

        

    {/literal}
</script>
{assign var="currentModule" value = $pageData.bean.moduleDir}
{assign var="singularModule" value = $moduleListSingular.$currentModule}
{assign var="moduleName" value = $moduleList.$currentModule}
{assign var="hideTable" value=false}

{if count($data) == 0}
    {assign var="hideTable" value=true}
    <div class="list view listViewEmpty">
        <!--Modified By Swapnil for Notifications Start-->
        <div class="alert alert-info text-center col-lg-6 col-md-6 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3" role="alert">
        {if $displayEmptyDataMesssages}
            {if strlen($query) == 0}
                {capture assign="createLink"}<a href="?module={$pageData.bean.moduleDir}&action=EditView&return_module={$pageData.bean.moduleDir}&return_action=DetailView">{$APP.LBL_CREATE_BUTTON_LABEL|ucfirst} <i class="fa fa-plus" aria-hidden="true"></i>
</a>{/capture}
{capture assign="importLink"}<a href="?module=Import&action=Step1&import_module={$pageData.bean.moduleDir}&return_module={$pageData.bean.moduleDir}&return_action=index">{$APP.LBL_IMPORT|ucfirst} <i class="fa fa-upload" aria-hidden="true"></i></a>{/capture}
                {capture assign="helpLink"}<a target="_blank" href='?module=Administration&action=SupportPortal&view=documentation&version={$sugar_info.sugar_version}&edition={$sugar_info.sugar_flavor}&lang=&help_module={$currentModule}&help_action=&key='>{$APP.LBL_CLICK_HERE}</a>{/capture}
                <p class="msg">
                    {$APP.MSG_EMPTY_LIST_VIEW_NO_RESULTS|replace:"<item2>":$createLink|replace:"<item3>":$importLink}
                    
                </p>
            {elseif $query == "-advanced_search"}
                <p class="msg emptyResults">
                   <i class="fa fa-meh-o fa-2x"></i> {$APP.MSG_LIST_VIEW_NO_RESULTS_CHANGE_CRITERIA} 
                </p>
            {else}
                <p class="msg">
                    {capture assign="quotedQuery"}"{$query}"{/capture}
                    {$APP.MSG_LIST_VIEW_NO_RESULTS|replace:"<item1>":$quotedQuery}
                </p>
                <p class="submsg">
                    <a href="?module={$pageData.bean.moduleDir}&action=EditView&return_module={$pageData.bean.moduleDir}&return_action=DetailView">
                        {$APP.MSG_LIST_VIEW_NO_RESULTS_SUBMSG|replace:"<item1>":$quotedQuery|replace:"<item2>":$singularModule}
                    </a>
                </p>
            {/if}
        {else}
            <p class="msg">
                {$APP.LBL_NO_DATA}
            </p>
        {/if}
        {*{if $showFilterIcon}
            {include file='include/ListView/ListViewSearchLink.tpl'}
        {/if}*}
    </div>
    </div>
   <!--Modified By Swapnil for Notifications End -->     
{/if}
{$multiSelectData}
{if $hideTable == false}
    <!--Generic Side Panel-->
    <div class="gen_side_pane">
        <div class="pane_container">
            <div class="preview_link">
                <a href="javascript:void(0);" onclick="$('.gen_side_pane').removeClass('show_side_pane');"><i class="fa fa-angle-double-right"></i> Preview</a>
            </div>
            <div id="pane_container_data">

            </div>
        </div>
    </div>
    <!--Generic Side Panel end-->


        <!--Generic Intelligence Panel start-->    
        {include file="include/ListView/IntelligencePane.tpl"}
        <!--Generic Intelligence Panel end-->
    
  
    {if $smarty.request.module=="scrm_Retail_Customer"}
        <!--Customer 360 Pop up start-->    
        {include file="include/ListView/Customer360Popup.tpl"}
        <!--Customer 360 Pop up end-->
    {/if}

    <table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view '>
        <thead>
        {assign var="link_select_id" value="selectLinkTop"}
        {assign var="link_action_id" value="actionLinkTop"}
        {assign var="actionsLink" value=$actionsLinkTop}
        {assign var="selectLink" value=$selectLinkTop}
        {assign var="action_menu_location" value="top"}
        {include file='include/ListView/ListViewPagination.tpl'}
            <tr height='20' style="border-bottom: 1px solid #d9dada !important;border-top: 1px solid #d9dada !important;background-color:white !important;">
            {if $prerow}
                    <td width='1%' class="td_alt" style="padding:12px !important;">
                    &nbsp;
                </td>
            {/if}
            {if !empty($quickViewLinks)}
                <td class='td_alt' width='1%' style="padding: 0px;">&nbsp;</td>
            {/if}
            {counter start=0 name="colCounter" print=false assign="colCounter"}
            {assign var='datahide' value="phone"}
            {foreach from=$displayColumns key=colHeader item=params}
                {if $colCounter == '3'}{assign var='datahide' value="phone,phonelandscape"}{/if}
                {if $colCounter == '5'}{assign var='datahide' value="phone,phonelandscape,tablet"}{/if}
            {if $colHeader == 'NAME' || $params.bold}<th scope='col' valign="top" data-toggle="true">
            {else}<th scope='col' valign="top" data-hide="{$datahide}">{/if}

                <div style='white-space: normal;font-weight:bold !important' width='100%' align='{$params.align|default:'left'}' class="text-uppercase">
                    {if $params.sortable|default:true}
                    {if $params.url_sort}
                            <a href='{$pageData.urls.orderBy}{$params.orderBy|default:$colHeader|lower}' class='listViewThLinkS1'>
                        {else}
                        {if $params.orderBy|default:$colHeader|lower == $pageData.ordering.orderBy}
                                    <a href='javascript:sListView.order_checks("{$pageData.ordering.sortOrder|default:ASCerror}", "{$params.orderBy|default:$colHeader|lower}" , "{$pageData.bean.moduleDir}{"2_"}{$pageData.bean.objectName|upper}{"_ORDER_BY"}")' class='listViewThLinkS1'>
                            {else}
                                        <a href='javascript:sListView.order_checks("ASC", "{$params.orderBy|default:$colHeader|lower}" , "{$pageData.bean.moduleDir}{"2_"}{$pageData.bean.objectName|upper}{"_ORDER_BY"}")' class='listViewThLinkS1'>
                                {/if}
                                {/if}
                                    <strong>{sugar_translate label=$params.label module=$pageData.bean.moduleDir}
                                        &nbsp;&nbsp;</strong>
                                {if $params.orderBy|default:$colHeader|lower == $pageData.ordering.orderBy}
                                    {if $pageData.ordering.sortOrder == 'ASC'}
                                        {capture assign="imageName"}arrow_down.{$arrowExt}{/capture}
                                        {capture assign="alt_sort"}{sugar_translate label='LBL_ALT_SORT_DESC'}{/capture}
                                        {sugar_getimage name=$imageName attr='align="absmiddle" border="0" ' alt="$alt_sort"}
                                    {else}
                                        {capture assign="imageName"}arrow_up.{$arrowExt}{/capture}
                                        {capture assign="alt_sort"}{sugar_translate label='LBL_ALT_SORT_ASC'}{/capture}
                                        {sugar_getimage name=$imageName attr='align="absmiddle" border="0" ' alt="$alt_sort"}
                                    {/if}
                                {else}
                                    {capture assign="imageName"}arrow.{$arrowExt}{/capture}
                                    {capture assign="alt_sort"}{sugar_translate label='LBL_ALT_SORT'}{/capture}
                                    {sugar_getimage name=$imageName attr='align="absmiddle" border="0" ' alt="$alt_sort"}
                                {/if}
                            </a>
                            {else}
                            {if !isset($params.noHeader) || $params.noHeader == false}
                                {sugar_translate label=$params.label module=$pageData.bean.moduleDir}
                            {/if}
                            {/if}
                </div>
                </th>
                {counter name="colCounter"}
            {/foreach}
            <th></th>

        </tr>
        </thead>
        {counter start=$pageData.offsets.current print=false assign="offset" name="offset"}
        {foreach name=rowIteration from=$data key=id item=rowData}
            {counter name="offset" print=false}
            {assign var='scope_row' value=true}

            {if $smarty.foreach.rowIteration.iteration is odd}
                {assign var='_rowColor' value=$rowColor[0]}
            {else}
                {assign var='_rowColor' value=$rowColor[1]}
            {/if}
                <tr height='20' class='{$_rowColor}S1' style="background-color:white !important">
                {if $prerow}
                        <td width='1%' class='nowrap'> &nbsp;&nbsp;&nbsp;
                        {if !$is_admin && is_admin_for_user && $rowData.IS_ADMIN==1}
                            <input type='checkbox' disabled="disabled" class='checkbox' value='{$rowData.ID}'>
                        {else}
                                <input title="{sugar_translate label='LBL_SELECT_THIS_ROW_TITLE'}" onclick='sListView.check_item(this, document.MassUpdate)' type='checkbox' class='checkbox' name='mass[]' value='{$rowData.ID}' id="{$rowData.ID}">


                        {/if}
                    </td>
                {/if}
                {if !empty($quickViewLinks)}
                    {capture assign=linkModule}{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$pageData.bean.moduleDir}{/if}{/capture}
                    {capture assign=action}{if $act}{$act}{else}EditView{/if}{/capture}
                    <td width='2%' nowrap>
        {$ActionMenu|replace:'|DATA|':$rowData.ID}
                    </td>

                {/if}
                {counter start=0 name="colCounter" print=false assign="colCounter"}
                {foreach from=$displayColumns key=col item=params}

                    {if $colCounter == '0'}
                        {assign var='hiddenclass' value=""}
                    {elseif $colCounter < '5'}
                        {assign var='hiddenclass' value="hidden-xs"}
                    {elseif $colCounter >= '5'}
                        {assign var='hiddenclass' value="hidden-xs hidden-sm hidden-md"}
                    {/if}
                    {$displayColumns[type]}
                    {strip}
        <td data-previewid="{$rowData[$params.id]|default:$rowData.ID}"  {if $scope_row} scope='row' {/if} align='{$params.align|default:'left'}' valign="top"  type="{$displayColumns.$col.type}" field="{$col|lower}" class="{if $inline_edit && ($displayColumns.$col.inline_edit == 1 || !isset($displayColumns.$col.inline_edit))}inlineEdit{/if}{if ($params.type == 'teamset')}nowrap{/if}{if preg_match('/PHONE/', $col)} phone{/if} {$col|lower}_custom">
            {if $col == 'NAME' || $params.bold}

            {*<b>*}{/if}
                                {if $params.link && !$params.customCode}
                                    {capture assign=linkModule}{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$params.module|default:$pageData.bean.moduleDir}{/if}{/capture}
                                    {capture assign=action}{if $act}{$act}{else}DetailView{/if}{/capture}
                                    {capture assign=record}{$rowData[$params.id]|default:$rowData.ID}{/capture}
                                    {capture assign=url}index.php?module={$linkModule}&offset={$offset}&stamp={$pageData.stamp}&return_module={$linkModule}&action={$action}&record={$record}{/capture}
                                    <{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN} href="{sugar_ajax_url url=$url}">
                                {/if}

                                {if $params.customCode}
    {*							{sugar_evalcolumn_old var=$params.customCode rowData=$rowData}*}
    {assign var='field_name' value=$params.name}
    {assign var='field_name1' value=$field_name|upper}
    {$rowData.$field_name1}

                                {else}


{assign var='dir' value='upload/'}

{if $col=="PROFILE_PIC_C" && $smarty.request.module=="scrm_Retail_Customer" && !file_exists($dir|cat:$rowData.ID|cat:'_profile_pic_c')}

<img id="profile_pic_c" src="custom/themes/default/images/custom_default.png" style="max-width: 200px;" class="img-circle" height="50">


{else} 


        {include file="include/ListView/FieldBackground.tpl"}

{/if}


                                {/if}
                                {if empty($rowData.$col) && empty($params.customCode)}&nbsp;{/if}
                                {if $params.link && !$params.customCode}
                            </{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN}>
                            {/if}
{if $inline_edit && ($displayColumns.$col.inline_edit == 1 || !isset($displayColumns.$col.inline_edit))}<div class="inlineEditIcon">{sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div>{/if}
                        </td>
                    {/strip}
                    {assign var='scope_row' value=false}
                    {counter name="colCounter"}

                {/foreach}
<td align='right' style="padding:0px 15px 0px 0px !important;"><a title="Preview" style="cursor:pointer;color:#6d6d6d !important">{$pageData.additionalDetails.$id}</a></td>
            </tr>
            {foreachelse}
            <tr height='20' class='{$rowColor[0]}S1'>
                <td colspan="{$colCount}">
                    <em>{$APP.LBL_NO_DATA}</em>
                </td>
            </tr>
        {/foreach}
        {assign var="link_select_id" value="selectLinkBottom"}
        {assign var="link_action_id" value="actionLinkBottom"}
        {assign var="selectLink" value=$selectLinkBottom}
        {assign var="actionsLink" value=$actionsLinkBottom}
        {assign var="action_menu_location" value="bottom"}
        {include file='include/ListView/ListViewPagination.tpl'}
    </table>
{/if}
{if $contextMenus}
    <script type="text/javascript">
        {$contextMenuScript}
        {literal}
        function lvg_nav(m, id, act, offset, t) {
          if (t.href.search(/#/) < 0) {
            return;
          }
          else {
            if (act == 'pte') {
              act = 'ProjectTemplatesEditView';
            }
            else if (act == 'd') {
              act = 'DetailView';
            } else if (act == 'ReportsWizard') {
              act = 'ReportsWizard';
            } else {
              act = 'EditView';
            }
              {/literal}
            url = 'index.php?module=' + m + '&offset=' + offset + '&stamp={$pageData.stamp}&return_module=' + m + '&action=' + act + '&record=' + id;
            t.href = url;
              {literal}
          }
        }{/literal}
        {literal}
        function lvg_dtails(id) {{/literal}
                    return SUGAR.util.getAdditionalDetails('{$pageData.bean.moduleDir|default:$params.module}', id, 'adspan_' + id);{literal}
                }{/literal}

                {literal}
                    function DeleteRecord(id, module, action) {

                        // t=document.getElementById(id).checked = true;
                        // // sListView.check_item(document.getElementById(id), document.MassUpdate);
                        // var r = sListView.send_mass_update('selected','Please select at least 1 record to proceed.', 1);

                        // r?'':document.getElementById(id).checked = false;
                        if (confirm("Are you sure, you want to delete this record?")) {

                            $.ajax({
                                url: 'custom_actions.php',
                                data: {id: id, module: module, action: action},
                                type: 'post',
                                success: function (data) {

                                    //console.log(data);
                                    //alert(data);
                                    if (data == "_success") {

                                        alert("1 Record has been deleted successfully !");
                                        location.reload(true);

                                    } else {

                                        alert("There is some problem, please contact administrator");
                                        location.reload(true);
                                    }
                                }
                            });
                        }
                    }
                {/literal}
    </script>
    <script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
{/if}
