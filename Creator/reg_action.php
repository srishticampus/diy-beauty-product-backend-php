<?php
require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$password=$_POST['password'];
$sql="INSERT INTO `creator`( `name`, `email`, `phone`, `password`, `address`) VALUES ('$name','$email','$phone','$password','$address')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:login.php?status=regSuccess");
}
else{
	header("location:login.php?status=regFailed");
}

?>