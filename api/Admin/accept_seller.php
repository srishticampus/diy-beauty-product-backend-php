<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="update seller set status=1 where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:view_seller.php?status=failed");

}
else{
	header("location:view_seller.php?status=success");
}

?>