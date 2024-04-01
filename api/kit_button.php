<?php
require 'connection.php';
$data=array();
$id=$_REQUEST['id'];
$user_id=$_REQUEST['user_id'];
$lat=$_REQUEST['lat'];
$log=$_REQUEST['log'];
$address=$_REQUEST['address'];
$phone=$_REQUEST['phone'];
$category=$_REQUEST['category'];
$product_id=$_REQUEST['product_id'];


$sql="INSERT INTO `orders`(`user_id`, `lat`, `log`, `address`,`phone`,`category`,`product_id`,`status`) VALUES ('$user_id','$lat','$log','$address','$phone','$category','$product_id','Order Placed')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
                  "message"=>"kitActivitated");
}
else{
	 $data=array("status"=>false,
                 "message"=>"Failed");
	}
//}
echo json_encode($data);
?>