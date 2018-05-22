<?php

require_once('include/MVC/View/views/view.list.php');
require_once('modules/scrm_Retail_Customer/scrm_Retail_CustomerListViewSmarty.php');

class scrm_Retail_CustomerViewList extends ViewList {

	function scrm_Retail_CustomerViewList(){
		parent::ViewList();
	}

	function preDisplay(){
		$this->lv = new scrm_Retail_CustomerListViewSmarty();
		$this->lv->targetList = true;
		$this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItem();

	}

	//For Adding the Button in List view
	 protected function buildMyMenuItem()
	{
			global $app_strings;

			return $EOHTML = <<<EOHTML
			<li>
	<a class="menuItem" style="width: 150px;" href="#" id="create_campaign" name="create_campaign" onmouseover='hiliteItem(this,"yes");'
			onmouseout='unhiliteItem(this);'
			onclick="sugarListView.get_checks();
			if(sugarListView.get_checks_count() &lt; 1) {
					alert('{$app_strings['LBL_LISTVIEW_NO_SELECTED']}');
					return false;
			}
			document.MassUpdate.action.value='create_campaign';
			document.MassUpdate.submit();">Create Campaign</a>
			</li>
EOHTML;
	}

	function display()
 	{

			echo $css =<<<EOD
			<style>
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
                    width:96%;
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
          width: 700px; / New width for default modal /
        }
        .modal-sm {
          width: 350px; / New width for small modal /
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 1250px; / New width for large modal /
        }
    }

			</style>

EOD;


			echo $js =<<<EOD
		<script>

		$(document).ready(function(){

			})




		</script>
EOD;
		parent::display();

 	}

}

?>
