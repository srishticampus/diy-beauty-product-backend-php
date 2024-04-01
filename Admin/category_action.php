<?php
require 'connection.php';
session_start();
$category = $_POST['category'];
$upload_dir = "uploads/";
$server_url = '/home/ubuntu/html/Project/Diy_product/Admin/';
$image = $_FILES['file']['name'];
$random_name1 = rand(1000, 1000000) . "-" . $_FILES['file']['name'];
$image_tmp_name1 = $_FILES["file"]["tmp_name"];
$upload_name1 = $upload_dir . strtolower($random_name1);
$upload_name1 = preg_replace('/\s+/', '-', $upload_name1);
$upload_name1 = $server_url . "/" . $upload_name1;

// Check if the uploaded file is a PNG image
$imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
if ($imageFileType !== 'png') {
    header("location:add_category.php?status=failed&error=invalid_file_type");
    exit; // Stop further execution
}

if (move_uploaded_file($image_tmp_name1, $upload_name1)) {
    $photo1 = basename($upload_name1);
} else {
    $photo1 = "";
}
$sql = "INSERT INTO `category`(`category_name`, `image`) VALUES ('$category','$photo1')";
$result = $con->query($sql);
$count = $con->affected_rows;
if ($count > 0) {
    header("location:add_category.php?status=success");
} else {
    header("location:add_category.php?status=failed");
}
?>
