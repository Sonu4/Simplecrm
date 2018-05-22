<!-- Trigger the modal with a button 
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
-->
<style type="text/css">
    {literal}
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
            padding:11px 38px;
        }
        .card-360{
            display: inline-block;
            height: auto;
            width: 22.5%;
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
            backface-visibility: hidden !important;
            width:100%;
            height:100%;
            display:block;
            -webkit-perspective: 0;
            -webkit-transform: translate3d(0,0,0);
            visibility:visible;        

        }
        .back{
            -webkit-transform: rotateY( 180deg )!important;
            -moz-transform: rotateY( 180deg )!important;
            -o-transform: rotateY( 180deg )!important;
            transform: rotateY( 180deg )!important;
            font-size:12px;
            overflow-y: auto;
            overflow-x: hidden;
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
            padding: 7px 10px;
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
            margin-right: 10px;
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
        function flipCard(x, y, z) {
            x.closest('.card-360').toggleClass('flipped');
            var sel= x.closest('.card-360').prop('id');
            if (z == '0') {
                return false;
            }
            if (y == '1') {
                $('#'+sel+' .back').css({'overflow-y':'auto','overflow-x':'hidden'});
                getFlipdata(x, z);
            } else {
                $('#'+sel+' .back').css({'overflow-y':'hidden','overflow-x':'hidden'});
            }
        }

        function getCustomer360Data(x) {

            var str = '<div class="loader_pane_popup"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';
            $('#customer_360_popup_body').html(str);
            $.ajax({
                url: 'customerajax360.php',
                data: {id: x, },
                type: 'post',
                success: function (data) {
                    $('#customer_360_popup_body').html(data);
                    setTimeout(function () {
                        $('#create_ticket_btn').attr('href', "index.php?module=Opportunities&action=EditView&return_module=Opportunities&return_action=DetailView&scrm_retail_customer_opportunities_1scrm_retail_customer_ida=" + $('#u_id').val() + "&lead_type_c=Personal/Retail&scrm_retail_customer_opportunities_1_name=" + $('#u_uname').val() + "");
                        $('#create_oppor_btn').attr('href', "index.php?module=Cases&action=EditView&return_module=Cases&return_action=DetailView&scrm_retail_customer_cases_1scrm_retail_customer_ida=" + $('#u_id').val() + "&scrm_retail_customer_cases_1_name=" + $('#u_uname').val() + "&source_c=Call");
                    }, 500);

                }
            });
        }
        
        function getPagination(x,z) {
			var id = $('#customer-360-id').val();
			var y = $('#paginate_'+x).val();
			var t = $('#total_'+x).val();
			var p = Math.round(parseInt(t)/4)-1;
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
                <label class="modal-title title-360 text-primary">Customer 360&deg;</label>
                <button type="button" class="close" data-dismiss="modal" style="color: rgb(87, 88, 88);margin: 0 -24px 0 0;padding: 4px 0 0;"><i class="fa fa-times"></i></button>
                <a id="create_ticket_btn" href="index.php?module=Opportunities&action=EditView&return_module=Opportunities&return_action=DetailView&scrm_retail_customer_opportunities_1scrm_retail_customer_ida=$id&lead_type_c=Personal/Retail&scrm_retail_customer_opportunities_1_name=$customer" class="btn btn-sm pull-right mright customer_360_btns" role="button" target="_blank">Create Opportunity</a>
                <a id="create_oppor_btn" href="index.php?module=Cases&action=EditView&return_module=Cases&return_action=DetailView&scrm_retail_customer_cases_1scrm_retail_customer_ida=$id&scrm_retail_customer_cases_1_name=$customer&source_c=Call" class="btn btn-sm pull-right mright customer_360_btns" role="button" target="_blank">Create Ticket</a>
            </div>
            <div class="modal-body" id="customer_360_popup_body">



            </div>
            <div class="modal-footer header-360">
                <button type="button" class="btn btn-default btn-sm customer_360_btns" data-dismiss="modal" >Close</button>
            </div>
        </div>

    </div>
</div>
