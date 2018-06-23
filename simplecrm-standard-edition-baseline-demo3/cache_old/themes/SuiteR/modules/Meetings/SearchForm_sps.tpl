
{if !isset($templateMeta.maxColumnsBasic)}
	{assign var="basicMaxColumns" value=$templateMeta.maxColumns}
{else}
    {assign var="basicMaxColumns" value=$templateMeta.maxColumnsBasic}
{/if}
<script>
{literal}
	$(function() {
	var $dialog = $('<div></div>')
		.html(SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TEXT'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get('app_strings', 'LBL_HELP'),
			width: 700
		});

		$('#filterHelp').click(function() {
		$dialog.dialog('open');
		// prevent the default action, e.g., following a link
	});

	});
{/literal}
</script>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>

      
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}

	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='first_name_basic'> {sugar_translate label='' module='Meetings'}
		</td>


	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.first_name_basic.value) <= 0}
{assign var="value" value=$fields.first_name_basic.default_value }
{else}
{assign var="value" value=$fields.first_name_basic.value }
{/if}  
<input type='text' name='{$fields.first_name_basic.name}' 
    id='{$fields.first_name_basic.name}' size='30' 
     
    value='{$value}' title=''      accesskey='9'  >
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}

	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='last_name_basic'> {sugar_translate label='' module='Meetings'}
		</td>


	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.last_name_basic.value) <= 0}
{assign var="value" value=$fields.last_name_basic.default_value }
{else}
{assign var="value" value=$fields.last_name_basic.value }
{/if}  
<input type='text' name='{$fields.last_name_basic.name}' 
    id='{$fields.last_name_basic.name}' size='30' 
     
    value='{$value}' title=''      >
   	   	</td>
    {if $formData|@count >= $basicMaxColumns+1}
    </tr>
    <tr>
	<td colspan="{$searchTableColumnCount}">
    {else}
	<td class="sumbitButtons">
    {/if}
        <input tabindex='2' title='{$APP.LBL_SEARCH_BUTTON_TITLE}' onclick='submitSearch("{$subpanel}");' class='button' type='button' name='search' id='search_form_search' value='{$APP.LBL_SEARCH_BUTTON_TITLE}'/>
	    <input tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}' onclick='clearSearch("{$subpanel}");'  class='button' type='button' name='clear' id='search_form_clear' value='{$APP.LBL_CLEAR_BUTTON_LABEL}'/>
			{$subpanelPageOffset}
		</td>
	</tr>
</table>{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['search_form_modified_by_name_sps']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_sps","modified_user_id_sps"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_created_by_name_sps']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_sps","created_by_sps"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_assigned_user_name_sps']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_sps","assigned_user_id_sps"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_contact_name_sps']={"form":"search_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["contact_name_sps","contact_id_sps","contact_id_sps","contact_id_sps"],"required_list":["contact_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_parent_name_sps']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["parent_name_sps","parent_id_sps"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}