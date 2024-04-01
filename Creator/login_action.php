<?php
require 'connection.php';
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
$sql="select * from creator where email='$email' and password='$password'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
	$_SESSION['creator']=$row['id'];
	header("location:index.php?status=success");
}
else{
	//echo $sql;
	header("location:login.php?status=failed");
}
?>