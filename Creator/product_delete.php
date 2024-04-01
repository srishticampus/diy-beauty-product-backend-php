<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="delete from product where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:view_product.php?status=failed");
}
else{
	header("location:view_product.php?status=success");
}
?>