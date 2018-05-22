<?php
if (!defined('sugarEntry'))
    define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');
require_once('include/language/en_us.lang.php');
require_once('custom/include/language/en_us.lang.php');

global $db, $sugar_config, $app_list_strings,$mod_strings,$beanList,$app_strings;


$querycheck = 'SELECT 1 FROM module_icons';
$query_result = $db->query($querycheck);
if ($query_result === FALSE) {
    $create_table = $db->query("create table module_icons(id INT(11) NOT NULL, icons longtext, date_modified VARCHAR(100), created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,PRIMARY KEY (id))");
}



if ($_POST['save']) {


    $icons = base64_encode(serialize($_POST['icon']));
    $date_modified = date('d-m-Y h:i:s');

    $content_query = $db->query("INSERT INTO module_icons (id, icons, date_modified) 
		VALUES ('1','" . $icons . "','" . $date_modified . "')ON DUPLICATE KEY UPDATE icons='" . $icons . "', date_modified='" . $date_modified . "'");

    if ($content_query) {
        $record_query = $db->query("SELECT * FROM module_icons where id='1'");

        if ($record_query->num_rows > 0) {
            $save_msg = "ListView fields background saved successfully...!!";
        } else {
            $save_msg = "ListView fields background Reset successfully...!!";
        }
        $_SESSION['save_msg_time'] = time() + 2;
    }
    header('Location: index.php?module=Administration&action=list_view_all_modules');
}
?>
<style>
    .simpleicons{

        color:#FFFFFF;
        border-radius:5px
    }
    .noborder{
        border: none !important;
        background-color: #00AABB !important;
    }
    .title-box{
        margin-bottom:15px;
    }
    .module_name{
        font-size: 14px;
    }
    .main-title{
        font-size: 20px;
    }
    .col-title{
        margin-bottom: 10px;
    }
    .container{
        background: transparent !important;
    }
    .module_icon_btn{

        padding:4px 8px;
        border-radius: 3px;
        box-shadow: 0px 2px 8px 0px rgba(0, 0, 0, 0.18), 0px 2px 8px 0px rgba(0, 0, 0, 0.15);
        position: relative;
        -webkit-transition-duration: 0.8s;
        transition-duration: 0.8s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        -moz-user-select: none;
        z-index: 1;
    }
</style>
<link href="custom/themes/default/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<link href="custom/themes/default/bootstrap-colorpicker/css/octicons.min.css" rel="stylesheet">
<link href="custom/themes/default/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="custom/themes/default/bootstrap-colorpicker/docs/assets/main.css" rel="stylesheet">

<script src="custom/themes/default/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>

<div class="container ">
    <form method="POST" action="">    
        <div class="col-md-12 title-box">
            <span class="main-title">Custom Icons for Modules</span>
<!--            <input type="button" name="reset" class="btn btn-md btn-danger pull-right" value="Reset">-->
            <input type="submit" name="save" class="btn btn-md btn-default  pull-right" value="Save">

        </div>
        <?php
        $select_query = $db->query("SELECT * FROM module_icons where id='1'");
        $content_row = $db->fetchByAssoc($select_query);

        $icons = unserialize(base64_decode($content_row['icons']));
//        echo "<pre>";
//        print_r($icons);
        ?>
        <div class="col-md-12 col-title">
            <div class="col-md-3"><h1>Modules</h1></div>
            <div class="col-md-1"><h1>Icon </h1></div>
            <div class="col-md-1"><h1>Action </h1></div>
            <div class="col-md-3"><h1>Font Awesome icon</h1></div>
            <div class="col-md-4"><h1>Color Code</h1></div>
        </div>
        <div class="col-md-12">

            <div class="col-md-3">
                <span class="module_name"><strong>Default Icon  </strong></span></div>

            <div class="col-md-1">
                <span class="module_icon_btn btn-xs " id="show_0"  ><i class="fa <?php echo (!empty($icons['default']['faicon'])) ? $icons['default']['faicon'] : "fa-archive"; ?> simpleicons"></i></span>
            </div>
            <div class="col-md-1">   
                <button type="button" class="btn btn-sm"  id="add_0" onclick="getIcon(0);"><i class="fa fa-pencil"></i></button></div>
            <div class="col-md-3">

                <div class="input-group iconpicker-container" id="display_0" >


                    <input data-placement="bottomRight" class="form-control icp icp-auto" name="icon[default][faicon]" id="icon_0" value="<?php echo (!empty($icons['default']['faicon'])) ? $icons['default']['faicon'] : "fa-archive";
        ?>" type="text" />
                    <span class="input-group-addon" id="span_0"  ><i class="fa <?php echo (!empty($icons['default']['faicon'])) ? $icons['default']['faicon'] : "fa-archive"; ?>"></i></span>

                </div>

            </div>
            <div class="col-md-4"><div class="background_cp input-group colorpicker-component"> <input type="text" value="<?php echo (!empty($icons['default']['faicon'])) ? $icons['default']['bgcolor'] : "#00AABB"; ?>" class="form-control" name="icon[default][bgcolor]" id="bgicon_0" class="background_color" onchange="getBgcolor(0);"/> <span class="input-group-addon"><i></i></span> </div></div>

            <?php
            $i = 1;
// $arr = array_splice($app_list_strings['moduleList'], 0, 1);
          
            $allmodule_list = array_intersect($GLOBALS['moduleList'],array_keys($GLOBALS['beanList']));
require_once('include/utils.php');

            foreach ($allmodule_list as $k => $v) {
          
                ?>

                <div class="col-md-3">
                    <span class="module_name"><strong> <?php echo (!empty($app_list_strings['moduleList'][$v])) ? $app_list_strings['moduleList'][$v] :   translate('LBL_MODULE_NAME', $v); ?></strong></span></div>


                <div class="col-md-1">
                    <span class="module_icon_btn btn-xs " id="show_<?php echo $i; ?>"  ><i class="fa <?php echo (!empty($icons[$v]['faicon'])) ? $icons[$v]['faicon'] : "fa-archive"; ?> simpleicons"></i></span>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-sm"  id="add_<?php echo $i; ?>" onclick="getIcon(<?php echo $i; ?>);"><i class="fa <?php echo (!empty($icons[$v]['faicon'])) ? 'fa-pencil' : 'fa-plus'; ?>"></i></button>

                </div>
                <div class="col-md-3">

                    <div class="input-group iconpicker-container" id="display_<?php echo $i; ?>" style="display:none;">


                        <input data-placement="bottomRight" class="form-control icp icp-auto" name="icon[<?php echo $v; ?>][faicon]" id="icon_<?php echo $i; ?>" value="<?php
                        if (!empty($icons[$v]['faicon'])) {
                            echo $icons[$v]['faicon'];
                        } else {
                            echo "";
                        }
                        ?>" type="text" />
                        <span class="input-group-addon" id="span_<?php echo $i; ?>"  ><i class="fa <?php
                            if (!empty($icons[$v]['faicon'])) {
                                echo $icons[$v]['faicon'];
                            } else {
                                echo "";
                            }
                            ?>"></i></span>

                    </div>

                </div>
                <div class="col-md-4">


                    <div class="background_cp input-group colorpicker-component"> <input type="text" value="<?php echo (!empty($icons[$v]['faicon'])) ? $icons[$v]['bgcolor'] : ""; ?>" class="form-control" name="icon[<?php echo $v; ?>][bgcolor]" id="bgicon_<?php echo $i; ?>" class="background_color" onchange="getBgcolor(<?php echo $i; ?>);"/> <span class="input-group-addon"><i></i></span> </div></div>

                <?php
                $i++;
            }
            ?>
        </div>
    </form>
</div>

<script src="custom/themes/default/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
<script type="text/javascript">
                    $(document).ready(function () {
                        $(' .background_cp').colorpicker();
                    });
                    $("#icon_0").iconpicker();
                    function getIcon(x) {
                        $("#display_" + x).show();
                        $('#add_' + x).html('<i class="fa fa-pencil"></i>');
                        setTimeout(function () {
                            $('#icon_' + x).iconpicker();
                            $('#add_' + x).attr('onclick', '');
                        }, 200);
                    }
                    function getBgcolor(x)
                    {
                        var bg = $('#bgicon_' + x).val();
                        //  alert(x);
                        $('#show_' + x).css('background-color', '"' + bg + '"');
                    }

                    $.event.special.inputchange = {
                        setup: function() {
                            var self = this, val;
                            $.data(this, 'timer', window.setInterval(function() {
                                val = self.value;
                                if ( $.data( self, 'cache') != val ) {
                                    $.data( self, 'cache', val );
                                    $( self ).trigger( 'inputchange' );
                                }
                            }, 20));
                        },
                        teardown: function() {
                            window.clearInterval( $.data(this, 'timer') );
                        },
                        add: function() {
                            $.data(this, 'cache', this.value);
                        }
                    };
                    var t = <?php echo count($allmodule_list);?>;
                    for(var j=0;j<=t;j++){
                        $('#icon_'+j).on('inputchange', function() {
                            $('#show_' + (this.id).split('_')[1]).html('<i class="fa '+this.value+' simpleicons"><i>');
                        });
                    }

</script>
