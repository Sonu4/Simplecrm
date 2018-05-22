{php}
/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
*/
    
global $db;
$content_query = $db->query("SELECT * FROM listview_field_background where id='1'");
$content_row = $db->fetchByAssoc($content_query);
$our_module= unserialize(base64_decode($content_row['all_module']));
$col=$this->get_template_vars('col');
$rowData=$this->get_template_vars('rowData');
$pageData=$this->get_template_vars('pageData');

                  foreach($our_module[$pageData['bean']['moduleDir']] as $fkey=>$field)
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
                        {/php}
                        {sugar_field parentFieldArray=$rowData vardef=$params displayType=ListView field=$col}
                        {php}
                        echo "</span>";


                        }else{
                        echo "<span class='label' style='background-color:".$field['background_color'][0].";color:".$field['text_color'][0].";'>";
                        {/php}
                        {sugar_field parentFieldArray=$rowData vardef=$params displayType=ListView field=$col}
                        {php}
                        echo "</span>";
                        }
                        }
                        }

                        if(!array_key_exists(strtolower($col),$our_module[$pageData['bean']['moduleDir']])) {
                        {/php}
                        {sugar_field parentFieldArray=$rowData vardef=$params displayType=ListView field=$col}
                        
                        {php}
                        }





{/php}
