<?php /* Smarty version 2.6.29, created on 2018-06-23 11:38:17
         compiled from include/ListView/ListViewGeneric.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'include/ListView/ListViewGeneric.tpl', 48, false),array('function', 'counter', 'include/ListView/ListViewGeneric.tpl', 434, false),array('function', 'sugar_translate', 'include/ListView/ListViewGeneric.tpl', 453, false),array('function', 'sugar_getimage', 'include/ListView/ListViewGeneric.tpl', 459, false),array('function', 'sugar_ajax_url', 'include/ListView/ListViewGeneric.tpl', 535, false),array('modifier', 'ucfirst', 'include/ListView/ListViewGeneric.tpl', 355, false),array('modifier', 'replace', 'include/ListView/ListViewGeneric.tpl', 360, false),array('modifier', 'default', 'include/ListView/ListViewGeneric.tpl', 442, false),array('modifier', 'lower', 'include/ListView/ListViewGeneric.tpl', 445, false),array('modifier', 'upper', 'include/ListView/ListViewGeneric.tpl', 448, false),array('modifier', 'cat', 'include/ListView/ListViewGeneric.tpl', 549, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'include/ListView/ListViewColumnsFilterDialog.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type='text/javascript' src='<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/popup_helper.js'), $this);?>
'></script>


<style>
    <?php echo '
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
    
    '; ?>

</style>


<script>
    <?php echo '
    $(document).ready(function () {
      $("ul.clickMenu").each(function (index, node) {
        $(node).sugarActionMenu();
      });

      $(\'.selectActionsDisabled\').children().each(function (index) {
        $(this).attr(\'onclick\', \'\').unbind(\'click\');
      });

      var selectedTopValue = $("#selectCountTop").attr("value");
      if (typeof(selectedTopValue) != "undefined" && selectedTopValue != "0") {
        sugarListView.prototype.toggleSelected();
      }

            $(\'.profile_pic_c_custom img\').attr(\'class\', \'img-circle\');
           

            $(\'.profile_pic_c_custom img\').on(\'click\', function () {
                $(\'.gen_side_pane\').addClass(\'show_side_pane\');
                var str = \'<div class="loader_pane"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>\';
                $(\'#pane_container_data\').html(str);
                var previewid = $(this).parent(\'td\').data(\'previewid\');
                // $(this).closest(\'table tr\').css(\'background-color\',\'#white !important\');
                //$(this).closest(\'tr\').attr(\'style\',\'background-color:#f5f5f5 !important\');
                $.ajax({
                    url: \'customer_preview.php\',
                    data: {id: previewid, },
                    type: \'post\',
                    success: function (data) {
                        $(\'#pane_container_data\').html(data);
                    }
    });
            });
        });

        

    '; ?>

</script>
<?php $this->assign('currentModule', $this->_tpl_vars['pageData']['bean']['moduleDir']);  $this->assign('singularModule', $this->_tpl_vars['moduleListSingular'][$this->_tpl_vars['currentModule']]);  $this->assign('moduleName', $this->_tpl_vars['moduleList'][$this->_tpl_vars['currentModule']]);  $this->assign('hideTable', false); ?>

<?php if (count ( $this->_tpl_vars['data'] ) == 0): ?>
    <?php $this->assign('hideTable', true); ?>
    <div class="list view listViewEmpty">
        <!--Modified By Swapnil for Notifications Start-->
        <div class="alert alert-info text-center col-lg-6 col-md-6 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3" role="alert">
        <?php if ($this->_tpl_vars['displayEmptyDataMesssages']): ?>
            <?php if (strlen ( $this->_tpl_vars['query'] ) == 0): ?>
                <?php ob_start(); ?><a href="?module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&action=EditView&return_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_action=DetailView"><?php echo ((is_array($_tmp=$this->_tpl_vars['APP']['LBL_CREATE_BUTTON_LABEL'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
 <i class="fa fa-plus" aria-hidden="true"></i>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('createLink', ob_get_contents());ob_end_clean();  ob_start(); ?><a href="?module=Import&action=Step1&import_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_action=index"><?php echo ((is_array($_tmp=$this->_tpl_vars['APP']['LBL_IMPORT'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
 <i class="fa fa-upload" aria-hidden="true"></i></a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('importLink', ob_get_contents());ob_end_clean(); ?>
                <?php ob_start(); ?><a target="_blank" href='?module=Administration&action=SupportPortal&view=documentation&version=<?php echo $this->_tpl_vars['sugar_info']['sugar_version']; ?>
&edition=<?php echo $this->_tpl_vars['sugar_info']['sugar_flavor']; ?>
&lang=&help_module=<?php echo $this->_tpl_vars['currentModule']; ?>
&help_action=&key='><?php echo $this->_tpl_vars['APP']['LBL_CLICK_HERE']; ?>
</a><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('helpLink', ob_get_contents());ob_end_clean(); ?>
                <p class="msg">
                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['APP']['MSG_EMPTY_LIST_VIEW_NO_RESULTS'])) ? $this->_run_mod_handler('replace', true, $_tmp, "<item2>", $this->_tpl_vars['createLink']) : smarty_modifier_replace($_tmp, "<item2>", $this->_tpl_vars['createLink'])))) ? $this->_run_mod_handler('replace', true, $_tmp, "<item3>", $this->_tpl_vars['importLink']) : smarty_modifier_replace($_tmp, "<item3>", $this->_tpl_vars['importLink'])); ?>

                    
                </p>
            <?php elseif ($this->_tpl_vars['query'] == "-advanced_search"): ?>
                <p class="msg emptyResults">
                   <i class="fa fa-meh-o fa-2x"></i> <?php echo $this->_tpl_vars['APP']['MSG_LIST_VIEW_NO_RESULTS_CHANGE_CRITERIA']; ?>
 
                </p>
            <?php else: ?>
                <p class="msg">
                    <?php ob_start(); ?>"<?php echo $this->_tpl_vars['query']; ?>
"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('quotedQuery', ob_get_contents());ob_end_clean(); ?>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['APP']['MSG_LIST_VIEW_NO_RESULTS'])) ? $this->_run_mod_handler('replace', true, $_tmp, "<item1>", $this->_tpl_vars['quotedQuery']) : smarty_modifier_replace($_tmp, "<item1>", $this->_tpl_vars['quotedQuery'])); ?>

                </p>
                <p class="submsg">
                    <a href="?module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&action=EditView&return_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_action=DetailView">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['APP']['MSG_LIST_VIEW_NO_RESULTS_SUBMSG'])) ? $this->_run_mod_handler('replace', true, $_tmp, "<item1>", $this->_tpl_vars['quotedQuery']) : smarty_modifier_replace($_tmp, "<item1>", $this->_tpl_vars['quotedQuery'])))) ? $this->_run_mod_handler('replace', true, $_tmp, "<item2>", $this->_tpl_vars['singularModule']) : smarty_modifier_replace($_tmp, "<item2>", $this->_tpl_vars['singularModule'])); ?>

                    </a>
                </p>
            <?php endif; ?>
        <?php else: ?>
            <p class="msg">
                <?php echo $this->_tpl_vars['APP']['LBL_NO_DATA']; ?>

            </p>
        <?php endif; ?>
            </div>
    </div>
   <!--Modified By Swapnil for Notifications End -->     
<?php endif;  echo $this->_tpl_vars['multiSelectData']; ?>

<?php if ($this->_tpl_vars['hideTable'] == false): ?>
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
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "include/ListView/IntelligencePane.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <!--Generic Intelligence Panel end-->
    
  
    <?php if ($_REQUEST['module'] == 'scrm_Retail_Customer'): ?>
        <!--Customer 360 Pop up start-->    
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "include/ListView/Customer360Popup.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <!--Customer 360 Pop up end-->
    <?php endif; ?>

    <table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view '>
        <thead>
        <?php $this->assign('link_select_id', 'selectLinkTop'); ?>
        <?php $this->assign('link_action_id', 'actionLinkTop'); ?>
        <?php $this->assign('actionsLink', $this->_tpl_vars['actionsLinkTop']); ?>
        <?php $this->assign('selectLink', $this->_tpl_vars['selectLinkTop']); ?>
        <?php $this->assign('action_menu_location', 'top'); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'include/ListView/ListViewPagination.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <tr height='20' style="border-bottom: 1px solid #d9dada !important;border-top: 1px solid #d9dada !important;background-color:white !important;">
            <?php if ($this->_tpl_vars['prerow']): ?>
                    <td width='1%' class="td_alt" style="padding:12px !important;">
                    &nbsp;
                </td>
            <?php endif; ?>
            <?php if (! empty ( $this->_tpl_vars['quickViewLinks'] )): ?>
                <td class='td_alt' width='1%' style="padding: 0px;">&nbsp;</td>
            <?php endif; ?>
            <?php echo smarty_function_counter(array('start' => 0,'name' => 'colCounter','print' => false,'assign' => 'colCounter'), $this);?>

            <?php $this->assign('datahide', 'phone'); ?>
            <?php $_from = $this->_tpl_vars['displayColumns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colHeader'] => $this->_tpl_vars['params']):
?>
                <?php if ($this->_tpl_vars['colCounter'] == '3'):  $this->assign('datahide', "phone,phonelandscape");  endif; ?>
                <?php if ($this->_tpl_vars['colCounter'] == '5'):  $this->assign('datahide', "phone,phonelandscape,tablet");  endif; ?>
            <?php if ($this->_tpl_vars['colHeader'] == 'NAME' || $this->_tpl_vars['params']['bold']): ?><th scope='col' valign="top" data-toggle="true">
            <?php else: ?><th scope='col' valign="top" data-hide="<?php echo $this->_tpl_vars['datahide']; ?>
"><?php endif; ?>

                <div style='white-space: normal;font-weight:bold !important' width='100%' align='<?php echo ((is_array($_tmp=@$this->_tpl_vars['params']['align'])) ? $this->_run_mod_handler('default', true, $_tmp, 'left') : smarty_modifier_default($_tmp, 'left')); ?>
' class="text-uppercase">
                    <?php if (((is_array($_tmp=@$this->_tpl_vars['params']['sortable'])) ? $this->_run_mod_handler('default', true, $_tmp, true) : smarty_modifier_default($_tmp, true))): ?>
                    <?php if ($this->_tpl_vars['params']['url_sort']): ?>
                            <a href='<?php echo $this->_tpl_vars['pageData']['urls']['orderBy'];  echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['params']['orderBy'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['colHeader']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['colHeader'])))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
' class='listViewThLinkS1'>
                        <?php else: ?>
                        <?php if (((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['params']['orderBy'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['colHeader']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['colHeader'])))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)) == $this->_tpl_vars['pageData']['ordering']['orderBy']): ?>
                                    <a href='javascript:sListView.order_checks("<?php echo ((is_array($_tmp=@$this->_tpl_vars['pageData']['ordering']['sortOrder'])) ? $this->_run_mod_handler('default', true, $_tmp, 'ASCerror') : smarty_modifier_default($_tmp, 'ASCerror')); ?>
", "<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['params']['orderBy'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['colHeader']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['colHeader'])))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
" , "<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir'];  echo '2_';  echo ((is_array($_tmp=$this->_tpl_vars['pageData']['bean']['objectName'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  echo '_ORDER_BY'; ?>
")' class='listViewThLinkS1'>
                            <?php else: ?>
                                        <a href='javascript:sListView.order_checks("ASC", "<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['params']['orderBy'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['colHeader']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['colHeader'])))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
" , "<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir'];  echo '2_';  echo ((is_array($_tmp=$this->_tpl_vars['pageData']['bean']['objectName'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  echo '_ORDER_BY'; ?>
")' class='listViewThLinkS1'>
                                <?php endif; ?>
                                <?php endif; ?>
                                    <strong><?php echo smarty_function_sugar_translate(array('label' => $this->_tpl_vars['params']['label'],'module' => $this->_tpl_vars['pageData']['bean']['moduleDir']), $this);?>

                                        &nbsp;&nbsp;</strong>
                                <?php if (((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['params']['orderBy'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['colHeader']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['colHeader'])))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)) == $this->_tpl_vars['pageData']['ordering']['orderBy']): ?>
                                    <?php if ($this->_tpl_vars['pageData']['ordering']['sortOrder'] == 'ASC'): ?>
                                        <?php ob_start(); ?>arrow_down.<?php echo $this->_tpl_vars['arrowExt'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('imageName', ob_get_contents());ob_end_clean(); ?>
                                        <?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_SORT_DESC'), $this); $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('alt_sort', ob_get_contents());ob_end_clean(); ?>
                                        <?php echo smarty_function_sugar_getimage(array('name' => $this->_tpl_vars['imageName'],'attr' => 'align="absmiddle" border="0" ','alt' => ($this->_tpl_vars['alt_sort'])), $this);?>

                                    <?php else: ?>
                                        <?php ob_start(); ?>arrow_up.<?php echo $this->_tpl_vars['arrowExt'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('imageName', ob_get_contents());ob_end_clean(); ?>
                                        <?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_SORT_ASC'), $this); $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('alt_sort', ob_get_contents());ob_end_clean(); ?>
                                        <?php echo smarty_function_sugar_getimage(array('name' => $this->_tpl_vars['imageName'],'attr' => 'align="absmiddle" border="0" ','alt' => ($this->_tpl_vars['alt_sort'])), $this);?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php ob_start(); ?>arrow.<?php echo $this->_tpl_vars['arrowExt'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('imageName', ob_get_contents());ob_end_clean(); ?>
                                    <?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_SORT'), $this); $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('alt_sort', ob_get_contents());ob_end_clean(); ?>
                                    <?php echo smarty_function_sugar_getimage(array('name' => $this->_tpl_vars['imageName'],'attr' => 'align="absmiddle" border="0" ','alt' => ($this->_tpl_vars['alt_sort'])), $this);?>

                                <?php endif; ?>
                            </a>
                            <?php else: ?>
                            <?php if (! isset ( $this->_tpl_vars['params']['noHeader'] ) || $this->_tpl_vars['params']['noHeader'] == false): ?>
                                <?php echo smarty_function_sugar_translate(array('label' => $this->_tpl_vars['params']['label'],'module' => $this->_tpl_vars['pageData']['bean']['moduleDir']), $this);?>

                            <?php endif; ?>
                            <?php endif; ?>
                </div>
                </th>
                <?php echo smarty_function_counter(array('name' => 'colCounter'), $this);?>

            <?php endforeach; endif; unset($_from); ?>
            <th></th>

        </tr>
        </thead>
        <?php echo smarty_function_counter(array('start' => $this->_tpl_vars['pageData']['offsets']['current'],'print' => false,'assign' => 'offset','name' => 'offset'), $this);?>

        <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rowIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rowIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['rowData']):
        $this->_foreach['rowIteration']['iteration']++;
?>
            <?php echo smarty_function_counter(array('name' => 'offset','print' => false), $this);?>

            <?php $this->assign('scope_row', true); ?>

            <?php if ((1 & $this->_foreach['rowIteration']['iteration'])): ?>
                <?php $this->assign('_rowColor', $this->_tpl_vars['rowColor'][0]); ?>
            <?php else: ?>
                <?php $this->assign('_rowColor', $this->_tpl_vars['rowColor'][1]); ?>
            <?php endif; ?>
                <tr height='20' class='<?php echo $this->_tpl_vars['_rowColor']; ?>
S1' style="background-color:white !important">
                <?php if ($this->_tpl_vars['prerow']): ?>
                        <td width='1%' class='nowrap'> &nbsp;&nbsp;&nbsp;
                        <?php if (! $this->_tpl_vars['is_admin'] && is_admin_for_user && $this->_tpl_vars['rowData']['IS_ADMIN'] == 1): ?>
                            <input type='checkbox' disabled="disabled" class='checkbox' value='<?php echo $this->_tpl_vars['rowData']['ID']; ?>
'>
                        <?php else: ?>
                                <input title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_THIS_ROW_TITLE'), $this);?>
" onclick='sListView.check_item(this, document.MassUpdate)' type='checkbox' class='checkbox' name='mass[]' value='<?php echo $this->_tpl_vars['rowData']['ID']; ?>
' id="<?php echo $this->_tpl_vars['rowData']['ID']; ?>
">


                        <?php endif; ?>
                    </td>
                <?php endif; ?>
                <?php if (! empty ( $this->_tpl_vars['quickViewLinks'] )): ?>
                    <?php ob_start();  if ($this->_tpl_vars['params']['dynamic_module']):  echo $this->_tpl_vars['rowData'][$this->_tpl_vars['params']['dynamic_module']];  else:  echo $this->_tpl_vars['pageData']['bean']['moduleDir'];  endif;  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('linkModule', ob_get_contents());ob_end_clean(); ?>
                    <?php ob_start();  if ($this->_tpl_vars['act']):  echo $this->_tpl_vars['act'];  else: ?>EditView<?php endif;  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('action', ob_get_contents());ob_end_clean(); ?>
                    <td width='2%' nowrap>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['ActionMenu'])) ? $this->_run_mod_handler('replace', true, $_tmp, '|DATA|', $this->_tpl_vars['rowData']['ID']) : smarty_modifier_replace($_tmp, '|DATA|', $this->_tpl_vars['rowData']['ID'])); ?>

                    </td>

                <?php endif; ?>
                <?php echo smarty_function_counter(array('start' => 0,'name' => 'colCounter','print' => false,'assign' => 'colCounter'), $this);?>

                <?php $_from = $this->_tpl_vars['displayColumns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['params']):
?>

                    <?php if ($this->_tpl_vars['colCounter'] == '0'): ?>
                        <?php $this->assign('hiddenclass', ""); ?>
                    <?php elseif ($this->_tpl_vars['colCounter'] < '5'): ?>
                        <?php $this->assign('hiddenclass', "hidden-xs"); ?>
                    <?php elseif ($this->_tpl_vars['colCounter'] >= '5'): ?>
                        <?php $this->assign('hiddenclass', "hidden-xs hidden-sm hidden-md"); ?>
                    <?php endif; ?>
                    <?php echo $this->_tpl_vars['displayColumns'][$this->_sections['type']['index']]; ?>

                    <?php echo '<td data-previewid="';  echo ((is_array($_tmp=@$this->_tpl_vars['rowData'][$this->_tpl_vars['params']['id']])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['rowData']['ID']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['rowData']['ID']));  echo '"  ';  if ($this->_tpl_vars['scope_row']):  echo ' scope=\'row\' ';  endif;  echo ' align=\'';  echo ((is_array($_tmp=@$this->_tpl_vars['params']['align'])) ? $this->_run_mod_handler('default', true, $_tmp, 'left') : smarty_modifier_default($_tmp, 'left'));  echo '\' valign="top"  type="';  echo $this->_tpl_vars['displayColumns'][$this->_tpl_vars['col']]['type'];  echo '" field="';  echo ((is_array($_tmp=$this->_tpl_vars['col'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp));  echo '" class="';  if ($this->_tpl_vars['inline_edit'] && ( $this->_tpl_vars['displayColumns'][$this->_tpl_vars['col']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['displayColumns'][$this->_tpl_vars['col']]['inline_edit'] ) )):  echo 'inlineEdit';  endif;  echo '';  if (( $this->_tpl_vars['params']['type'] == 'teamset' )):  echo 'nowrap';  endif;  echo '';  if (preg_match ( '/PHONE/' , $this->_tpl_vars['col'] )):  echo ' phone';  endif;  echo ' ';  echo ((is_array($_tmp=$this->_tpl_vars['col'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp));  echo '_custom">';  if ($this->_tpl_vars['col'] == 'NAME' || $this->_tpl_vars['params']['bold']):  echo '';  echo '';  endif;  echo '';  if ($this->_tpl_vars['params']['link'] && ! $this->_tpl_vars['params']['customCode']):  echo '';  ob_start();  echo '';  if ($this->_tpl_vars['params']['dynamic_module']):  echo '';  echo $this->_tpl_vars['rowData'][$this->_tpl_vars['params']['dynamic_module']];  echo '';  else:  echo '';  echo ((is_array($_tmp=@$this->_tpl_vars['params']['module'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['pageData']['bean']['moduleDir']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['pageData']['bean']['moduleDir']));  echo '';  endif;  echo '';  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('linkModule', ob_get_contents());ob_end_clean();  echo '';  ob_start();  echo '';  if ($this->_tpl_vars['act']):  echo '';  echo $this->_tpl_vars['act'];  echo '';  else:  echo 'DetailView';  endif;  echo '';  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('action', ob_get_contents());ob_end_clean();  echo '';  ob_start();  echo '';  echo ((is_array($_tmp=@$this->_tpl_vars['rowData'][$this->_tpl_vars['params']['id']])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['rowData']['ID']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['rowData']['ID']));  echo '';  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('record', ob_get_contents());ob_end_clean();  echo '';  ob_start();  echo 'index.php?module=';  echo $this->_tpl_vars['linkModule'];  echo '&offset=';  echo $this->_tpl_vars['offset'];  echo '&stamp=';  echo $this->_tpl_vars['pageData']['stamp'];  echo '&return_module=';  echo $this->_tpl_vars['linkModule'];  echo '&action=';  echo $this->_tpl_vars['action'];  echo '&record=';  echo $this->_tpl_vars['record'];  echo '';  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('url', ob_get_contents());ob_end_clean();  echo '<';  echo ((is_array($_tmp=@$this->_tpl_vars['pageData']['tag'][$this->_tpl_vars['id']][$this->_tpl_vars['params']['ACLTag']])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['pageData']['tag'][$this->_tpl_vars['id']]['MAIN']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['pageData']['tag'][$this->_tpl_vars['id']]['MAIN']));  echo ' href="';  echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['url']), $this); echo '">';  endif;  echo '';  if ($this->_tpl_vars['params']['customCode']):  echo '';  echo '';  $this->assign('field_name', $this->_tpl_vars['params']['name']);  echo '';  $this->assign('field_name1', ((is_array($_tmp=$this->_tpl_vars['field_name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)));  echo '';  echo $this->_tpl_vars['rowData'][$this->_tpl_vars['field_name1']];  echo '';  else:  echo '';  $this->assign('dir', 'upload/');  echo '';  if ($this->_tpl_vars['col'] == 'PROFILE_PIC_C' && $_REQUEST['module'] == 'scrm_Retail_Customer' && ! file_exists ( ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['dir'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rowData']['ID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rowData']['ID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '_profile_pic_c') : smarty_modifier_cat($_tmp, '_profile_pic_c')) )):  echo '<img id="profile_pic_c" src="custom/themes/default/images/custom_default.png" style="max-width: 200px;" class="img-circle" height="50">';  else:  echo '';  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "include/ListView/FieldBackground.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo '';  endif;  echo '';  endif;  echo '';  if (empty ( $this->_tpl_vars['rowData'][$this->_tpl_vars['col']] ) && empty ( $this->_tpl_vars['params']['customCode'] )):  echo '&nbsp;';  endif;  echo '';  if ($this->_tpl_vars['params']['link'] && ! $this->_tpl_vars['params']['customCode']):  echo '</';  echo ((is_array($_tmp=@$this->_tpl_vars['pageData']['tag'][$this->_tpl_vars['id']][$this->_tpl_vars['params']['ACLTag']])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['pageData']['tag'][$this->_tpl_vars['id']]['MAIN']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['pageData']['tag'][$this->_tpl_vars['id']]['MAIN']));  echo '>';  endif;  echo '';  if ($this->_tpl_vars['inline_edit'] && ( $this->_tpl_vars['displayColumns'][$this->_tpl_vars['col']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['displayColumns'][$this->_tpl_vars['col']]['inline_edit'] ) )):  echo '<div class="inlineEditIcon">';  echo smarty_function_sugar_getimage(array('name' => "inline_edit_icon.svg",'attr' => 'border="0" ','alt' => ($this->_tpl_vars['alt_edit'])), $this); echo '</div>';  endif;  echo '</td>'; ?>

                    <?php $this->assign('scope_row', false); ?>
                    <?php echo smarty_function_counter(array('name' => 'colCounter'), $this);?>


                <?php endforeach; endif; unset($_from); ?>
<td align='right' style="padding:0px 15px 0px 0px !important;"><a title="Preview" style="cursor:pointer;color:#6d6d6d !important"><?php echo $this->_tpl_vars['pageData']['additionalDetails'][$this->_tpl_vars['id']]; ?>
</a></td>
            </tr>
            <?php endforeach; else: ?>
            <tr height='20' class='<?php echo $this->_tpl_vars['rowColor'][0]; ?>
S1'>
                <td colspan="<?php echo $this->_tpl_vars['colCount']; ?>
">
                    <em><?php echo $this->_tpl_vars['APP']['LBL_NO_DATA']; ?>
</em>
                </td>
            </tr>
        <?php endif; unset($_from); ?>
        <?php $this->assign('link_select_id', 'selectLinkBottom'); ?>
        <?php $this->assign('link_action_id', 'actionLinkBottom'); ?>
        <?php $this->assign('selectLink', $this->_tpl_vars['selectLinkBottom']); ?>
        <?php $this->assign('actionsLink', $this->_tpl_vars['actionsLinkBottom']); ?>
        <?php $this->assign('action_menu_location', 'bottom'); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'include/ListView/ListViewPagination.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </table>
<?php endif;  if ($this->_tpl_vars['contextMenus']): ?>
    <script type="text/javascript">
        <?php echo $this->_tpl_vars['contextMenuScript']; ?>

        <?php echo '
        function lvg_nav(m, id, act, offset, t) {
          if (t.href.search(/#/) < 0) {
            return;
          }
          else {
            if (act == \'pte\') {
              act = \'ProjectTemplatesEditView\';
            }
            else if (act == \'d\') {
              act = \'DetailView\';
            } else if (act == \'ReportsWizard\') {
              act = \'ReportsWizard\';
            } else {
              act = \'EditView\';
            }
              '; ?>

            url = 'index.php?module=' + m + '&offset=' + offset + '&stamp=<?php echo $this->_tpl_vars['pageData']['stamp']; ?>
&return_module=' + m + '&action=' + act + '&record=' + id;
            t.href = url;
              <?php echo '
          }
        }'; ?>

        <?php echo '
        function lvg_dtails(id) {'; ?>

                    return SUGAR.util.getAdditionalDetails('<?php echo ((is_array($_tmp=@$this->_tpl_vars['pageData']['bean']['moduleDir'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['params']['module']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['params']['module'])); ?>
', id, 'adspan_' + id);<?php echo '
                }'; ?>


                <?php echo '
                    function DeleteRecord(id, module, action) {

                        // t=document.getElementById(id).checked = true;
                        // // sListView.check_item(document.getElementById(id), document.MassUpdate);
                        // var r = sListView.send_mass_update(\'selected\',\'Please select at least 1 record to proceed.\', 1);

                        // r?\'\':document.getElementById(id).checked = false;
                        if (confirm("Are you sure, you want to delete this record?")) {

                            $.ajax({
                                url: \'custom_actions.php\',
                                data: {id: id, module: module, action: action},
                                type: \'post\',
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
                '; ?>

    </script>
    <script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<?php endif; ?>