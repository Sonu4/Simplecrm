(
	SELECT accounts.id ,  accounts.assigned_user_id ,  accounts.name , 
    accounts.phone_office  ,  jt0.user_name assigned_user_name ,
    jt0.created_by assigned_user_name_owner  ,  
    'Users' assigned_user_name_mod,  accounts.created_by  ,
    'accounts' panel_name  
    FROM accounts 
    LEFT JOIN accounts_cstm ON accounts.id = accounts_cstm.id_c   
    LEFT JOIN  users jt0 ON accounts.assigned_user_id=jt0.id AND jt0.deleted=0

    AND jt0.deleted=0 
    INNER JOIN  prospect_lists_prospects
     ON accounts.id=prospect_lists_prospects.related_id 
     AND prospect_lists_prospects.prospect_list_id='716a75f9-a52f-e969-a50b-5a531495614c' 
     AND prospect_lists_prospects.deleted=0
    AND prospect_lists_prospects.related_type = 'Accounts'
    where accounts.deleted=0)
    ORDER BY email1 desc LIMIT 0,5

: MySQL error 1054: Unknown column 'email1' in 'order clause'

class="listViewThLinkS1" 
href="javascript:showSubPanel
('accounts','/asci/final/index.php?
	sugar_body_only=1&amp;module=ProspectLists&amp;subpanel=accounts&amp;
	action=SubPanelViewer&amp;
	inline=1&amp;
	record=716a75f9-a52f-e969-a50b-5a531495614c&amp;
	layout_def_key=ProspectLists&amp;ajaxSubpanel=true&amp;ProspectLists_accounts_CELL_offset=&amp;
	inline=true&amp;to_pdf=true&amp;
	action=SubPanelViewer&amp;
	subpanel=accounts&amp;
	ProspectLists_accounts_CELL_ORDER_BY=email1&amp;layout_def_key=ProspectLists',true);">Email &nbsp;<img border="0" src="themes/SuiteR/images/arrow.gif?v=VeLwYwnXQGCb6f-XC8o2rg" width="8" height="10" align="absmiddle" alt="Sort"></a>

		disha.gupta@stc.gov.in


		d:	mv "SchedulersJobs" "s" /opt/rh/httpd24/root/var/www/html/asci/uat/modules/SchedulersJobs -> /opt/rh/httpd24/root/var/www/html/asci/uat/modules/s