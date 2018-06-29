<?php /* Smarty version 2.6.29, created on 2018-06-23 16:55:32
         compiled from cache/themes/SuiteR/modules/Meetings/SearchForm_sps.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/themes/SuiteR/modules/Meetings/SearchForm_sps.tpl', 31, false),array('function', 'math', 'cache/themes/SuiteR/modules/Meetings/SearchForm_sps.tpl', 32, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/Meetings/SearchForm_sps.tpl', 41, false),array('modifier', 'count', 'cache/themes/SuiteR/modules/Meetings/SearchForm_sps.tpl', 85, false),)), $this); ?>

<?php if (! isset ( $this->_tpl_vars['templateMeta']['maxColumnsBasic'] )): ?>
	<?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumns']);  else: ?>
    <?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumnsBasic']);  endif; ?>
<script>
<?php echo '
	$(function() {
	var $dialog = $(\'<div></div>\')
		.html(SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TEXT\'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get(\'app_strings\', \'LBL_HELP\'),
			width: 700
		});

		$(\'#filterHelp\').click(function() {
		$dialog.dialog(\'open\');
		// prevent the default action, e.g., following a link
	});

	});
'; ?>

</script>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>

      
      
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>

	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='first_name_basic'> <?php echo smarty_function_sugar_translate(array('label' => '','module' => 'Meetings'), $this);?>

		</td>


	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['first_name_basic']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['first_name_basic']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['first_name_basic']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['first_name_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['first_name_basic']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
   	   	</td>
    
      
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>

	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='last_name_basic'> <?php echo smarty_function_sugar_translate(array('label' => '','module' => 'Meetings'), $this);?>

		</td>


	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['last_name_basic']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['last_name_basic']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['last_name_basic']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['last_name_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['last_name_basic']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
   	   	</td>
    <?php if (count($this->_tpl_vars['formData']) >= $this->_tpl_vars['basicMaxColumns']+1): ?>
    </tr>
    <tr>
	<td colspan="<?php echo $this->_tpl_vars['searchTableColumnCount']; ?>
">
    <?php else: ?>
	<td class="sumbitButtons">
    <?php endif; ?>
        <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
' onclick='submitSearch("<?php echo $this->_tpl_vars['subpanel']; ?>
");' class='button' type='button' name='search' id='search_form_search' value='<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
'/>
	    <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
' onclick='clearSearch("<?php echo $this->_tpl_vars['subpanel']; ?>
");'  class='button' type='button' name='clear' id='search_form_clear' value='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
'/>
			<?php echo $this->_tpl_vars['subpanelPageOffset']; ?>

		</td>
	</tr>
</table><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'search_form_modified_by_name_sps\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_sps","modified_user_id_sps"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_created_by_name_sps\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_sps","created_by_sps"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_assigned_user_name_sps\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_sps","assigned_user_id_sps"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_contact_name_sps\']={"form":"search_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["contact_name_sps","contact_id_sps","contact_id_sps","contact_id_sps"],"required_list":["contact_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_parent_name_sps\']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["parent_name_sps","parent_id_sps"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>'; ?>