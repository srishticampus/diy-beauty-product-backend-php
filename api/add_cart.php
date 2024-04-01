<?php
require 'connection.php';
$data=array();
$product_id=$_REQUEST['product_id'];
$user_id=$_REQUEST['user_id'];
// $quantity=$_REQUEST['quantity'];
$sql="select * from `cart` where product_id=$product_id and user_id=$user_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$data=array("status"=>false,
               "message"=>"Already Added");
}
else{
$sql="INSERT INTO `cart`(`product_id`,  `user_id`, `checkout_status`,`quantity`) VALUES ('$product_id','$user_id',0,1)";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
               "message"=>"Added");
}
else{
	//
	$data=array("status"=>false,
             "message"=>"Failed");
	// echo $sql;
}
}
echo json_encode($data);
?>