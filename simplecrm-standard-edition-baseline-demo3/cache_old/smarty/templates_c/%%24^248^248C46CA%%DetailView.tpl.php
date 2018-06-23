<?php /* Smarty version 2.6.29, created on 2018-06-23 11:38:23
         compiled from include/DetailView/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'include/DetailView/DetailView.tpl', 312, false),array('function', 'sugar_evalcolumn', 'include/DetailView/DetailView.tpl', 419, false),array('function', 'sugar_field', 'include/DetailView/DetailView.tpl', 424, false),array('modifier', 'upper', 'include/DetailView/DetailView.tpl', 319, false),array('modifier', 'count', 'include/DetailView/DetailView.tpl', 363, false),)), $this); ?>
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

<?php if ($this->_tpl_vars['module']): ?>

<style>
    {literal}

        ul.clickMenu > li
        {
            background: #2767A8 !important;
            border-radius: 0px !important; 
        }
        ul.clickMenu > li:first-child a
        {
            color:white !important;
            background: #2767A8 !important;
        }
        ul.history_acitvities_button > li
        {
            background: #fff !important;
            border-radius: 3px !important; 	
        }
        ul.clickMenu li ul.subnav li a
        {
            color: #000000 !important;
        }
        #dialog
        {
            display:none;
        }
        i
        {
            display:none;
        }
        b
        {
            font-weight:normal;
        }
        .show_primary_email span table tbody tr:not(:first-child) {
            display:none;
        }
        ul.round-button li
        {
            background-color: #fff !important;
        }



        input[value="Copy..."] { display: none !important; }​



        .yui-navset .yui-content, .yui-navset .yui-navset-top .yui-content {

            padding: 0px !important;
        }
        ul.clickMenu li ul.subnav, ul.clickMenu ul.subnav-sub, ul.SugarActionMenuIESub, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a, ul.clickMenu li ul.subnav, ul.clickMenu ul.subnav-sub, ul.SugarActionMenuIESub, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a{
            color:#000000 !important;
        }


    {/literal}
</style>

<script >
    {literal}

    $(document).ready(function () {
        $(".dataField").css("display", "none");
        $('#Activities_createtask_button').attr('data-toggle', 'modal');
        $('#Activities_createtask_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_createtask_button').attr('data-toggle', 'modal');
        $('#activities_createtask_button').attr('data-target', '#myModalcustom_popup');


        $('#Activities_schedulemeeting_button').attr('data-toggle', 'modal');
        $('#Activities_schedulemeeting_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_schedulemeeting_button').attr('data-toggle', 'modal');
        $('#activities_schedulemeeting_button').attr('data-target', '#myModalcustom_popup');

        $('#Activities_logcall_button').attr('data-toggle', 'modal');
        $('#Activities_logcall_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_logcall_button').attr('data-toggle', 'modal');
        $('#activities_logcall_button').attr('data-target', '#myModalcustom_popup');

        $('#History_createnoteorattachment_button').attr('data-toggle', 'modal');
        $('#History_createnoteorattachment_button').attr('data-target', '#myModalcustom_popup_history');
        $('#history_createnoteorattachment_button').attr('data-toggle', 'modal');
        $('#history_createnoteorattachment_button').attr('data-target', '#myModalcustom_popup_history');


        /*
         $( ".custom-noBullet" ).click(function() {
         $("#"+this.id+" .change_color_dashlets span[id*='show_link_'] .utilsLink").trigger("click");
         });
         */


        var right = $(".custom-right-panel").height();
        var left = $(".custom-left-panel").height();
        if (left >= right)
        {
            $(".custom-left-panel").css("border-right", "1px solid #d9dada");
        } else
        {
            $(".custom-right-panel").css("border-left", "1px solid #d9dada");
        }

        $(".custom-yui-nav li, .righttab").click(function () {
            var right = $(".custom-right-panel").height();
            var left = $(".custom-left-panel").height();
            if (left >= right)
            {
                $(".custom-left-panel").css("border-right", "1px solid #d9dada");
            } else
            {
                $(".custom-right-panel").css("border-left", "1px solid #d9dada");
            }

        })


        if ($('.custom-right-panel').length == "0")
        {
            $('.custom-left-panel').removeClass('col-sm-7');
            $('.custom-left-panel').addClass('col-sm-12');
        }


    });





    {/literal}
</script>

<?php if ($this->_tpl_vars['module'] != 'AOR_Reports'): ?>
<script>
    {literal}




    $(document).ready(function () {

// Get the modal
        /*var modal = document.getElementById('myModal_sla_pop');*/

// Get the button that opens the modal
        /*var btn = document.getElementById("myBtn");*/

// Get the <span> element that closes the modal
        /*var span = document.getElementsByClassName("close_sla_pop")[0];
         */
// When the user clicks the button, open the modal
        /*btn.onclick = function() {
         modal.style.display = "block";
         }*/

// When the user clicks on <span> (x), close the modal
        /*span.onclick = function() {
         modal.style.display = "none";
         }
         */
// When the user clicks anywhere outside of the modal, close it
        /*window.onclick = function(event) {
         if (event.target == modal) {
         modal.style.display = "none";
         }
         }*/

//var title=$("#name").html();
        var date_entered = $("#date_entered").html();
//$("#ticket_popup_title").html(title);
        $("#ticket_date_entered").html(date_entered);

        var max_complete = [];
        for (i = 1; i < 10; i++) {
            if ($("#current_level" + i + "_c").prop("checked") == false) {
//	alert("Checkbox is unchecked. "+i);

                $("#remove_color_current_level" + i + "_c").removeClass("active");
            }
            if ($("#current_level_c").prop("checked") == false) {
                //alert("Checkbox is unchecked. "+i);

                $("#remove_color_current_level_c").removeClass("active");
            }

        }

    })

    {/literal}
</script>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['headerTpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
{sugar_include include=$includes}


<?php if ($this->_tpl_vars['module'] == 'Accounts' || $this->_tpl_vars['module'] == 'Contacts' || $this->_tpl_vars['module'] == 'Opportunities' || $this->_tpl_vars['module'] == 'Leads' || $this->_tpl_vars['module'] == 'Cases' || $this->_tpl_vars['module'] == 'Prospects' || $this->_tpl_vars['module'] == 'scrm_Retail_Customer'): ?>
<div class="row">
    <div class="col-sm-12 new_row_detailview"  >
        <div style="margin-left:12px;">

            <?php if ($this->_tpl_vars['module'] == 'Accounts'): ?>

            <?php 
						$array_cond = array("phone_office", "website", "email1");
						$this->assign("myfields_data", $array_cond);
						 ?>

				<?php elseif ($this->_tpl_vars['module'] == 'Contacts'): ?>
						<?php 
						$array_cond = array("phone_work", "email1", "title");
						$this->assign("myfields_data", $array_cond);
						 ?>


				<?php elseif ($this->_tpl_vars['module'] == 'Opportunities'): ?>
						<?php 
						$array_cond = array( "sales_stage", "next_step");
						$this->assign("myfields_data", $array_cond);
						 ?>

				<?php elseif ($this->_tpl_vars['module'] == 'Leads'): ?>
						<?php 
						$array_cond = array("lead_type_c", "status", "next_step_c");
						$this->assign("myfields_data", $array_cond);
						 ?>

				<?php elseif ($this->_tpl_vars['module'] == 'Cases'): ?>
						<?php 
						$array_cond = array("priority", "type" , "state");
						$this->assign("myfields_data", $array_cond);
						 ?>

				<?php elseif ($this->_tpl_vars['module'] == 'Prospects'): ?>
						<?php 
						$array_cond = array("phone_work", "email1");
						$this->assign("myfields_data", $array_cond);
						 ?>


				<?php elseif ($this->_tpl_vars['module'] == 'scrm_Retail_Customer'): ?>
						<?php 
						$array_cond = array("preferred_channel_c", "phone_work", "email1");
						$this->assign("myfields_data", $array_cond);
						 ?>
				<?php endif; ?>




				<div id="<?php echo $this->_tpl_vars['module']; ?>
_detailview1_tabs"
				<?php if ($this->_tpl_vars['useTabs']): ?>
				class="yui-navset detailview_tabs" style="padding:0px;"
				<?php endif; ?>
				>


				<div <?php if ($this->_tpl_vars['useTabs']): ?>class="yui-content"<?php endif; ?> >
								<?php echo smarty_function_counter(array('name' => 'panelCount','print' => false,'start' => 0,'assign' => 'panelCount'), $this);?>

				<?php echo smarty_function_counter(array('name' => 'tabCount','start' => -1,'print' => false,'assign' => 'tabCount'), $this);?>

				<?php $_from = $this->_tpl_vars['sectionPanels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['section'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['section']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['panel']):
        $this->_foreach['section']['iteration']++;
?>



				<?php $this->assign('panel_id', $this->_tpl_vars['panelCount']); ?>
				<?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  $this->_smarty_vars['capture']['label_upper'] = ob_get_contents();  $this->assign('label_upper', ob_get_contents());ob_end_clean(); ?>
				<?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == true )): ?>
				<?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

				<?php if ($this->_tpl_vars['tabCount'] != 0): ?></div><?php endif; ?>
				<div id='tabcontent<?php echo $this->_tpl_vars['tabCount']; ?>
'>
				<?php endif; ?>





				<?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault'] == 'collapsed' && isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false )): ?>
				<?php $this->assign('panelState', $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault']); ?>
				<?php else: ?>
				<?php $this->assign('panelState', 'expanded'); ?>
				<?php endif; ?>
				<div id='detailpanel1_<?php echo $this->_foreach['section']['iteration']; ?>
' class='detail view  detail508 <?php echo $this->_tpl_vars['panelState']; ?>
'>
				{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
				
								
				<?php if (! is_array ( $this->_tpl_vars['panel'] )): ?>
				{sugar_include type='php' file='<?php echo $this->_tpl_vars['panel']; ?>
'}
				<?php else: ?>

				<?php if (! empty ( $this->_tpl_vars['label'] ) && ! is_int ( $this->_tpl_vars['label'] ) && $this->_tpl_vars['label'] != 'DEFAULT' && ( ! isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) || ( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false ) )): ?>

				<?php endif; ?>
								<div id='<?php echo $this->_tpl_vars['label']; ?>
' class="panelContainer"  style="background-color:white;" >




				<?php $_from = $this->_tpl_vars['panel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rowIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rowIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row'] => $this->_tpl_vars['rowData']):
        $this->_foreach['rowIteration']['iteration']++;
?>



				{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
				{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
				{capture name="tr" assign="tableRow"}
				<div>
				<?php $this->assign('columnsInRow', count($this->_tpl_vars['rowData'])); ?>
				<?php $this->assign('columnsUsed', 0); ?>


				<?php $_from = $this->_tpl_vars['rowData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['colIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['colIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['colData']):
        $this->_foreach['colIteration']['iteration']++;
?>


				{*custom foreach for all selected module *}
				<?php $_from = $this->_tpl_vars['myfields_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['modulerow'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['modulerow']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['rowcolumns']):
        $this->_foreach['modulerow']['iteration']++;
?>
				<?php if ($this->_tpl_vars['colData']['field']['name'] == $this->_tpl_vars['rowcolumns']): ?>



				<?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
				{if !(<?php echo $this->_tpl_vars['colData']['field']['hideIf']; ?>
) }
				<?php endif; ?>
				{counter name="fieldsUsed"}
				<?php if (empty ( $this->_tpl_vars['colData']['field']['hideLabel'] )): ?>
				<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
				<?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
				{if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
				<?php endif; ?>
				<?php if (isset ( $this->_tpl_vars['colData']['field']['customLabel'] )): ?>
				<?php echo $this->_tpl_vars['colData']['field']['customLabel']; ?>

				<?php elseif (isset ( $this->_tpl_vars['colData']['field']['label'] ) && strpos ( $this->_tpl_vars['colData']['field']['label'] , '$' )): ?>
				{capture name="label" assign="label"}<?php echo $this->_tpl_vars['colData']['field']['label']; ?>
{/capture}
				{$label|strip_semicolon}:
				<?php elseif (isset ( $this->_tpl_vars['colData']['field']['label'] )): ?>
				{capture name="label" assign="label"}{sugar_translate label='<?php echo $this->_tpl_vars['colData']['field']['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
				{$label|strip_semicolon}:
				<?php elseif (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] )): ?>
				{capture name="label" assign="label"}{sugar_translate label='<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['vname']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
				{$label|strip_semicolon}:
				<?php else: ?>
				&nbsp;
				<?php endif; ?>
				<?php if (isset ( $this->_tpl_vars['colData']['field']['popupHelp'] ) || isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] ) && isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp'] )): ?>
				<?php if (isset ( $this->_tpl_vars['colData']['field']['popupHelp'] )): ?>
				{capture name="popupText" assign="popupText"}{sugar_translate label="<?php echo $this->_tpl_vars['colData']['field']['popupHelp']; ?>
" module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
				<?php elseif (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp'] )): ?>
				{capture name="popupText" assign="popupText"}{sugar_translate label="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp']; ?>
" module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
				<?php endif; ?>
				{sugar_help text=$popupText WIDTH=400}
				<?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
				{/if}
				<?php endif; ?>
				<?php endif; ?>

				<div class="<?php if ($this->_tpl_vars['inline_edit'] && ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] ) )): ?>inlineEdit<?php endif; ?> <?php if ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['name'] == 'email1'): ?> show_primary_email <?php endif; ?>" type="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type']; ?>
" field="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['name']; ?>
" <?php if ($this->_tpl_vars['colData']['colspan']): ?>colspan='<?php echo $this->_tpl_vars['colData']['colspan']; ?>
'<?php endif; ?> <?php if (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] ) && $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] == 'phone'): ?>class="phone"<?php endif; ?> style="<?php if ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['name'] != 'email1'): ?>font-size:14px;<?php endif; ?>word-wrap: break-word;">
				<?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
				{if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
				<?php endif; ?>
				<?php echo $this->_tpl_vars['colData']['field']['prefix']; ?>

				<?php if (( $this->_tpl_vars['colData']['field']['customCode'] && ! $this->_tpl_vars['colData']['field']['customCodeRenderField'] ) || $this->_tpl_vars['colData']['field']['assign']): ?>
				{counter name="panelFieldCount"}
				<span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field"><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
				<?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] && ! empty ( $this->_tpl_vars['colData']['field']['fields'] )): ?>
				<?php $_from = $this->_tpl_vars['colData']['field']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subField']):
?>
				<?php if ($this->_tpl_vars['fields'][$this->_tpl_vars['subField']]): ?>
				{counter name="panelFieldCount"}
				<?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','tabindex' => $this->_tpl_vars['tabIndex'],'vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['subField']],'displayType' => 'DetailView'), $this);?>
&nbsp;
				<?php else: ?>
				{counter name="panelFieldCount"}
				<?php echo $this->_tpl_vars['subField']; ?>

				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]): ?>
				{counter name="panelFieldCount"}
				<?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']],'displayType' => 'DetailView','displayParams' => $this->_tpl_vars['colData']['field']['displayParams'],'typeOverride' => $this->_tpl_vars['colData']['field']['type']), $this);?>

				<?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['colData']['field']['customCode'] ) && $this->_tpl_vars['colData']['field']['customCodeRenderField']): ?>
				{counter name="panelFieldCount"}
				<span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field"><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
				<?php endif; ?>
				<?php echo $this->_tpl_vars['colData']['field']['suffix']; ?>

				<?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
				{/if}
				<?php endif; ?>

				</div>
				</div>



				<?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
				{else}
				<div>&nbsp;</div><div>&nbsp;</div>
				{/if}
				<?php endif; ?>




				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>


				<?php endforeach; endif; unset($_from); ?>
				</div>

				{/capture}
				{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
				{$tableRow}
				{/if}
				<?php endforeach; endif; unset($_from); ?>
				</div>
				<?php if (! empty ( $this->_tpl_vars['label'] ) && ! is_int ( $this->_tpl_vars['label'] ) && $this->_tpl_vars['label'] != 'DEFAULT' && ( ! isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) || ( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false ) )): ?>
				<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(<?php echo $this->_foreach['section']['iteration']; ?>
, '<?php echo $this->_tpl_vars['panelState']; ?>
'); {rdelim}); </script>
				<?php endif; ?>
				<?php endif; ?>
				</div>
				{if $panelFieldCount == 0}

				<script>document.getElementById("<?php echo $this->_tpl_vars['label']; ?>
").style.display='none';</script>
				{/if}
				<?php endforeach; endif; unset($_from); ?>
				<?php if ($this->_tpl_vars['useTabs']): ?>
				</div>
				<?php endif; ?>

				<?php if ($this->_tpl_vars['module'] == 'Cases'): ?>
				<div class="col-sm-2 pull-right">
				<a  href="javascript:void(0)" id="sla_myBtn" data-toggle="modal" data-target="#sla_popup">Current Workflow Stage</a>
				</div>
				<?php endif; ?>

				</div>
				</div>







</div>
</div>
</div>

<?php endif;  if ($this->_tpl_vars['module'] == 'Opportunities' || $this->_tpl_vars['module'] == 'Leads' || $this->_tpl_vars['module'] == 'Cases'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "include/DetailView/status_arrows.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

<div <?php if ($this->_tpl_vars['module'] == 'Employees'): ?>class="col-sm-12"<?php else: ?>class="row" style="border:1px solid #d9dada; margin-top:5px;background-color:white;"<?php endif; ?> >

<div class="col-sm-7 custom-left-panel" <?php if ($this->_tpl_vars['module'] != 'Employees'): ?>style="padding:0px 0px 10px 0px"<?php else: ?>style="border:1px solid #d9dada;padding:0px 0px 10px 0px"<?php endif; ?>>


<div id="<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs"
<?php if ($this->_tpl_vars['useTabs']): ?>
class="yui-navset detailview_tabs" style="padding:0px;"
<?php endif; ?>
>
    <?php if ($this->_tpl_vars['useTabs']): ?>
    {* Generate the Tab headers *}
    <?php echo smarty_function_counter(array('name' => 'tabCount','start' => -1,'print' => false,'assign' => 'tabCount'), $this);?>

    <ul class="yui-nav custom-yui-nav">
    <?php $_from = $this->_tpl_vars['sectionPanels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['section'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['section']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['panel']):
        $this->_foreach['section']['iteration']++;
?>
        <?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  $this->_smarty_vars['capture']['label_upper'] = ob_get_contents();  $this->assign('label_upper', ob_get_contents());ob_end_clean(); ?>
        {* override from tab definitions *}
        <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == true )): ?>
            <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

            <li><a id="tab<?php echo $this->_tpl_vars['tabCount']; ?>
" href="javascript:void(0)"><em >{sugar_translate label='<?php echo $this->_tpl_vars['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}</em></a></li>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

    </ul>
    <?php endif; ?>
    <div <?php if ($this->_tpl_vars['useTabs']): ?>class="yui-content"<?php endif; ?> <?php if ($this->_tpl_vars['module'] != 'AOR_Reports'): ?>style="min-height:350px<?php endif; ?>">
<?php echo smarty_function_counter(array('name' => 'panelCount','print' => false,'start' => 0,'assign' => 'panelCount'), $this);?>

<?php echo smarty_function_counter(array('name' => 'tabCount','start' => -1,'print' => false,'assign' => 'tabCount'), $this);?>



<?php $_from = $this->_tpl_vars['sectionPanels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['section'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['section']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['panel']):
        $this->_foreach['section']['iteration']++;
 $this->assign('panel_id', $this->_tpl_vars['panelCount']);  ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  $this->_smarty_vars['capture']['label_upper'] = ob_get_contents();  $this->assign('label_upper', ob_get_contents());ob_end_clean(); ?>
  <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == true )): ?>
    <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

    <?php if ($this->_tpl_vars['tabCount'] != 0): ?></div><?php endif; ?>
    <div id='tabcontent<?php echo $this->_tpl_vars['tabCount']; ?>
'>
  <?php endif; ?>

    <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault'] == 'collapsed' && isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false )): ?>
        <?php $this->assign('panelState', $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault']); ?>
    <?php else: ?>
        <?php $this->assign('panelState', 'expanded'); ?>
    <?php endif; ?>
<div id='detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
' class='detail view  detail508 <?php echo $this->_tpl_vars['panelState']; ?>
'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}


<?php if (! is_array ( $this->_tpl_vars['panel'] )): ?>
    {sugar_include type='php' file='<?php echo $this->_tpl_vars['panel']; ?>
'}
<?php else: ?>

    <?php if (! empty ( $this->_tpl_vars['label'] ) && ! is_int ( $this->_tpl_vars['label'] ) && $this->_tpl_vars['label'] != 'DEFAULT' && ( ! isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) || ( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false ) )): ?>
    <h4>

      <a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(<?php echo $this->_foreach['section']['iteration']; ?>
);">
      {*<img border="0" id="detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
      <i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>

      </a>
      <a href="javascript:void(0)" class="expandLink" onclick="expandPanel(<?php echo $this->_foreach['section']['iteration']; ?>
);">
      {*<img border="0" id="detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
      <i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>

      </a>
      {sugar_translate label='<?php echo $this->_tpl_vars['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}
    <?php if (isset ( $this->_tpl_vars['panelState'] ) && $this->_tpl_vars['panelState'] == 'collapsed'): ?>
    <script>
      document.getElementById('detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
').className += ' collapsed';
            </script>
    <?php else: ?>
    <script>
      document.getElementById('detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
').className += ' expanded';
            </script>
            <?php endif; ?>
            </h4>

            <?php endif; ?>
                        <div id='<?php echo $this->_tpl_vars['label']; ?>
' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >



                    <?php $_from = $this->_tpl_vars['panel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rowIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rowIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row'] => $this->_tpl_vars['rowData']):
        $this->_foreach['rowIteration']['iteration']++;
?>
                    {counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
                    {counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
                    {capture name="tr" assign="tableRow"}

                    <div class="col-sm-12">

                            <?php $this->assign('columnsInRow', count($this->_tpl_vars['rowData'])); ?>
                            <?php $this->assign('columnsUsed', 0); ?>


                            <?php $_from = $this->_tpl_vars['rowData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['colIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['colIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['colData']):
        $this->_foreach['colIteration']['iteration']++;
?>
                            <?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
                            {if !(<?php echo $this->_tpl_vars['colData']['field']['hideIf']; ?>
) }
                            <?php endif; ?>
                            {counter name="fieldsUsed"}
                            <?php if (empty ( $this->_tpl_vars['colData']['field']['hideLabel'] )): ?>

                            <div class="<?php if (count($this->_tpl_vars['rowData']) == '2'): ?>col-sm-6<?php else: ?>col-sm-12<?php endif; ?>" width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['label']+$this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['field']; ?>
%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >

                                    <span style="font-weight:600">
                                                <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                {if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
                                                <?php endif; ?>
                                                <?php if (isset ( $this->_tpl_vars['colData']['field']['customLabel'] )): ?>
                                                <?php echo $this->_tpl_vars['colData']['field']['customLabel']; ?>

                                                <?php elseif (isset ( $this->_tpl_vars['colData']['field']['label'] ) && strpos ( $this->_tpl_vars['colData']['field']['label'] , '$' )): ?>
                                                {capture name="label" assign="label"}<?php echo $this->_tpl_vars['colData']['field']['label']; ?>
{/capture}
                                                {$label|strip_semicolon}:
                                                <?php elseif (isset ( $this->_tpl_vars['colData']['field']['label'] )): ?>
                                                {capture name="label" assign="label"}{sugar_translate label='<?php echo $this->_tpl_vars['colData']['field']['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                                                {$label|strip_semicolon}:
                                                <?php elseif (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] )): ?>
                                                {capture name="label" assign="label"}{sugar_translate label='<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['vname']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                                                {$label|strip_semicolon}:
                                                <?php else: ?>
                                                &nbsp;
                                                <?php endif; ?>
                                                <?php if (isset ( $this->_tpl_vars['colData']['field']['popupHelp'] ) || isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] ) && isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp'] )): ?>
                                                <?php if (isset ( $this->_tpl_vars['colData']['field']['popupHelp'] )): ?>
                                                {capture name="popupText" assign="popupText"}{sugar_translate label="<?php echo $this->_tpl_vars['colData']['field']['popupHelp']; ?>
" module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                                                <?php elseif (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp'] )): ?>
                                                {capture name="popupText" assign="popupText"}{sugar_translate label="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp']; ?>
" module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                                                <?php endif; ?>
                                                {sugar_help text=$popupText WIDTH=400}
                                                <?php endif; ?>
                                                <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                {/if}
                                                <?php endif; ?>
                                                <?php endif; ?>

                                            </span>
                                        <div class="<?php if ($this->_tpl_vars['inline_edit'] && ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] ) )): ?>inlineEdit<?php endif; ?>" type="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type']; ?>
" field="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['name']; ?>
" {*width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['field']; ?>
%'*} <?php if ($this->_tpl_vars['colData']['colspan']): ?>colspan='<?php echo $this->_tpl_vars['colData']['colspan']; ?>
'<?php endif; ?> <?php if (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] ) && $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] == 'phone'): ?>class="phone"<?php endif; ?> style="font-size:14px;word-wrap: break-word;">
                                             <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                             {if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
                                             <?php endif; ?>
                                             <?php echo $this->_tpl_vars['colData']['field']['prefix']; ?>

                                             <?php if (( $this->_tpl_vars['colData']['field']['customCode'] && ! $this->_tpl_vars['colData']['field']['customCodeRenderField'] ) || $this->_tpl_vars['colData']['field']['assign']): ?>
                                             {counter name="panelFieldCount"}
                                             <span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field"><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
                                                            <?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] && ! empty ( $this->_tpl_vars['colData']['field']['fields'] )): ?>
                                                            <?php $_from = $this->_tpl_vars['colData']['field']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subField']):
?>
                                                            <?php if ($this->_tpl_vars['fields'][$this->_tpl_vars['subField']]): ?>
                                                            {counter name="panelFieldCount"}
                                                            <?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','tabindex' => $this->_tpl_vars['tabIndex'],'vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['subField']],'displayType' => 'DetailView'), $this);?>
&nbsp;

                                                            <?php else: ?>
                                                            {counter name="panelFieldCount"}
                                                            <?php echo $this->_tpl_vars['subField']; ?>

                                                            <?php endif; ?>
                                                            <?php endforeach; endif; unset($_from); ?>
                                                            <?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]): ?>
                                                            {counter name="panelFieldCount"}
                                                            <?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']],'displayType' => 'DetailView','displayParams' => $this->_tpl_vars['colData']['field']['displayParams'],'typeOverride' => $this->_tpl_vars['colData']['field']['type']), $this);?>


                                                            <?php endif; ?>
                                                            <?php if (! empty ( $this->_tpl_vars['colData']['field']['customCode'] ) && $this->_tpl_vars['colData']['field']['customCodeRenderField']): ?>
                                                            {counter name="panelFieldCount"}
                                                            <span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field"><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
                                                            <?php endif; ?>
                                                            <?php echo $this->_tpl_vars['colData']['field']['suffix']; ?>

                                                            <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                            {/if}
                                                            <?php endif; ?>

                                                            <?php if ($this->_tpl_vars['inline_edit'] && ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] ) )): ?><div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div><?php endif; ?>
                                                                    </div>
                                                                    </div>
                                                                    <?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
                                                                    {else}

                                                                    <div>&nbsp;</div><div>&nbsp;</div>
                                                                {/if}
                                                                <?php endif; ?>

                                                                <?php endforeach; endif; unset($_from); ?>
                                                                </div>
                                                                {/capture}
                                                                {if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
                                                                {$tableRow}
                                                                {/if}
                                                                <?php endforeach; endif; unset($_from); ?>
                                                                </div>

                                                                <span >&nbsp;</span>
                                                                <?php if (! empty ( $this->_tpl_vars['label'] ) && ! is_int ( $this->_tpl_vars['label'] ) && $this->_tpl_vars['label'] != 'DEFAULT' && ( ! isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) || ( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false ) )): ?>
                                                                <script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(<?php echo $this->_foreach['section']['iteration']; ?>
, '<?php echo $this->_tpl_vars['panelState']; ?>
'); {rdelim}); </script>
                                                                            <?php endif; ?>
                                                                            <?php endif; ?>
                                                                            </div>
                                                                            {if $panelFieldCount == 0}

                                                                            <script>document.getElementById("<?php echo $this->_tpl_vars['label']; ?>
").style.display='none';</script>
                                                                                        {/if}
                                                                                        <?php endforeach; endif; unset($_from); ?>
                                                                                        <?php if ($this->_tpl_vars['useTabs']): ?>
                                                                                        </div>
                                                                                        <?php endif; ?>

                                                                                        </div>
                                                                                        </div>
                                                                                        </div>
                                                                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footerTpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                                                                        <?php if ($this->_tpl_vars['useTabs']): ?>
                                                                                        <script type='text/javascript' src='{sugar_getjspath file='include/javascript/popup_helper.js'}'></script>
                                                                                                <script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_yui_widgets.js'}"></script>
                                                                                                    <script type="text/javascript">
var <?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs = new YAHOO.widget.TabView("<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs");
<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs.selectTab(0);
                                                                                                                </script>
                                                                                                            <?php endif; ?>
                                                                                                            <script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
                                                                                                                        <script type="text/javascript" src="modules/Favorites/favorites.js"></script>









<!--
 <button type="button" id="history_activities_modal_button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalcustom_popup">Open Large Modal</button>

-->



                                                                                                                                    <?php else: ?>



                                                                                                                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['headerTpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                                                                                                                    {sugar_include include=$includes}
                                                                                                                                    <div id="<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs"
                                                                                                                                         <?php if ($this->_tpl_vars['useTabs']): ?>
                                                                                                                                         class="yui-navset detailview_tabs"
                                                                                                                                         <?php endif; ?>
                                                                                                                                         >
                                                                                                                                         <?php if ($this->_tpl_vars['useTabs']): ?>
                                                                                                                                         {* Generate the Tab headers *}
                                                                                                                                         <?php echo smarty_function_counter(array('name' => 'tabCount','start' => -1,'print' => false,'assign' => 'tabCount'), $this);?>

                                                                                                                                         <ul class="yui-nav" >
                                                                                                                                                    <?php $_from = $this->_tpl_vars['sectionPanels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['section'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['section']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['panel']):
        $this->_foreach['section']['iteration']++;
?>
                                                                                                                                                    <?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  $this->_smarty_vars['capture']['label_upper'] = ob_get_contents();  $this->assign('label_upper', ob_get_contents());ob_end_clean(); ?>
                                                                                                                                                    {* override from tab definitions *}
                                                                                                                                                    <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == true )): ?>
                                                                                                                                                    <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

                                                                                                                                                    <li><a id="tab<?php echo $this->_tpl_vars['tabCount']; ?>
" href="javascript:void(0)"><em>{sugar_translate label='<?php echo $this->_tpl_vars['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}</em></a></li>
                                                                                                                                                    <?php endif; ?>
                                                                                                                                                    <?php endforeach; endif; unset($_from); ?>
                                                                                                                                                </ul>
                                                                                                                                            <?php endif; ?>
                                                                                                                                            <div <?php if ($this->_tpl_vars['useTabs']): ?>class="yui-content"<?php endif; ?>>
                                                                                                                                                                                                                                                                                                        <?php echo smarty_function_counter(array('name' => 'panelCount','print' => false,'start' => 0,'assign' => 'panelCount'), $this);?>

                                                                                                                                                    <?php echo smarty_function_counter(array('name' => 'tabCount','start' => -1,'print' => false,'assign' => 'tabCount'), $this);?>

                                                                                                                                                    <?php $_from = $this->_tpl_vars['sectionPanels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['section'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['section']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['panel']):
        $this->_foreach['section']['iteration']++;
?>
                                                                                                                                                    <?php $this->assign('panel_id', $this->_tpl_vars['panelCount']); ?>
                                                                                                                                                    <?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  $this->_smarty_vars['capture']['label_upper'] = ob_get_contents();  $this->assign('label_upper', ob_get_contents());ob_end_clean(); ?>
                                                                                                                                                    <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == true )): ?>
                                                                                                                                                    <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

                                                                                                                                                    <?php if ($this->_tpl_vars['tabCount'] != 0): ?></div><?php endif; ?>
                                                                                                                                                    <div id='tabcontent<?php echo $this->_tpl_vars['tabCount']; ?>
'>
                                                                                                                                                            <?php endif; ?>

                                                                                                                                                            <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault'] == 'collapsed' && isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false )): ?>
                                                                                                                                                            <?php $this->assign('panelState', $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault']); ?>
                                                                                                                                                            <?php else: ?>
                                                                                                                                                            <?php $this->assign('panelState', 'expanded'); ?>
                                                                                                                                                            <?php endif; ?>
                                                                                                                                                            <div id='detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
' class='detail view  detail508 <?php echo $this->_tpl_vars['panelState']; ?>
'>
                                                                                                                                                                    {counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
                                                                                                                                                                    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?php if (! is_array ( $this->_tpl_vars['panel'] )): ?>
                                                                                                                                                                    {sugar_include type='php' file='<?php echo $this->_tpl_vars['panel']; ?>
'}
                                                                                                                                                                    <?php else: ?>

                                                                                                                                                                    <?php if (! empty ( $this->_tpl_vars['label'] ) && ! is_int ( $this->_tpl_vars['label'] ) && $this->_tpl_vars['label'] != 'DEFAULT' && ( ! isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) || ( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false ) )): ?>
                                                                                                                                                                    <h4>
                                                                                                                                                                        <a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(<?php echo $this->_foreach['section']['iteration']; ?>
);">
                                                                                                                                                                            <img border="0" id="detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
                                                                                                                                                                                <a href="javascript:void(0)" class="expandLink" onclick="expandPanel(<?php echo $this->_foreach['section']['iteration']; ?>
);">
                                                                                                                                                                                    <img border="0" id="detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
                                                                                                                                                                                        {sugar_translate label='<?php echo $this->_tpl_vars['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}
                                                                                                                                                                                        <?php if (isset ( $this->_tpl_vars['panelState'] ) && $this->_tpl_vars['panelState'] == 'collapsed'): ?>
                                                                                                                                                                                        <script>
      document.getElementById('detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
').className += ' collapsed';
                                                                                                                                                                                                        </script>
                                                                                                                                                                                                        <?php else: ?>
                                                                                                                                                                                                        <script>
      document.getElementById('detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
').className += ' expanded';
                                                                                                                                                                                                        </script>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        </h4>

                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                                                                                                                                                                                                                                <table id='<?php echo $this->_tpl_vars['label']; ?>
' class="panelContainer" cellspacing='{$gridline}'>



                                                                                                                                                                                                        <?php $_from = $this->_tpl_vars['panel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rowIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rowIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row'] => $this->_tpl_vars['rowData']):
        $this->_foreach['rowIteration']['iteration']++;
?>
                                                                                                                                                                                                        {counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
                                                                                                                                                                                                        {counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
                                                                                                                                                                                                        {capture name="tr" assign="tableRow"}
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <?php $this->assign('columnsInRow', count($this->_tpl_vars['rowData'])); ?>
                                                                                                                                                                                                        <?php $this->assign('columnsUsed', 0); ?>
                                                                                                                                                                                                        <?php $_from = $this->_tpl_vars['rowData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['colIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['colIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['colData']):
        $this->_foreach['colIteration']['iteration']++;
?>
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
                                                                                                                                                                                                        {if !(<?php echo $this->_tpl_vars['colData']['field']['hideIf']; ?>
) }
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        {counter name="fieldsUsed"}
                                                                                                                                                                                                        <?php if (empty ( $this->_tpl_vars['colData']['field']['hideLabel'] )): ?>
                                                                                                                                                                                                        <td width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['label']; ?>
%' scope="col">
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                                                                                                                                                                        {if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php if (isset ( $this->_tpl_vars['colData']['field']['customLabel'] )): ?>
                                                                                                                                                                                                        <?php echo $this->_tpl_vars['colData']['field']['customLabel']; ?>

                                                                                                                                                                                                        <?php elseif (isset ( $this->_tpl_vars['colData']['field']['label'] ) && strpos ( $this->_tpl_vars['colData']['field']['label'] , '$' )): ?>
                                                                                                                                                                                                        {capture name="label" assign="label"}<?php echo $this->_tpl_vars['colData']['field']['label']; ?>
{/capture}
                                                                                                                                                                                                        {$label|strip_semicolon}:
                                                                                                                                                                                                        <?php elseif (isset ( $this->_tpl_vars['colData']['field']['label'] )): ?>
                                                                                                                                                                                                        {capture name="label" assign="label"}{sugar_translate label='<?php echo $this->_tpl_vars['colData']['field']['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                                                                                                                                                                                                        {$label|strip_semicolon}:
                                                                                                                                                                                                        <?php elseif (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] )): ?>
                                                                                                                                                                                                        {capture name="label" assign="label"}{sugar_translate label='<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['vname']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                                                                                                                                                                                                        {$label|strip_semicolon}:
                                                                                                                                                                                                        <?php else: ?>
                                                                                                                                                                                                        &nbsp;
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php if (isset ( $this->_tpl_vars['colData']['field']['popupHelp'] ) || isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] ) && isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp'] )): ?>
                                                                                                                                                                                                        <?php if (isset ( $this->_tpl_vars['colData']['field']['popupHelp'] )): ?>
                                                                                                                                                                                                        {capture name="popupText" assign="popupText"}{sugar_translate label="<?php echo $this->_tpl_vars['colData']['field']['popupHelp']; ?>
" module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                                                                                                                                                                                                        <?php elseif (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp'] )): ?>
                                                                                                                                                                                                        {capture name="popupText" assign="popupText"}{sugar_translate label="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp']; ?>
" module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        {sugar_help text=$popupText WIDTH=400}
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                                                                                                                                                                        {/if}
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td class="<?php if ($this->_tpl_vars['inline_edit'] && ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] ) )): ?>inlineEdit<?php endif; ?>" type="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type']; ?>
" field="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['name']; ?>
" width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['field']; ?>
%' <?php if ($this->_tpl_vars['colData']['colspan']): ?>colspan='<?php echo $this->_tpl_vars['colData']['colspan']; ?>
'<?php endif; ?> <?php if (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] ) && $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] == 'phone'): ?>class="phone"<?php endif; ?>>
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                                                                                                                                                                        {if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php echo $this->_tpl_vars['colData']['field']['prefix']; ?>

                                                                                                                                                                                                        <?php if (( $this->_tpl_vars['colData']['field']['customCode'] && ! $this->_tpl_vars['colData']['field']['customCodeRenderField'] ) || $this->_tpl_vars['colData']['field']['assign']): ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field"><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
                                                                                                                                                                                                        <?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] && ! empty ( $this->_tpl_vars['colData']['field']['fields'] )): ?>
                                                                                                                                                                                                        <?php $_from = $this->_tpl_vars['colData']['field']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subField']):
?>
                                                                                                                                                                                                        <?php if ($this->_tpl_vars['fields'][$this->_tpl_vars['subField']]): ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','tabindex' => $this->_tpl_vars['tabIndex'],'vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['subField']],'displayType' => 'DetailView'), $this);?>
&nbsp;

                                                                                                                                                                                                        <?php else: ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <?php echo $this->_tpl_vars['subField']; ?>

                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>
                                                                                                                                                                                                        <?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]): ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']],'displayType' => 'DetailView','displayParams' => $this->_tpl_vars['colData']['field']['displayParams'],'typeOverride' => $this->_tpl_vars['colData']['field']['type']), $this);?>


                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['customCode'] ) && $this->_tpl_vars['colData']['field']['customCodeRenderField']): ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field"><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php echo $this->_tpl_vars['colData']['field']['suffix']; ?>

                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                                                                                                                                                                        {/if}
                                                                                                                                                                                                        <?php endif; ?>

                                                                                                                                                                                                        <?php if ($this->_tpl_vars['inline_edit'] && ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] ) )): ?><div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div><?php endif; ?>

                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
                                                                                                                                                                                                        {else}

                                                                                                                                                                                                        <td>&nbsp;</td><td>&nbsp;</td>
                                                                                                                                                                                                        {/if}
                                                                                                                                                                                                        <?php endif; ?>

                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        {/capture}
                                                                                                                                                                                                        {if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
                                                                                                                                                                                                        {$tableRow}
                                                                                                                                                                                                        {/if}
                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>
                                                                                                                                                                                                        </table>
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['label'] ) && ! is_int ( $this->_tpl_vars['label'] ) && $this->_tpl_vars['label'] != 'DEFAULT' && ( ! isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) || ( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false ) )): ?>
                                                                                                                                                                                                        <script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(<?php echo $this->_foreach['section']['iteration']; ?>
, '<?php echo $this->_tpl_vars['panelState']; ?>
'); {rdelim}); </script>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        {if $panelFieldCount == 0}

                                                                                                                                                                                                        <script>document.getElementById("<?php echo $this->_tpl_vars['label']; ?>
").style.display='none';</script>
                                                                                                                                                                                                        {/if}
                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>
                                                                                                                                                                                                        <?php if ($this->_tpl_vars['useTabs']): ?>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <?php endif; ?>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footerTpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                                                                                                                                                                                        <?php if ($this->_tpl_vars['useTabs']): ?>
                                                                                                                                                                                                        <script type='text/javascript' src='{sugar_getjspath file='include/javascript/popup_helper.js'}'></script>
                                                                                                                                                                                                        <script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_yui_widgets.js'}"></script>
                                                                                                                                                                                                        <script type="text/javascript">
var <?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs = new YAHOO.widget.TabView("<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs");
<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs.selectTab(0);
                                                                                                                                                                                                        </script>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
                                                                                                                                                                                                        <script type="text/javascript" src="modules/Favorites/favorites.js"></script>


                                                                                                                                                                                                        <?php endif; ?>



                                                                                                                                                                                                        <div class="modal fade custom_dialog" id="myModalcustom_popup" role="dialog" data-backdrop="static" data-keyboard="false">
                                                                                                                                                                                                        <div class="modal-dialog modal-lg">
                                                                                                                                                                                                        <div class="modal-content">

                                                                                                                                                                                                        <div class="modal-body table-responsive">
                                                                                                                                                                                                        <div id="subpanel_activities"></div>

                        <!--                     <input title="Cancel" class="subpanel_cancel_button_custom" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate($(this).attr(\'id\'));return false;" type="submit" name="' . $params['module'] . '_subpanel_cancel_button" id="' . $params['module'] . '_subpanel_cancel_button" value="Cancel" data-dismiss="modal">
                        -->

                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>


                                                                                                                                                                                                        <div class="modal fade custom_dialog" id="myModalcustom_popup_history" role="dialog" data-backdrop="static" data-keyboard="false">
                                                                                                                                                                                                        <div class="modal-dialog modal-lg">
                                                                                                                                                                                                        <div class="modal-content">

                                                                                                                                                                                                        <div class="modal-body table-responsive">

                                                                                                                                                                                                        <div id="subpanel_history"></div>

                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>






                                                                                                                                                                                                        <div class="modal fade" id="sla_popup" role="dialog">
                                                                                                                                                                                                        <div class="modal-dialog modal-md">
                                                                                                                                                                                                        <div class="modal-content cutomer-360-bg" style="background-image:url('themes/SuiteR/images/texture_5.png');background-repeat: repeat;">
                                                                                                                                                                                                        <div class="modal-header">
                                                                                                                                                                                                        <button type="button" class="close" data-dismiss="modal" style="margin-top:-11px!important;">&times;</button>
                                                                                                                                                                                                        <!--<h4 class="modal-title"><div class="div_h1" >Ticket : <span id="ticket_popup_title"></span></div></h4>-->
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="modal-body">
                                                                                                                                                                                                        <form id="msform">
                                                                                                                                                                                                        <ul id="progressbar">
                                                                                                                                                                                                        <li class="active"><span>Created </span><br><span class="small_font" id="ticket_date_entered"></span></li>


                                                                                                                                                                                                        <?php $_from = $this->_tpl_vars['sectionPanels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['section'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['section']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['panel']):
        $this->_foreach['section']['iteration']++;
?>

                                                                                                                                                                                                        <?php if ($this->_foreach['section']['iteration'] > 2): ?>

                                                                                                                                                                                                        <?php 
                                                                                                                                                                                                        $complete_date = array('level_1_date_complted_c', 'level_2_date_complted_c', 'level_3_date_complted_c', 'level_4_date_complted_c', 'level_5_date_complted_c', 'level_6_date_complted_c');
                                                                                                                                                                                                        $this->assign("complete_date", $complete_date);

                                                                                                                                                                                                         ?>
                                                                                                                                                                                                        <?php if ($this->_foreach['section']['iteration'] == '3'): ?>
                                                                                                                                                                                                        <li class="active" id="remove_color_current_level_c"><span>{sugar_translate label='<?php echo $this->_tpl_vars['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'} </span><br><span 		class="small_font">
                                                                                                                                                                                                        <?php else: ?>
                                                                                                                                                                                                        <li class="active" id="remove_color_current_level<?php echo $this->_foreach['section']['iteration']-2; ?>
_c"><span>{sugar_translate label='<?php echo $this->_tpl_vars['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'} </span><br><span 		class="small_font">
                                                                                                                                                                                                        <?php endif; ?>

                                                                                                                                                                                                        <?php $_from = $this->_tpl_vars['panel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rowIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rowIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row'] => $this->_tpl_vars['rowData']):
        $this->_foreach['rowIteration']['iteration']++;
?>


                                                                                                                                                                                                        <?php $_from = $this->_tpl_vars['rowData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['colIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['colIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['colData']):
        $this->_foreach['colIteration']['iteration']++;
?>

                                                                                                                                                                                                        <?php $_from = $this->_tpl_vars['complete_date']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comp_dt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comp_dt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cp_dt']):
        $this->_foreach['comp_dt']['iteration']++;
?>
                                                                                                                                                                                                        <?php if ($this->_tpl_vars['cp_dt'] == $this->_tpl_vars['colData']['field']['name']): ?>

                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
                                                                                                                                                                                                        {if !(<?php echo $this->_tpl_vars['colData']['field']['hideIf']; ?>
) }
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        {counter name="fieldsUsed"}
                                                                                                                                                                                                        <?php if (empty ( $this->_tpl_vars['colData']['field']['hideLabel'] )): ?>
                                                                                                                                                                                                        <div  scope="col" >

                                                                                                                                                                                                        <?php endif; ?>

                                                                                                                                                                                                        <div class="small_font <?php if ($this->_tpl_vars['inline_edit'] && ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] ) )): ?>inlineEdit<?php endif; ?> <?php if ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['name'] == 'email1'): ?> show_primary_email <?php endif; ?>" type="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type']; ?>
" field="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['name']; ?>
" <?php if ($this->_tpl_vars['colData']['colspan']): ?>colspan='<?php echo $this->_tpl_vars['colData']['colspan']; ?>
'<?php endif; ?> <?php if (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] ) && $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] == 'phone'): ?>class="phone"<?php endif; ?> style="word-wrap: break-word;">
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                                                                                                                                                                        {if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php echo $this->_tpl_vars['colData']['field']['prefix']; ?>

                                                                                                                                                                                                        <?php if (( $this->_tpl_vars['colData']['field']['customCode'] && ! $this->_tpl_vars['colData']['field']['customCodeRenderField'] ) || $this->_tpl_vars['colData']['field']['assign']): ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field "><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
                                                                                                                                                                                                        <?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] && ! empty ( $this->_tpl_vars['colData']['field']['fields'] )): ?>
                                                                                                                                                                                                        <?php $_from = $this->_tpl_vars['colData']['field']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subField']):
?>
                                                                                                                                                                                                        <?php if ($this->_tpl_vars['fields'][$this->_tpl_vars['subField']]): ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','tabindex' => $this->_tpl_vars['tabIndex'],'vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['subField']],'displayType' => 'DetailView'), $this);?>
&nbsp;
                                                                                                                                                                                                        <?php else: ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <?php echo $this->_tpl_vars['subField']; ?>

                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>
                                                                                                                                                                                                        <?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]): ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']],'displayType' => 'DetailView','displayParams' => $this->_tpl_vars['colData']['field']['displayParams'],'typeOverride' => $this->_tpl_vars['colData']['field']['type']), $this);?>

                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['customCode'] ) && $this->_tpl_vars['colData']['field']['customCodeRenderField']): ?>
                                                                                                                                                                                                        {counter name="panelFieldCount"}
                                                                                                                                                                                                        <span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field "><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php echo $this->_tpl_vars['colData']['field']['suffix']; ?>

                                                                                                                                                                                                        <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                                                                                                                                                                                                        {/if}
                                                                                                                                                                                                        <?php endif; ?>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>
                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>


                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>

                                                                                                                                                                                                        </span>
                                                                                                                                                                                                        </li>
                                                                                                                                                                                                        <?php endif; ?>
                                                                                                                                                                                                        <?php endforeach; endif; unset($_from); ?>


                                                                                                                                                                                                        </ul>
                                                                                                                                                                                                        </form>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </div>