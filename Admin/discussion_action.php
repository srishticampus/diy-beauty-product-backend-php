<?php
require 'connection.php';
session_start();
$topics=$_POST['topics'];
$category=$_POST['category'];
$sql="INSERT INTO `discussion`( `topics`, `category`) VALUES ('$topics','$category')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:add_topics.php?status=success");
}
else{
	header("location:add_topics.php?status=failed");
}
?>