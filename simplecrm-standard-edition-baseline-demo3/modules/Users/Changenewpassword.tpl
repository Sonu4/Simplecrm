{*

/*********************************************************************************
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
 ********************************************************************************/




*}
<link href="custom/modules/Users/login.css" rel="stylesheet"/> 
{literal}
<script type='text/javascript'>
<!--
var ERR_RULES_NOT_MET = '{/literal}{$MOD.ERR_RULES_NOT_MET}{literal}';
var ERR_ENTER_OLD_PASSWORD = '{/literal}{$MOD.ERR_ENTER_OLD_PASSWORD}{literal}';
var ERR_ENTER_NEW_PASSWORD = '{/literal}{$MOD.ERR_ENTER_NEW_PASSWORD}{literal}';
var ERR_ENTER_CONFIRMATION_PASSWORD = '{/literal}{$MOD.ERR_ENTER_CONFIRMATION_PASSWORD}{literal}';
var ERR_REENTER_PASSWORDS = '{/literal}{$MOD.ERR_REENTER_PASSWORDS}{literal}';
        -- >
</script>
<script type='text/javascript' src='{/literal}{sugar_getjspath file="modules/Users/PasswordRequirementBox.js"}{literal}'></script>
    
{/literal}
<div class="container">
    <div class="col-md-4"></div>
    <div class="col-md-4 form">
        <div id="logo-div">
            <img id="logo" align="center" src='custom/themes/default/images/company_logo.png'/>
    
        </div>
        <form role="form" action="index.php" method="post" name="ChangePasswordForm" id="ChangePasswordForm" onsubmit="return document.getElementById('cant_login').value == ''">
            <div id='error' style="text-align:center;padding-bottom: 10px;">
                <span class="error">{$EXPIRATION_TYPE}</span>
            </div>
            <input type="hidden" name="entryPoint" value="{$ENTRY_POINT}" />
            <input type='hidden' name='action' value="{$ACTION}" />
            <input type='hidden' name='module' value="{$MODULE}" />
            <input type="hidden" name="guid" value="{$GUID}" />
            <input type="hidden" name="return_module" value="Home" />
            <input type="hidden" name="login" value="1" />
            <input type="hidden" name="is_admin" value="{$IS_ADMIN}" />
            <input type="hidden" name="cant_login" id="cant_login" value="" />
            <input type="hidden" name="old_password" id="old_password" value="" />
            <input type="hidden" name="password_change" id="password_change" value="true" />
            <input type="hidden" value="" name="user_password" id="user_password" />
            <input type="hidden" name="page" value="Change" />
            <input type="hidden" name="return_id" value="{$ID}" />
            <input type="hidden" name="return_action" value="{$return_action}" />
            <input type="hidden" name="record" value="{$ID}" />
            <input type="hidden" name="user_name" value="{$USER_NAME}" />
            <input type='hidden' name='saveConfig' value='0' />
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="fa fa-lg fa-user prefix"></i></span>
                    {if $OLD_PASSWORD_FIELD == '' &&  $USERNAME_FIELD == '' }

                {/if}
                {$OLD_PASSWORD_FIELD}
                {$USERNAME_FIELD}
            </div>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="fa fa-lg fa-lock prefix"></i></span>
                <input required="required" type="password" id="new_password" name="new_password" value="" onkeyup="password_confirmation();
                                newrules('{$PWDSETTINGS.minpwdlength}', '{$PWDSETTINGS.maxpwdlength}', '{$REGEX}');" placeholder="{$MOD.LBL_NEW_PASSWORD}" />
            </div>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="fa fa-lg fa-check prefix"></i></span>
                <input required="required" type="password" id="confirm_pwd" name="confirm_pwd" value="" onkeyup="password_confirmation();" placeholder="{$MOD.LBL_NEW_PASSWORD2}" /> 
            </div>
            <div id="comfirm_pwd_match" class="error" style="display: none;">{$MOD.LBL_PASSWORD_MIS_MATCH}</div>
            {$SUBMIT_BUTTON}
        </form>
    </div>
</div>        
{*<form action="index.php" method="post" name="ChangePasswordForm" id="ChangePasswordForm" onsubmit="return document.getElementById('cant_login').value == ''">
<table cellpadding="0" align="center" width="100%" cellspacing="0" border="0">
<tr>
<td>
<table cellpadding="0"  cellspacing="0" border="0" align="center">
<tr>
<td style="padding-bottom: 10px;" >
<img src="{$sugar_md}" alt="SuiteCRM" /></td>
</tr>
<tr>
<td align="center">

		<table cellpadding="0" cellspacing="2" border="0" align="center" width="100%" class="edit view">
		<tr>
			<td colspan="2" width="100%" style="font-size: 12px; padding-bottom: 5px; font-weight: normal;">{$INSTRUCTION}</td>
		</tr>
			<input type="hidden" name="entryPoint" value="{$ENTRY_POINT}" />
			<input type='hidden' name='action' value="{$ACTION}" />
			<input type='hidden' name='module' value="{$MODULE}" />
			<input type="hidden" name="guid" value="{$GUID}" />
			<input type="hidden" name="return_module" value="Home" />
			<input type="hidden" name="login" value="1" />
			<input type="hidden" name="is_admin" value="{$IS_ADMIN}" />
			<input type="hidden" name="cant_login" id="cant_login" value="" />
			<input type="hidden" name="old_password" id="old_password" value="" />
			<input type="hidden" name="password_change" id="password_change" value="true" />
			<input type="hidden" value="" name="user_password" id="user_password" />
			<input type="hidden" name="page" value="Change" />
			<input type="hidden" name="return_id" value="{$ID}" />
			<input type="hidden" name="return_action" value="{$return_action}" />
			<input type="hidden" name="record" value="{$ID}" />
			<input type="hidden" name="user_name" value="{$USER_NAME}" />
			<input type='hidden' name='saveConfig' value='0' />
		<tr>
			<td  colspan='2'><span id='post_error' class="error">{$EXPIRATION_TYPE}&nbsp;</span></td>
		</tr>
		
		<tr>
		{if $OLD_PASSWORD_FIELD == '' &&  $USERNAME_FIELD == '' }
		<td  width="30%"></td><td></td>
		{/if}
			{$OLD_PASSWORD_FIELD}
			{$USERNAME_FIELD}
		</tr>
		<tr>
			<td scope="row">{$MOD.LBL_NEW_PASSWORD}:</td>
			<td width="30%"><input type="password" size="26" tabindex="2" id="new_password" name="new_password" value="" onkeyup="password_confirmation();newrules('{$PWDSETTINGS.minpwdlength}','{$PWDSETTINGS.maxpwdlength}','{$REGEX}');" /></td>
		</tr>
		<tr>
			<td scope="row">{$MOD.LBL_NEW_PASSWORD2}:</td>
			<td width="30%"><input type="password" size="26" tabindex="2" id="confirm_pwd" name="confirm_pwd" value="" onkeyup="password_confirmation();" /> <div id="comfirm_pwd_match" class="error" style="display: none;">{$MOD.LBL_PASSWORD_MIS_MATCH}</div></td>
		</tr>
		<tr>
			<td>{$CAPTCHA}</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			{$SUBMIT_BUTTON}
			</td>		
		</tr>
		</table>
	</td>
</tr>
</table>
</td>
</tr>
</table>
</form>*}
