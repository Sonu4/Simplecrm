<?php



if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

  class process_record
    {
        function process_record_method($bean, $event, $arguments)
        {

				global $db,$sugar_config, $current_user;
				$id = $bean->id;
				$cb="test";

				$userid= $current_user->id;
				// echo "<pre>";
				// print_r($bean-);
				// echo "</pre>";
				// exit;
				//echo '--->'.$bean->email1;
				$module=$_REQUEST['module'];
				$rc=BeanFactory::getBean('scrm_Retail_Customer',$id);
				//echo $rc->email1;

				 $query1 ="SELECT * FROM scrm_retail_customer JOIN scrm_retail_customer_cstm ON(scrm_retail_customer.id=scrm_retail_customer_cstm.id_c) WHERE id='$id'";
 				 $data=$db->query($query1);
 				 $data=$db->fetchByAssoc($data);
 			// 	 echo "<pre>";
 			// 	 // print_r($data);
 			// print_r($bean);
 				 $customer=$data['salutation'].'&nbsp;'.$data['first_name'].'&nbsp;'.$data['last_name'];
 				//echo
				$product_query="SELECT products.name FROM `aos_products` AS products JOIN scrm_retail_customer_aos_products_1_c AS customers_product ON customers_product.scrm_retail_customer_aos_products_1aos_products_idb = products.id AND customers_product.deleted =0 WHERE customers_product.scrm_retail_customer_aos_products_1scrm_retail_customer_ida = '$id' AND products.deleted =0 ORDER by customers_product.date_modified DESC LIMIT 0 , 4 ";

				$data1=$db->query($product_query);
 				//$data=$db->fetchByAssoc($data);
 				// echo "<pre>";
 				// print_r($data);
 				if(is_array($product=$db->fetchByAssoc($data1))){
 				 while($product=$db->fetchByAssoc($data1)){

 				 	//echo $product['name'];

 				 	$unit= rand (1,10);
 				 	$cost=$unit*10000;
 				 	$pro_html.="<li><a href='#' target='_blank'>$product[name]</a></li><p class='sub-lidata'>Holding: $unit, Amount: Rs $cost</p>";
 				 }
				}else{
 				 
					$pro_html.="<li><a href='#' target='_blank'>No data</a></li>";

				}


				$ticket_query="SELECT name ,date_entered,status,state FROM `cases` JOIN scrm_retail_customer_cases_1_c ON scrm_retail_customer_cases_1_c.scrm_retail_customer_cases_1cases_idb = cases.id WHERE scrm_retail_customer_cases_1_c.scrm_retail_customer_cases_1scrm_retail_customer_ida = '$id' AND cases.deleted =0 ORDER by cases.date_entered DESC LIMIT 0 , 4"; 

$data_flip_id=$data['id']."_flip_click";
$data_block_id=$data['id']."_block";
				$Code=<<<EOD
			

<style>
	
	</style>
        <script type="text/javascript">
        function flipTile(x){					
                $('#'+x).toggleClass('flipped');
                }		
        </script>                                

	<a style='cursor:pointer;' onclick='openModal("$id")'><i class='fa fa-eye' style='cursor:pointer;margin-left:26px;'></i></a>
EOD;
	
				

				 $bean->action_c=$Code;


		}
	}
?>
