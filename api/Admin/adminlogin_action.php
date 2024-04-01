<?php
session_start();
require 'connection.php';
$email=$_POST['email'];
$pwd=$_POST['pass'];
$sql="select * from admin where email='$email' and pwd='$pwd'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	//$row=$result->fetch_assoc();
	$_SESSION['name']=true;
	header("location:index.php?status=success");
}
else{
	
	header("location:admin_login.php?status=failed");
}

?>