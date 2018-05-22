<?php
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

if (!defined('sugarEntry'))
    define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');



global $db, $sugar_config, $mod_strings;

$module_list = array_intersect($GLOBALS['moduleList'], array_keys($GLOBALS['beanList']));


$querycheck = 'SELECT 1 FROM listview_field_background';
$query_result = $db->query($querycheck);
if ($query_result === FALSE) {
    $create_table = $db->query("create table listview_field_background(id INT(11) NOT NULL, all_module longtext, date_modified VARCHAR(100), created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,PRIMARY KEY (id))");
}



if ($_POST['save']) {

//                    echo "<pre>";
//                    print_r(array_slice($_POST,3));
    $all_module = base64_encode(serialize(array_slice($_POST, 3)));

    $date_modified = date('d-m-Y h:i:s');

    $content_query = $db->query("INSERT INTO listview_field_background (id, all_module, date_modified) 
		VALUES ('1','" . $all_module . "','" . $date_modified . "')ON DUPLICATE KEY UPDATE all_module='" . $all_module . "', date_modified='" . $date_modified . "'");

    if ($content_query) {
        $record_query = $db->query("SELECT * FROM listview_field_background where id='1'");

        if ($record_query->num_rows > 0) {
            $save_msg = "ListView fields background saved successfully...!!";
        } else {
            $save_msg = "ListView fields background cleared successfully...!!";
        }
        $_SESSION['save_msg_time'] = time() + 2;
    }
}






foreach ($module_list as $module_name) {
    $bean = BeanFactory::getBean($module_name);
    $field_defs[$module_name] = $bean->getFieldDefinitions();
}
if (empty($selected_module)) {

    $selected_module = current(array_filter($module_list));
}
//~ echo "<pre>";
//~ print_r($field_defs[$module_name]);
//~ echo "<pre>";
//~ echo count($field_defs['Leads']);
//~ print_r($field_defs['Leads']);
?>
<style>
    .custom-panel
    {
        margin:10px 0px;	
        background-color:#f9f9f9;
    }
    .condition_key
    {
        display:none;	
    }
    .input-group-addon{
        padding: 5px 12px !important;
    }
    .inputbox tr td{
        vertical-align: baseline;
    }
</style>



<link href="custom/themes/default/bootstrap-colorpicker/css/octicons.min.css" rel="stylesheet">
<link href="custom/themes/default/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="custom/themes/default/bootstrap-colorpicker/docs/assets/main.css" rel="stylesheet">

<script src="custom/themes/default/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<script>

    $(document).ready(function () {
        $('.input_fields_wrap .background_cp').colorpicker();
        $('.input_fields_wrap .text_cp').colorpicker();

        $("#input_fields_wrap").on("change", ".condition_value", function () {
            var pid = $(this).closest(".inner_wrapper").prop("id");
            var sel = $(this).find(":selected").index();
            $("#" + pid + " .condition_key").prop('selectedIndex', sel);

        })





        var max_fields = 150; //maximum input boxes allowed
        var add_button = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $("#show_total_Opportunities").hide();
        $(add_button).click(function (e) { //on add input button click
            var numItems = $('.custom-panel').length;
            var module = $("#module_select").val();
            var field_name = $("#all_fields").val();

            var wrapper = $(".input_fields_wrap"); //Fields wrapper

            if ($("#field_box_" + module + "_" + field_name).length == 0) {
                var inner_div = 0;
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var all_posted = {numItems: numItems, module: module, inner_div: inner_div};
                    $.ajax({
                        url: "field_background_response.php",
                        type: "post",
                        data: {call_function: "outerwrapper", id: field_name, no: all_posted},
                        success: function (result) {
                            $(wrapper).prepend(result);

                            setTimeout(function () {
                                $('.input_fields_wrap .background_cp').colorpicker();
                                $('.input_fields_wrap .text_cp').colorpicker();
                            }, 1);
                        }});

//add input box
                }
            } else
            {
                alert(field_name + " field aleredy selected...!!");
            }
        });



        $(".input_fields_wrap").on("click", ".add_field_box_button", function (e) { //on add input button click
            var id = (this.id);
            pid = $("#" + id).closest("div").parent("div").prop("id");
            main_div = $("#" + id).closest("div").parent("div").parent("div").parent("div").prop("id");
            val = $("#" + main_div + "field_name").val();
            //alert(pid)
            var inner_module = $("#module_select").val();
            in_div = $("#" + id).closest("div").parent("div").prop("id");
            var inner_div = $("#" + in_div + "> .inner_wrapper").length;
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                var inner_all_posted = {module: inner_module, inner_div: inner_div};
                $.ajax({
                    url: "lead-scoring-response.php",
                    type: "post",
                    data: {call_function: "innerwrapper", id: val, no: inner_all_posted},
                    success: function (result) {
                        $("#" + pid).prepend(result);
                    }});
            }
        });

        $(".input_fields_wrap").on("click", ".remove_field", function (e) {
            //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
            var module = $("#module_select").val();
            var sum = 0;
            $('#input_fields_wrap_' + module + ' .max_value_input').each(function () {
                sum += parseFloat(this.value);
            });
            //alert(sum)  
            $("#show_total_" + module).html(sum);
            $("#show_total_input_" + module).val(sum);
        })


//			$(".input_fields_wrap_Leads, .input_fields_wrap_Opportunities").on("click",".remove_field_inner", function(e){ //user click on remove text
//			par_div=$("#"+this.id).closest("div").parent('div').parent('div').parent('div').prop('id');
//			main_par_div=$("#"+this.id).closest("div").parent('div').parent('div').parent('div').parent('div').prop('id');
//			e.preventDefault(); $(this).parent('div').remove(); x--;
//			var nums = [];
//			$('#'+par_div+' .scoring_value').each( function() { nums.push( $(this).val() ); });
//			var max = Math.max.apply(Math, nums);    
//			$("#"+par_div+" .max_value").html(max);
//			$("#"+par_div+" .max_value_input").val(max);
//			var sum = 0;
//			$('#'+main_par_div+' .max_value_input').each(function(){
//			sum += parseFloat(this.value);
//			});
//			var module=$("#module_select").val();
//			$("#show_total_"+module).html(sum);
//			$("#show_total_input_"+module).val(sum);
//			})


        $("#module_select").change(function () {
            var module = $("#module_select").val();

//	if(module=="Leads")
//    {
//	$("#show_total_Leads").show();	
//	$("#show_total_Opportunities").hide();	
//	$(".input_fields_wrap_Leads").show(); 
//	$(".input_fields_wrap_Opportunities").hide();
//	}else
//	{
//	$("#show_total_Opportunities").show();
//	$("#show_total_Leads").hide();	
//	$(".input_fields_wrap_Leads").hide(); 	
//	$(".input_fields_wrap_Opportunities").show(); 	
//	}

            $.ajax({
                url: "field_background_response.php",
                type: "post",
                data: {call_function: "getfieldlist", id: module},
                success: function (result) {
                    //alert(result);
                    $("#all_fields").html(result);
                }});
        })


        /*
         $(".input_fields_wrap_Leads,.input_fields_wrap_Opportunities").on("keyup ",".scoring_value", function(e) {
         
         par_div=$("#"+this.id).closest("div").parent("div").parent("div").parent("div").prop("id");
         
         main_par_div=$("#"+this.id).closest("div").parent("div").parent("div").parent("div").parent("div").prop("id");
         
         var nums = [];
         $('#'+par_div+' .scoring_value').each( function() { nums.push( $(this).val() ); });
         var max = Math.max.apply(Math, nums);    
         
         $("#"+par_div+" .max_value").html(max);
         $("#"+par_div+" .max_value_input").val(max);
         
         var sum = 0;
         $('#'+main_par_div+' .max_value_input').each(function(){
         sum += parseFloat(this.value);
         });
         // alert(sum)  
         var module=$("#module_select").val();
         $("#show_total_"+module).html(sum);
         $("#show_total_input_"+module).val(sum);
         });
         */


        $(".input_fields_wrap").on("change", ".select_condition", function () {

            var val = $(this).val();
            var par_div = $("#" + this.id).closest("div").prop("id");

            if ($("#" + par_div + ">.condition_value").is('input')) {
                $("#" + par_div + ">.condition_value").val("");
            } else
            {
                $("#" + par_div + ">.condition_value").prop('selectedIndex', 0);
            }
            if (val == "empty" || val == "non_empty")
            {
                $("#" + par_div + ">.condition_value").css("visibility", "hidden");

            } else
            {
                $("#" + par_div + ">.condition_value").css("visibility", "visible");
            }
        })

        $("#cancel_button").click(function () {
            $(".input_fields_wrap").html("");

            $("#save").trigger("click");
        })

    });

//		$(document).on('keyup', '[data-min_max]', function(e){
//		var min = parseInt($(this).data('min'));
//		var max = parseInt($(this).data('max'));
//		var val = parseInt($(this).val());
//		par_div=$("#"+this.id).closest("div").parent("div").parent("div").parent("div").prop("id");
//		main_par_div=$("#"+this.id).closest("div").parent("div").parent("div").parent("div").parent("div").prop("id");
//		if(val > max)
//		{
//		$(this).val(max);
//		$("#"+par_div+" .max_value").html(max);
//		$("#"+par_div+" .max_value_input").val(max);
//		return false;
//		}
//		else if(val < min)
//		{
//		$(this).val(min);
//		return false;
//		}
//		var nums = [];
//		$('#'+par_div+' .scoring_value').each( function() { nums.push( $(this).val() ); });
//		var max = Math.max.apply(Math, nums);    
//		$("#"+par_div+" .max_value").html(max);
//		$("#"+par_div+" .max_value_input").val(max);
//		var sum = 0;
//		$('#'+main_par_div+' .max_value_input').each(function(){
//		sum += parseFloat(this.value);
//		});
//		// alert(sum)  
//		var module=$("#module_select").val();
//		$("#show_total_"+module).html(sum);
//		$("#show_total_input_"+module).val(sum);
//		});

    $(document).on('keydown', '[data-toggle=just_number]', function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: Ctrl+C
                                (e.keyCode == 67 && e.ctrlKey === true) ||
                                // Allow: Ctrl+X
                                        (e.keyCode == 88 && e.ctrlKey === true) ||
                                        // Allow: home, end, left, right
                                                (e.keyCode >= 35 && e.keyCode <= 39)) {
                                    // let it happen, don't do anything
                                    return;
                                }
                                // Ensure that it is a number and stop the keypress
                                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                    e.preventDefault();
                                }
                            });

</script>

<?php
$content_query = $db->query("SELECT * FROM listview_field_background where id='1'");
$content_row = $db->fetchByAssoc($content_query);



$get_module = unserialize(base64_decode($content_row['all_module']));
?>

<form method="POST" action="" name="ls_scoring_form">

    <div class="row" >


        <h1>Apply Background color for ListView Field</h1>
        <hr>
        <div class="col-sm-4">
            <label>Configure Background color for</label>



            <select name="module_select" id="module_select">
<?php
foreach ($module_list as $module) {
    echo "<option value='" . $module . "'>" . $app_list_strings['moduleList'][$module] . "</option>";
}
?>
            </select>
        </div>

        <div class="col-sm-8">
            <input class="btn" type="button" name="cancel" id="cancel" data-toggle="modal" data-target="#cancelModal" style="background-color:#C01114 !important;color:white !important;" value="Cancel" />
            <input class="btn" type="submit" name="save" id="save" style="background-color:#125ABC !important;color:white !important;" value="Save"/>
        </div>
    </div>

    <div class="row" style="min-height:400px">
        <div class="col-sm-12">

            <select name="all_fields" id="all_fields">
                <?php

                     $customMetadata = 'custom/modules/' . $selected_module . '/metadata/listviewdefs.php';

    if (file_exists($customMetadata)) {
        require($customMetadata);
        $columnsfirst = $listViewDefs[$selected_module];
    } else {
        require ('modules/' . $selected_module . '/metadata/listviewdefs.php');
        $columnsfirst = $listViewDefs[$selected_module];
    }
  foreach ($columnsfirst as $fk => $fn) {

            include('modules/' . $selected_module . '/language/en_us.lang.php');

            $get_lable = $mod_strings[$fn['label']];
            if (empty($get_lable)) {

                include('custom/modules/' . $selected_module . '/language/en_us.lang.php');
                $get_lable = $mod_strings[$fn['label']];
            }
            //~ }
            if (!empty($get_lable)) {
                echo "<option value=" . strtolower($fk) . ">" . str_replace(":", "", $get_lable) . "</option>";
            }
        }
//                    
//                    include('modules/' . $selected_module . '/language/en_us.lang.php');
//                    $get_lable = $mod_strings[$fn['vname']];
//                    if (empty($get_lable)) {
//                        include('custom/modules/' . $selected_module . '/language/en_us.lang.php');
//
//                        $get_lable = $mod_strings[$fn['vname']];
//                    }
                    //~ }
                ?>
            </select>	
             

            <a class="add_field_button"><i class="fa fa-plus-square-o fa-2x"></i></a>
            <br>
        </div>

                <?php
                if ($_SESSION['save_msg_time'] > time()) {
                    ?>
            <div class="col-sm-12">
                <br>
                <br>
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo $save_msg; ?>
                </div>
            </div> 
                    <?php
                } else {
                    unset($_SESSION['save_msg_time']);
                }
                ?>


        <div class="input_fields_wrap col-sm-7" id="input_fields_wrap" >

<?php

$wrapper_no = 0;



foreach ($get_module as $module => $field) {

    $customMetadata = 'custom/modules/' . $module . '/metadata/listviewdefs.php';

    if (file_exists($customMetadata)) {
        require($customMetadata);
        $columns = $listViewDefs[$module];
    } else {
        require ('modules/' . $module . '/metadata/listviewdefs.php');
        $columns = $listViewDefs[$module];
    }
    foreach ($field as $fkey=>$fvalue) {
          
    include('modules/' . $module . '/language/en_us.lang.php');

    $get_lable = $mod_strings[$columns[strtoupper($fkey)]['label']];
    if (empty($get_lable)) {

        include('custom/modules/' . $module . '/language/en_us.lang.php');
        $get_lable = $mod_strings[$columns[strtoupper($fkey)]['label']];
    }
    $get_lable = str_replace(":", "", $get_lable);
    
    
    if (array_key_exists('field_name', $field[$fkey])) {

        echo '<div class="panel panel-default custom-panel" id="field_box_' . $module . '_' . $fkey . '"><div class="panel-body"><div class="col-sm-5"><strong >Module:</strong>&nbsp;<span>' . $app_list_strings['moduleList'][$module] . '</span></div><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">' . $get_lable . '</span><input type="hidden" id="field_box_' . $module . '_' . $fkey . 'field_name" value=' . $fkey . '></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr>';
        $inner_div = 0;
        echo '<table class="inputbox"><tr><th>Field Value</th><th>Background Color</th><th>Text Color</th></tr>';
        foreach ($field[$fkey]['field_name'] as $f_value) {
            echo '
 
            <tr>
            <td><input name="' . $module . '[' . $fkey . '][field_name][]" class="field_name" value="' . $f_value . '" id="field_name_' . $module . '_' . $fkey . '_' . $inner_div . '" readonly>&nbsp;&nbsp;<input name="' . $module . '[' . $fkey . '][field_name_value][]" class="field_name_value" value="' . $field[$fkey]['field_name_value'][$inner_div] . '" id="field_name_value' . $module . '_' . $fkey . '_' . $inner_div . '" type="hidden"></td>
            <td><div id="cp2"  class="background_cp input-group colorpicker-component"> <input type="text" name="' . $module . '[' . $fkey . '][background_color][]" value="' . $field[$fkey]['background_color'][$inner_div] . '" class="background_color" id="background_color_' . $module . '_' . $fkey . '_' . $inner_div . '"/> <span class="input-group-addon"><i></i></span></div>&nbsp;&nbsp;</td>
            <td><div id="cp3"  class="text_cp input-group colorpicker-component"><input type="text" name="' . $module . '[' . $fkey . '][text_color][]" value="' . $field[$fkey]['text_color'][$inner_div] . '" class="text_color" id="text_color' . $module . '_' . $fkey . '_' . $inner_div . '"/> <input id="unique_id_' . $module . '_' . $fkey . '" class="unique_id" type="hidden" value="' . $module . '_' . $fkey . '"> <span class="input-group-addon"><i></i></span></div>&nbsp;&nbsp;</td>
                    </tr>';
            $inner_div++;
        }
        echo '</table></div></div>';
    } else {

        echo '<div class="panel panel-default custom-panel" id="field_box_' . $module . '_' . $fkey . '"><div class="panel-body"><div class="col-sm-5"><strong >Module:</strong>&nbsp;<span >' . $module . '</span></div><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">' . $get_lable . '</span><input type="hidden" id="field_box_' . $module . '_' . $fkey . 'field_name" value=' . $fkey . '></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr>
 <table class="inputbox"><tr><th>Background Color</th><th>Text Color</th></tr>                    
<td><div id="cp2"  class="background_cp input-group colorpicker-component"> <input type="text" name="' . $module . '[' . $fkey . '][background_color][]" class="background_color" value="' . $field[$fkey]['background_color'][0] . '" id="background_color_' . $module . '_' . $fkey . '_' . $inner_div . '"/> <span class="input-group-addon"><i></i></span></div>&nbsp;&nbsp;</td>
            <td><div id="cp3"  class="text_cp input-group colorpicker-component"><input type="text" name="' . $module . '[' . $fkey . '][text_color][]" value="' . $field[$fkey]['text_color'][0] . '" class="text_color" id="text_color' . $module . '_' . $fkey . '_' . $inner_div . '"/> <input id="unique_id_' . $module . '_' . $fkey . '" class="unique_id" type="hidden" value="' . $module . '_' . $fkey . '"> <span class="input-group-addon"><i></i></span></div>&nbsp;&nbsp;</td>
                    </tr>
                    </table>
                    </div></div>';
    }
     }

    $wrapper_no++;
}
?>	

        </div>


    </div>
</form>

<div class="modal fade" id="cancelModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cancel Here</h4>
            </div>
            <div class="modal-body">
                <p>If you want to blank form, then click on cancel button.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" name="cancel_button" id="cancel_button" style="background-color:#125ABC !important;color:white !important;" >Cancel</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#C01114 !important;color:white !important;">Close</button>
            </div>
        </div>
    </div>
</div>   
