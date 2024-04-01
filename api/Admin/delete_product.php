<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="delete from product where product_id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:product.php?status=failed");
}
else{
	header("location:product.php?status=success");
}

?>