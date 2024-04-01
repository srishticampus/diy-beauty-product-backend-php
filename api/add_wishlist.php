<?php
require 'connection.php';
$product_id=$_REQUEST['product_id'];
$user_id=$_REQUEST['user_id'];
$data=array();
$sql="INSERT INTO `wishlist`( `product_id`, `user_id`) VALUES ('$product_id','$user_id')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
               "message"=>"added to wishlist");

}
else{
	$data=array("status"=>false,
                "message"=>"added failed");

}
echo json_encode($data);
?>