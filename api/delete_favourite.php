<?php
require 'connection.php';
$user_id=$_REQUEST['user_id'];
$product_id=$_REQUEST['product_id'];
$data=array();
$sql="delete from favourite where user_id=$user_id and product_id=$product_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
               "message"=>"failed");
}
else{
	$data=array("status"=>true,
               "message"=>"success");
}
echo json_encode($data);
?>