<?php /* Smarty version 2.6.29, created on 2018-06-23 11:38:17
         compiled from include/ListView/FieldBackground.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_field', 'include/ListView/FieldBackground.tpl', 49, false),)), $this); ?>
<?php 
global $db;
$content_query = $db->query("SELECT * FROM listview_field_background where id='1'");
$content_row = $db->fetchByAssoc($content_query);
$our_module= unserialize(base64_decode($content_row['all_module']));
$col=$this->get_template_vars('col');
$rowData=$this->get_template_vars('rowData');
                  foreach($our_module[$_REQUEST['module']] as $fkey=>$field)
                        {
                     
                        if (strtoupper($fkey)==$col)
                        { 
                        
                        // print_r(array_key_exists('field_name',$our_module[$fkey])."-------->".$our_module[$fkey]."<br>");
                       
                        if (array_key_exists('field_name',$field))
                        {    
                      
                           $btkey= array_search($rowData[strtoupper($fkey)],$field['field_name']);
                         if(empty($btkey))
                         {
                             $btkey= array_search($rowData[strtoupper($fkey)],$field['field_name_value']);
                         }
                        echo "<span class='label' style='background-color:".$field['background_color'][$btkey].";color:".$field['text_color'][$btkey].";'>";
                         ?>
                        <?php echo smarty_function_sugar_field(array('parentFieldArray' => $this->_tpl_vars['rowData'],'vardef' => $this->_tpl_vars['params'],'displayType' => 'ListView','field' => $this->_tpl_vars['col']), $this);?>

                        <?php 
                        echo "</span>";


                        }else{
                        echo "<span class='label' style='background-color:".$field['background_color'][0].";color:".$field['text_color'][0].";'>";
                         ?>
                        <?php echo smarty_function_sugar_field(array('parentFieldArray' => $this->_tpl_vars['rowData'],'vardef' => $this->_tpl_vars['params'],'displayType' => 'ListView','field' => $this->_tpl_vars['col']), $this);?>

                        <?php 
                        echo "</span>";
                        }
                        }
                        }

                        if(!array_key_exists(strtolower($col),$our_module[$_REQUEST['module']])) {
                         ?>
                        <?php echo smarty_function_sugar_field(array('parentFieldArray' => $this->_tpl_vars['rowData'],'vardef' => $this->_tpl_vars['params'],'displayType' => 'ListView','field' => $this->_tpl_vars['col']), $this);?>

                        <?php 
                        }





 ?>