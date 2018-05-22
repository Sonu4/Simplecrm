<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2018-05-21 18:53:01
$dictionary['shubh_Bookstore']['fields']['cities_c']['inline_edit']='1';
$dictionary['shubh_Bookstore']['fields']['cities_c']['labelValue']='Cities';

 

 // created: 2018-05-19 13:39:54
$dictionary['shubh_Bookstore']['fields']['total_no_of_books_c']['inline_edit']='1';
$dictionary['shubh_Bookstore']['fields']['total_no_of_books_c']['labelValue']='Total no of books';

 

 // created: 2018-05-14 11:05:20

 

 // created: 2018-05-21 17:37:49
$dictionary['shubh_Bookstore']['fields']['states_c']['inline_edit']='1';
$dictionary['shubh_Bookstore']['fields']['states_c']['labelValue']='states';

 

 // created: 2018-05-14 11:06:24
$dictionary['shubh_Bookstore']['fields']['publishing_date_c']['inline_edit']='1';
$dictionary['shubh_Bookstore']['fields']['publishing_date_c']['labelValue']='publishing date';

 

 // created: 2018-05-17 16:36:55
$dictionary['shubh_Bookstore']['fields']['name']['audited']=true;
$dictionary['shubh_Bookstore']['fields']['name']['inline_edit']=true;
$dictionary['shubh_Bookstore']['fields']['name']['duplicate_merge']='disabled';
$dictionary['shubh_Bookstore']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['shubh_Bookstore']['fields']['name']['merge_filter']='disabled';
$dictionary['shubh_Bookstore']['fields']['name']['unified_search']=false;
$dictionary['shubh_Bookstore']['fields']['name']['comments']='This is a title of book';

 

 // created: 2018-05-22 14:26:00
$dictionary['shubh_Bookstore']['fields']['country_c']['inline_edit']='1';
$dictionary['shubh_Bookstore']['fields']['country_c']['labelValue']='Country';

 

// created: 2018-05-14 11:01:18
$dictionary["shubh_Bookstore"]["fields"]["shubh_bookstore_accounts"] = array (
  'name' => 'shubh_bookstore_accounts',
  'type' => 'link',
  'relationship' => 'shubh_bookstore_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_SHUBH_BOOKSTORE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'shubh_bookstore_accountsaccounts_ida',
);
$dictionary["shubh_Bookstore"]["fields"]["shubh_bookstore_accounts_name"] = array (
  'name' => 'shubh_bookstore_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SHUBH_BOOKSTORE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'shubh_bookstore_accountsaccounts_ida',
  'link' => 'shubh_bookstore_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["shubh_Bookstore"]["fields"]["shubh_bookstore_accountsaccounts_ida"] = array (
  'name' => 'shubh_bookstore_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'shubh_bookstore_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SHUBH_BOOKSTORE_ACCOUNTS_FROM_SHUBH_BOOKSTORE_TITLE',
);


 // created: 2018-05-17 10:06:44
$dictionary['shubh_Bookstore']['fields']['bookstore']['required']=true;
$dictionary['shubh_Bookstore']['fields']['bookstore']['audited']=true;
$dictionary['shubh_Bookstore']['fields']['bookstore']['importable']='required';

 

 // created: 2018-05-19 13:38:40
$dictionary['shubh_Bookstore']['fields']['price_c']['inline_edit']='1';
$dictionary['shubh_Bookstore']['fields']['price_c']['labelValue']='Price';

 
?>