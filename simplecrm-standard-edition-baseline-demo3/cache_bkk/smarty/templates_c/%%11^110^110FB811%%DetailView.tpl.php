<?php /* Smarty version 2.6.29, created on 2018-06-23 16:55:32
         compiled from cache/themes/SuiteR/modules/FP_events/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 207, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 216, false),array('function', 'counter', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 225, false),array('function', 'sugar_ajax_url', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 266, false),array('function', 'sugar_number_format', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 360, false),array('function', 'sugar_getjspath', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 598, false),array('modifier', 'strip_semicolon', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 236, false),array('modifier', 'escape', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 386, false),array('modifier', 'url2html', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 386, false),array('modifier', 'nl2br', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 386, false),array('modifier', 'substr', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 500, false),array('modifier', 'to_url', 'cache/themes/SuiteR/modules/FP_events/DetailView.tpl', 502, false),)), $this); ?>

<style>
<?php echo '
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
'; ?>

</style>
<script >
    <?php echo '

    $(document).ready(function () {
        $(".dataField").css("display", "none");
        $(\'#Activities_createtask_button\').attr(\'data-toggle\', \'modal\');
        $(\'#Activities_createtask_button\').attr(\'data-target\', \'#myModalcustom_popup\');
        $(\'#activities_createtask_button\').attr(\'data-toggle\', \'modal\');
        $(\'#activities_createtask_button\').attr(\'data-target\', \'#myModalcustom_popup\');


        $(\'#Activities_schedulemeeting_button\').attr(\'data-toggle\', \'modal\');
        $(\'#Activities_schedulemeeting_button\').attr(\'data-target\', \'#myModalcustom_popup\');
        $(\'#activities_schedulemeeting_button\').attr(\'data-toggle\', \'modal\');
        $(\'#activities_schedulemeeting_button\').attr(\'data-target\', \'#myModalcustom_popup\');

        $(\'#Activities_logcall_button\').attr(\'data-toggle\', \'modal\');
        $(\'#Activities_logcall_button\').attr(\'data-target\', \'#myModalcustom_popup\');
        $(\'#activities_logcall_button\').attr(\'data-toggle\', \'modal\');
        $(\'#activities_logcall_button\').attr(\'data-target\', \'#myModalcustom_popup\');

        $(\'#History_createnoteorattachment_button\').attr(\'data-toggle\', \'modal\');
        $(\'#History_createnoteorattachment_button\').attr(\'data-target\', \'#myModalcustom_popup_history\');
        $(\'#history_createnoteorattachment_button\').attr(\'data-toggle\', \'modal\');
        $(\'#history_createnoteorattachment_button\').attr(\'data-target\', \'#myModalcustom_popup_history\');


        /*
         $( ".custom-noBullet" ).click(function() {
         $("#"+this.id+" .change_color_dashlets span[id*=\'show_link_\'] .utilsLink").trigger("click");
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


        if ($(\'.custom-right-panel\').length == "0")
        {
            $(\'.custom-left-panel\').removeClass(\'col-sm-7\');
            $(\'.custom-left-panel\').addClass(\'col-sm-12\');
        }


    });





    '; ?>

</script>
<script>
<?php echo '
$(document).ready(function () {
// Get the modal
/*var modal = document.getElementById(\'myModal_sla_pop\');*/
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
'; ?>

</script>

<script language="javascript">
<?php echo '
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
'; ?>

</script>
<td class="buttons"  style="min-width:50%;padding-right: 60px !important;" NOWRAP >
<div class="pull-right">
<?php 
echo  $theTitle .= "<div class='favorite' record_id='" . $this->bean->id . "' module='" . $this->bean->module_dir . "' style='color: #FFD700;margin:2.5px 10px;'><div class='favorite_icon_outline'><i class='fa fa-2x fa-star-o' aria-hidden='true' title='".translate('LBL_ADD_TO_FAVORITES', 'Home')."'></i>
</div>
<div class='favorite_icon_fill'><i class='fa fa-2x fa-star' aria-hidden='true' title='".translate('LBL_ADD_TO_FAVORITES', 'Home')."'></i>
</div></div>";
 ?>
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" ><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='FP_events'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"><?php endif; ?> <ul id class="subnav" ><li><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='FP_events'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_LABEL']; ?>
" id="duplicate_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='FP_events'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('<?php echo $this->_tpl_vars['APP']['NTC_DELETE_CONFIRMATION']; ?>
')) SUGAR.ajaxUI.submitForm(_form); return false;" type="submit" name="Delete" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" id="delete_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('edit') && $this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUP_MERGE']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='FP_events'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="<?php echo $this->_tpl_vars['APP']['LBL_DUP_MERGE']; ?>
" id="merge_duplicate_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=FP_events", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?></li></ul></li></ul>
<?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php echo $this->_tpl_vars['PAGINATION']; ?>

</div>
</div>
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
<input id="custom_hidden_1" type="hidden" name="custom_hidden_1" value=""/>
<input id="custom_hidden_2" type="hidden" name="custom_hidden_2" value=""/>
</form>
</div>
</td>
</tr>
</table>
</div>
<?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div class="row" style="border:1px solid #d9dada; margin-top:5px;background-color:white;" >
<div class="col-sm-7 custom-left-panel" style="padding:0px 0px 10px 0px">
<div id="FP_events_detailview_tabs"
class="yui-navset detailview_tabs" style="padding:0px;"
>

<ul class="yui-nav custom-yui-nav">

<li><a id="tab0" href="javascript:void(0)"><em ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_OVERVIEW','module' => 'FP_events'), $this);?>
</em></a></li>

<li><a id="tab1" href="javascript:void(0)"><em ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_INVITE','module' => 'FP_events'), $this);?>
</em></a></li>

<li><a id="tab2" href="javascript:void(0)"><em ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ASSIGNMENT','module' => 'FP_events'), $this);?>
</em></a></li>
</ul>
<div class="yui-content" style="min-height:350px">
<div id='tabcontent0'>
<div id='detailpanel_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_PANEL_OVERVIEW' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="name" field="name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['fp_event_locations_fp_events_1_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FP_EVENT_LOCATIONS_FP_EVENTS_1_FROM_FP_EVENT_LOCATIONS_TITLE','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="fp_event_locations_fp_events_1_name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['fp_event_locations_fp_events_1_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['fp_event_locations_fp_events_1fp_event_locations_ida']['value'] )):  ob_start(); ?>index.php?module=FP_Event_Locations&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['fp_event_locations_fp_events_1fp_event_locations_ida']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="fp_event_locations_fp_events_1fp_event_locations_ida" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['fp_event_locations_fp_events_1fp_event_locations_ida']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['fp_event_locations_fp_events_1_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['fp_event_locations_fp_events_1fp_event_locations_ida']['value'] )): ?></a><?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['date_start']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="datetimecombo" field="date_start"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_start']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['date_start']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['date_start']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['date_start']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['date_start']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['date_end']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_END','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="datetimecombo" field="date_end"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_end']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['date_end']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['date_end']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['date_end']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['date_end']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['date_end']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['duration']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DURATION','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="duration"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['duration']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="duration" class="sugar_field"><?php echo $this->_tpl_vars['fields']['duration_hours']['value'];  echo $this->_tpl_vars['MOD']['LBL_HOURS_ABBREV']; ?>
 <?php echo $this->_tpl_vars['fields']['duration_minutes']['value'];  echo $this->_tpl_vars['MOD']['LBL_MINSS_ABBREV']; ?>
 </span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['budget']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BUDGET','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="currency" field="budget"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['budget']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['budget']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['budget']['value']), $this);?>

</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="text" field="description"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="assigned_user_name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id="assigned_user_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['e_employee_fp_events_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_E_EMPLOYEE_FP_EVENTS_FROM_E_EMPLOYEE_TITLE','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="e_employee_fp_events_name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['e_employee_fp_events_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['e_employee_fp_eventse_employee_ida']['value'] )):  ob_start(); ?>index.php?module=E_Employee&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['e_employee_fp_eventse_employee_ida']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="e_employee_fp_eventse_employee_ida" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['e_employee_fp_eventse_employee_ida']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['e_employee_fp_events_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['e_employee_fp_eventse_employee_ida']['value'] )): ?></a><?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<span >&nbsp;</span>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_OVERVIEW").style.display='none';</script>
<?php endif; ?>
</div>    <div id='tabcontent1'>
<div id='detailpanel_2' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_EMAIL_INVITE' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['invite_templates']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_INVITE_TEMPLATES','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="invite_templates"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['invite_templates']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['invite_templates']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['invite_templates']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['invite_templates']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['invite_templates']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['invite_templates']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['invite_templates']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['invite_templates']['options'][$this->_tpl_vars['fields']['invite_templates']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['accept_redirect']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ACCEPT_REDIRECT','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="url" field="accept_redirect"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['accept_redirect']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php ob_start();  echo $this->_tpl_vars['fields']['accept_redirect']['value'];  $this->_smarty_vars['capture']['getLink'] = ob_get_contents();  $this->assign('link', ob_get_contents());ob_end_clean();  if (! empty ( $this->_tpl_vars['link'] )):  ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 7) : substr($_tmp, 0, 7));  $this->_smarty_vars['capture']['getStart'] = ob_get_contents();  $this->assign('linkStart', ob_get_contents());ob_end_clean(); ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['accept_redirect']['name']; ?>
">
<a href='<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('to_url', true, $_tmp) : smarty_modifier_to_url($_tmp)); ?>
' target='_blank' ><?php echo $this->_tpl_vars['link']; ?>
</a>
</span>
<?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['decline_redirect']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DECLINE_REDIRECT','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="url" field="decline_redirect"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['decline_redirect']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php ob_start();  echo $this->_tpl_vars['fields']['decline_redirect']['value'];  $this->_smarty_vars['capture']['getLink'] = ob_get_contents();  $this->assign('link', ob_get_contents());ob_end_clean();  if (! empty ( $this->_tpl_vars['link'] )):  ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 7) : substr($_tmp, 0, 7));  $this->_smarty_vars['capture']['getStart'] = ob_get_contents();  $this->assign('linkStart', ob_get_contents());ob_end_clean(); ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['decline_redirect']['name']; ?>
">
<a href='<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('to_url', true, $_tmp) : smarty_modifier_to_url($_tmp)); ?>
' target='_blank' ><?php echo $this->_tpl_vars['link']; ?>
</a>
</span>
<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<span >&nbsp;</span>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EMAIL_INVITE").style.display='none';</script>
<?php endif; ?>
</div>    <div id='tabcontent2'>
<div id='detailpanel_3' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_PANEL_ASSIGNMENT' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ENTERED','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="datetime" field="date_entered"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_entered" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_entered']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['created_by_name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_MODIFIED','module' => 'FP_events'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="datetime" field="date_modified"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_modified" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_modified']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['modified_by_name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<span >&nbsp;</span>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
<?php endif; ?>
</div>
</div>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script>                                                                                                                                                                                <script type='text/javascript' src='<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/popup_helper.js'), $this);?>
'></script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'cache/include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
<script type="text/javascript">
var FP_events_detailview_tabs = new YAHOO.widget.TabView("FP_events_detailview_tabs");
FP_events_detailview_tabs.selectTab(0);
                                                                                                                </script>
<script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>
<!--
<button type="button" id="history_activities_modal_button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalcustom_popup">Open Large Modal</button>
-->
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
<li class="active" id="remove_color_current_level_c"><span><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ASSIGNMENT','module' => 'FP_events'), $this);?>
 </span><br><span 		class="small_font">
</span>
</li>
</ul>
</form>
</div>
</div>
</div>
</div>