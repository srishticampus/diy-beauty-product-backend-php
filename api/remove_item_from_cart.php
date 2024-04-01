<?php
require 'connection.php';
$product_id=$_REQUEST['product_id'];
$user_id=$_REQUEST['user_id'];
$sql="update orders set cart_delete_status=1 where product_id=$product_id and user_id=$user_id";
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