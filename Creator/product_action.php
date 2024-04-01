<?php
require 'connection.php';
session_start();
$creator_id=$_SESSION['creator'];
$name=$_POST['name'];
$category=$_POST['category'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
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
$sql = "INSERT INTO `product`( `category_id`, `creator_id`, `product_name`, `quantity`, `price`, `image`) VALUES ('$category','$creator_id','$name','$quantity','$price','$image')";
$result = $con->query($sql);
$count = $con->affected_rows;

if ($count > 0) {
    header("location:add_product.php?status=success");
} else {
    header("location:add_product.php?status=failed");
}
?>
