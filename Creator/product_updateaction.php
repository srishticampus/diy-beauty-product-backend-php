<?php
require 'connection.php';
session_start();
$product_id=$_POST['product_id'];
$name=$_POST['name'];
$category=$_POST['category'];
$quantity=$_POST['quantity'];

$price=$_POST['price'];
$image=$_FILES['file']['name'];
if($image==""){
	$sq="select * from product where id=$product_id";
	$res=$con->query($sq);
	$ro=$res->fetch_assoc();
	$image=$ro['image'];
}
else{
	$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);
$imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));

// Check if the uploaded file is a PNG image
if ($imageFileType !== 'png') {
    header("location:add_product.php?status=failed&error=invalid_file_type");
    exit; // Stop further execution
}

move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
$image = basename($_FILES['file']['name']);
}
$sql="update product set product_name='$name',quantity='$quantity',image='$image',price='$price' where id=$product_id";
$result=$con->query($sql);
if(!$result){
	header("location:view_product.php?status=failed");
}
else{
	header("location:view_product.php?status=success");
}

?>