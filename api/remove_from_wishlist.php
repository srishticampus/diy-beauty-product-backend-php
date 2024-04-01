<?php
require 'connection.php';
$product_id=$_REQUEST['product_id'];
$user_id=$_REQUEST['user_id'];
$data=array();
$sql="update wishlist set wstatus=1 where product_id=$product_id and user_id=$user_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
                "message"=>"items not removed");
}
else{
	$data=array("status"=>true,
                "message"=>"items removed");
}


echo json_encode($data);
?>