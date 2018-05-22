{* 
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 
 * SimpleCRM standard edition is an extension to SuiteCRM 7.8.5 and SugarCRM Community Edition 6.5.24. 
 * It is developed by SimpleCRM (https://www.simplecrm.com.sg)
 * Copyright (C) 2016 - 2017 SimpleCRM
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

<!-- Trigger the modal with a button 
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
-->
<style type="text/css">
    {literal}
       #popup-blocks1,#popup-blocks2 {
		display: flex;
		position: relative;
		width: 100%;
		text-align: center;
		margin: 0px 9px;
	}
	.block_custom_360{
		display: inline-block;
		height: auto;
		width: 31%;
		margin: 11px;
		padding: 8px;
		border: 1px solid #F7F7F7;
		position: relative;
		box-shadow: 0 1px 8px rgba(52, 65, 75, 0.95);
		text-align: left;
		font-family: Helvetica, Arial, sans-serif;
		font-size: 14px;
                min-height:300px;
                /*perspective: 1000px;*/
                /*for flip effect*/

                -webkit-transition: -webkit-transform 1s !important;
                   -moz-transition: -moz-transform 1s !important;
                     -o-transition: -o-transform 1s !important;
                        transition: transform 1s !important;
                -webkit-transform-style: preserve-3d !important;
                   -moz-transform-style: preserve-3d !important;
                     -o-transform-style: preserve-3d !important;
                        transform-style: preserve-3d !important;

	}
        
	.cnt-block1, .cnt-block2, .cnt-block3, .cnt-block4, .cnt-block5, .cnt-block6 {
		width: 86px;
		display: inline-block;
		margin: 0 6px;
	}
	.cnt-block1 {
		border-bottom: 1px solid #2382d5;
	}
	.cnt-block2 {
		border-bottom: 1px solid #0db289;
	}
	.cnt-block3 {
		border-bottom: 1px solid #ffbc00;
	}
	.cstr {
		background: #f7f7f7;
		-webkit-border-radius: 30px;
		-moz-border-radius: 30px;
		border-radius: 30px;
		/*display: block;*/
		height: 60px;
		float: left;
		line-height: 0;
		margin: 0px 6px 0 3px;
		overflow: hidden;
		padding: 0;
		position: relative;
		width: 60px;
		z-index: 1;
	}
	/*
	p.hdr {
		display: flex;
	}
	.blocks {
		margin-top: -6px;
	}
	i.fa.fa-user-o {
    	font-size: 32px;
    	position: absolute;
	}
	*/
	ul.blocks li {
		list-style-type: none;
		line-height: 27px;
		padding-left:3px;
		color: #fff;
		font-size: 15px;
		/*font-style: italic;*/
	}
	ul.popup-new li {
		list-style-type: none;
		line-height: 32px;
		margin-left: -30px;
		color:#2767a8;
		font-weight: 500;
                                
	}
	.popup-hdr h3 {
		display: inline-block;
		padding: 0 6px;
		font-size:15px;
		color: #fff;

    }
    .srvc-block li {
		line-height: 32px;
		list-style-type: none;
		margin-left: -30px;
		/*border-bottom: 1px solid #f2f2f2;*/
		width: 100%;
		color: #2767a8;
		cursor: pointer;
		font-size: 15px;
	}
	.srvc-block a {
		text-decoration: none;
	}
	.srvc-block p {
		border-bottom: 1px solid #d9d9d9;
		line-height: 15px;
		margin-left: -30px;
		font-size: 15px;
		padding-bottom: 12px;
	}
	.srvc-block p:last-child {
		border-bottom: none;
	}
	.srvc-block span {
		border-bottom: 1px solid #d9d9d9;
		width: 100%;
		font-size: 13px;
		padding-bottom: 5px;
	}
	.cstr-info {
		color: #000;
		overflow-wrap: break-word;
                padding: 6px;
		font-weight: 400;
	}
	.popup-hdr i {
		font-size: 22px;
		color: #fff;
	}
	p.hdr i {
		font-size: 32px;
		position: absolute;
		color: #fff;
		margin-top: -3px;
	}
	.popup-new {
		margin-top: 12px;
	}
	.srvc-block {
		margin-top: 13px;
	}
	header.popup-hdr {
		background-color: #069566;
		margin: -9px;
		padding: 6px 0px 6px 11px;
	}
	@media screen and (min-width: 768px) {
        .modal-dialog {
          width: 700px; /* New width for default modal */
        }
        .modal-sm {
          width: 350px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 1250px; /* New width for large modal */
        }
    }
        .customer_360_btns{
            background-color:#2767A8 !important;color:white !important;
        }
        .cutomer-360-bg{
            background: url("themes/SuiteR/images/texture_5.png");
        }
        .popup-card-row{
            width: 100%;
            text-align: center;
            margin: 0 auto;
        } 
        .image_popup{
            padding:3px;
        }
        .image_popup img{
            width:50px;
        }
        .title-360{
            font-size:16px;
        }
        .header-360{
            padding:16px 38px !important;
        }
        .card-360{
            display: inline-block;
            height: auto;
            width: 30.5%;
            margin: 11px;
            border: 1px solid #ddd;
            position: relative;
            /*box-shadow: 1px 1px 1px 1px rgba(52, 65, 75, 0.95);*/
            text-align: left;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 14px;
            min-height:250px;
            background-color: #fff;
            /*perspective: 1000px;*/
            /*for flip effect*/ 

            -webkit-transition: -webkit-transform 1s !important;
            -moz-transition: -moz-transform 1s !important;
            -o-transition: -o-transform 1s !important;
            transition: transform 1s !important;
            -webkit-transform-style: preserve-3d !important;
            -moz-transform-style: preserve-3d !important;
            -o-transform-style: preserve-3d !important;
            transform-style: preserve-3d !important;

        }
        .card-header{
            border-bottom: 1px solid #ccc;
            box-shadow: 1px 1px 2px #eee;
            padding: 10px 5px;
            font-size:14px;
            color: #2767ad;
            font-size: 16px;
        }
        .card-footer {
            background-color: #f7f7f9;
            border-top: 1px solid rgba(0, 0, 0, 0.125);
            padding: 12px 3px;
            position: absolute;
            bottom: 0px;
            width:100%;

        }
        .title-icon{
            float:left;
        }
        .flip-icon{
            float:right;
        }
        .flipped{
            -webkit-transform: rotateY( -180deg )!important;
            -moz-transform: rotateY( -180deg )!important;
            -o-transform: rotateY( -180deg )!important;
            transform: rotateY( -180deg )!important;
        } 
        .front,.back {
            position: absolute;
            -webkit-backface-visibility: hidden !important;
            -moz-backface-visibility: hidden !important;
            -o-backface-visibility: hidden !important;
            /* backface-visibility: hidden !important; */ 
            width:100%;
            height:100%;
            display:block;
            -webkit-perspective: 0;
            -webkit-transform: translate3d(0,0,0);
            visibility:visible;        
            background-color: white !important;     

        }
        .back{
            -webkit-transform: rotateY( 180deg )!important;
            -moz-transform: rotateY( 180deg )!important;
            -o-transform: rotateY( 180deg )!important;
            transform: rotateY( 180deg )!important;
            font-size:12px;
            overflow-y: auto;
            overflow-x: hidden;
            backface-visibility: hidden;

        }

        .footer-status-list{
            padding:0;
            list-style: none;
            font-size:12px;
        }
        .footer-status-list li{
            float: left;
            padding: 0 16px;
        }
        .services-list{
            padding:0;
            list-style: none;
        }
        .services-list li{
            padding: 5px 10px;
            border-bottom: solid 1px #DAD9D9;
        }
        .left-bar{
            float:left;
            margin-left:-10px;
        }
        .left-interactions{
            float:left;
            border: solid 1px #FFA300;
            border-radius:100%;
            width:34px;
            height:34px;
            font-size:8px;
            text-align:center;
            padding-top:6px;
        }
        .left-accounts{
            float:left;
            border: solid 1px #FFA300;
            border-radius:100%;
            width:34px;
            height:34px;
            font-size:16px;
            text-align:center;
            padding-top:6px;
        }
        .right-bar-content{
            float:left;
            margin-left:10px;
        }
        .view-more{
            font-size: 12px;
            padding: 5px;
            position: absolute;
            right: 0;
            text-align: right;
            top: -22px;
        }
        .row_box{
            overflow-wrap: break-word;
        }
        .pink{
            color:#ff00a5;
        }
        .yellow{
            color:#cbbc43;
        }
        .black{
            color:#000;
        }
        .green{
            color:#56ff00;
        }
        .orange{
            color: #ffa300;
        }
        .services-status,.services-date,.services-subject{
            font-size:12px;
        }
        .loader_pane_popup{
            margin: 15% 46%;
        }
        .popup-new li{
            font-size: 12px;
            line-height: 18px !important;
        }
        .dis_pagi{
			color: #ccc;
        }
        .mright{
            margin-right: 12%;
        }
        #customer_360_popup_body{
            padding:2px 15px;
        }
        @media screen and (min-width: 768px) {
            .modal-dialog {
                width: 700px; 
            }
            .modal-sm {
                width: 350px; 
            }
        }
        @media screen and (min-width: 992px) {
            .modal-lg {
                width: 1250px; 
            }
        }

    {/literal}
</style>
<script type="text/javascript">
    {literal}
        function openModal(x) {
            $('#customer_360_popup').modal('show');
            getCustomer360Data(x);

        }
        function GetIEVersion() {
            var sAgent = window.navigator.userAgent;
            var Idx = sAgent.indexOf("MSIE");

            // If IE, return version number.
            if (Idx > 0)
                return parseInt(sAgent.substring(Idx + 5, sAgent.indexOf(".", Idx)));

            // If IE 11 then look for Updated user agent string.
            else if (!!navigator.userAgent.match(/Trident\/7\./))
                return 11;

            else
                return 0; //It is not IE
        }




        function flipCard(x, y, z) {
            x.closest('.card-360').toggleClass('flipped');
            var sel = x.closest('.card-360').prop('id');

            if (z == '0') {
                if (GetIEVersion() > 0) {
                    if (y == '1') {
                        $('#' + sel + ' .back').css({'backface-visibility': 'visible'});
                        $('#' + sel + ' .front').css({'backface-visibility': 'hidden'});

                    } else {
                        $('#' + sel + ' .back').css({'backface-visibility': 'hidden'});
                        $('#' + sel + ' .front').css({'backface-visibility': 'visible'});

                    }
                }
                return false;
            }


            if (y == '1') {

                $('#' + sel + ' .back').css({'overflow-y': 'auto', 'overflow-x': 'hidden'});

                if (GetIEVersion() > 0) {
                    $('#' + sel + ' .back').css({'backface-visibility': 'visible'});
                    $('#' + sel + ' .front').css({'backface-visibility': 'hidden'});
                }
                getFlipdata(x, z);

            } else {


                $('#' + sel + ' .back').css({'overflow-y': 'hidden', 'overflow-x': 'hidden'});
                if (GetIEVersion() > 0) {
                    $('#' + sel + ' .back').css({'backface-visibility': 'hidden'});
                    $('#' + sel + ' .front').css({'backface-visibility': 'visible'});
            }
        }
        }

        function getCustomer360Data(x) {

            var str = '<div class="loader_pane_popup"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';
            $('#customer_360_popup_body').html(str);
            $.ajax({
                url: 'customerajax360.php',
                data: {id: x, },
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#customer_360_popup_body').html(data.html);
                    setTimeout(function () {
                        //$('#create_ticket_btn').attr('href', "index.php?module=Opportunities&action=EditView&return_module=Opportunities&return_action=DetailView&scrm_retail_customer_opportunities_1scrm_retail_customer_ida=" + $('#u_id').val() + "&lead_type_c=Personal/Retail&scrm_retail_customer_opportunities_1_name=" + $('#u_uname').val() + "");
                        $('#create_oppor_btn').attr('href', "index.php?module=Cases&action=EditView&return_module=Cases&return_action=DetailView&account_id=" + $('#u_id').val() + "&account_name=" + $('#u_uname').val());
                        // if(data.priority == '1'){   
                        //     $('.modal-body').css('background-color','purple');
                        // }else{
                        //     $('.modal-body').css('background-color','white');
                        // }
                    }, 500);

                }
            });
        }
        
        function getPagination(x,z) {
			var id = $('#customer-360-id').val();
			var y = $('#paginate_'+x).val();
			var t = $('#total_'+x).val();
			var pp = (parseInt(t)/4)-1;                        
			var p = (pp > 0 && pp < 1) ? 1 :Math.ceil(pp);
			if(z == 0 && y == 0){
				return false;
			}
			if(z == 0 && y >= 1){
				y = parseInt(y)-1;
			}
			if(z == 1){
				y = parseInt(y)+1;
			}
			
			if(y>p){
				return false;
			}
            console.log(y);
            console.log(p);
			
            var str = '<div class="loader_pane_popup"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';
           $('#paginate-content-'+x).html(str);
            $.ajax({
                url: 'customer_360_pagination.php',
                data: {page: y,module:x,id:id },
                type: 'post',
                success: function (data) {
                  $('#paginate-content-'+x).html(data);
                  $('#paginate_'+x).val(y);
                  $('#p_'+x).removeClass('dis_pagi');
				  $('#n_'+x).removeClass('dis_pagi');
                  if(y==0){
					$('#p_'+x).addClass('dis_pagi');
					$('#n_'+x).removeClass('dis_pagi');
                  }
                  if(y==p){
					$('#n_'+x).addClass('dis_pagi');
					$('#p_'+x).removeClass('dis_pagi')
                  }
                }
            });
        }

        function getFlipdata(x, z) {
            var str = '<div class="loader_pane_popup"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';

            var stuff = x.data('stuff');
            $('#flip-content-' + z).html(str);
            $.ajax({
                url: 'get_flip_data.php',
                data: {stuff: stuff, },
                type: 'post',
                success: function (data) {
                    // console.log(data);
                    $('#flip-content-' + z).html(data);
                }
            });
        }

    {/literal}
</script>
<!-- Modal -->
<div id="customer_360_popup" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg ">
        <!-- Modal content-->
        <div class="modal-content cutomer-360-bg">
            <div class="modal-header header-360">
                <label class="modal-title title-360 text-primary" style="margin-left: 0%;">Customer 360&deg;</label>
                <button type="button" class="close" data-dismiss="modal" style="color: rgb(87, 88, 88);padding: 4px 15px 0;"><i class="fa fa-times"></i></button>
               
                <!-- <a id="create_oppor_btn" href="index.php?module=Cases&action=EditView&return_module=Cases&return_action=DetailView&account_id=$id&account_name=$customer" class=" btn-sm pull-right mright customer_360_btns" role="button" target="_blank" style="margin-right: 0%;">Create Ticket</a> -->
            </div>
            <div class="modal-body" id="customer_360_popup_body">



            </div>
            <div class="modal-footer header-360">
                <button type="button" class=" btn-default btn-sm customer_360_btns mright" data-dismiss="modal" style="margin-right: 0%;">Close</button>
            </div>
        </div>

    </div>
</div>
