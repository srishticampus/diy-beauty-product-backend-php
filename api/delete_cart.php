<?php
require 'connection.php';
$data=array();
$cart_id=$_REQUEST['cart_id'];
$sql="delete from cart where id=$cart_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
               "message"=>"Deleted Failed");
}
else{
	$data=array("status"=>true,
               "message"=>"Deleted Successfully");
}
echo json_encode($data);
?>