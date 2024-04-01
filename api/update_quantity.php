<?php
require 'connection.php';
$cartid=$_REQUEST['cart_id'];
$quantity=$_REQUEST['quantity'];
$data=array();
$sql="update cart set quantity='$quantity' where id=$cartid";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
               "message"=>"Quantity Updated failed");
}
else{
	$data=array("status"=>true,
               "message"=>"Quantity Updated");
}
echo json_encode($data);
?>