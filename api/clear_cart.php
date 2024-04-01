<?php
require 'connection.php';
$data=array();
$user_id=$_REQUEST['user_id'];
$sql="delete from cart where user_id=$user_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
               "message"=>"Cart Not Cleared");
}
else{
	$data=array("status"=>true,
               "message"=>"Cart Cleared");
}
echo json_encode($data);
?>