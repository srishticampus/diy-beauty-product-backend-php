<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="delete from tips where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:view_tips.php?status=failed");
}
else{
	header("location:view_tips.php?status=success");
}
?>