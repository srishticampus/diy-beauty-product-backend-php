<?php
require 'connection.php';
$product_id=$_REQUEST['product_id'];
$selling_price=$_REQUEST['selling_price'];
$data=array();
$sql="update product set selling_price='$selling_price' where product_id=$product_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
               "message"=>"selling price updated failed");
}
else{
	$data=array("status"=>true,
               "message"=>"selling price updated");
}
echo json_encode($data);
?>