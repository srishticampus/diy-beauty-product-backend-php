<?php
require 'connection.php';
$product_id=$_REQUEST['product_id'];
$sql="delete from product where product_id=$product_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
               "message"=>"productNotDeleted");
}
else{
	$data=array("status"=>true,
               "message"=>"productDeleted");
}
echo json_encode($data);
?>