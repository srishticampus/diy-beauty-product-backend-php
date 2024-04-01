<?php
require 'connection.php';
$user_id=$_REQUEST['user_id'];
$product_id=$_REQUEST['product_id'];
$data=array();
$sql="INSERT INTO `favourite`( `user_id`, `product_id`) VALUES ('$user_id','$product_id')";
$result=$con->query($sql);
$count=$con->affected_rows;
if ($count>0) {
	$data=array("status"=>true,
               "message"=>"added to favourite");
	// code...
}
else{
	$data=array("status"=>false,
               "message"=>"failed");
}
echo json_encode($data);
?>