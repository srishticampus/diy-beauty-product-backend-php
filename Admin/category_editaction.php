<?php
require 'connection.php';
session_start();
$category = $_POST['category'];
$upload_dir = "uploads/";
$server_url = '/home/ubuntu/html/Project/Diy_product/Admin/';
$image = $_FILES['file']['name'];
$category_id = $_POST['category_id'];

if ($image == "") {
    $sq = "SELECT * FROM category WHERE id=$category_id";
    $res = $con->query($sq);
    $ro = $res->fetch_assoc();
    $photo1 = $ro['image'];
} else {
    $image_tmp_name1 = $_FILES["file"]["tmp_name"];
    $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    // Check if the uploaded file is a PNG image
    if ($imageFileType !== 'png') {
        header("location:view_category.php?status=failed&error=invalid_file_type");
        exit; // Stop further execution
    }

    $random_name1 = rand(1000, 1000000) . "-" . $image;
    $upload_name1 = $upload_dir . strtolower($random_name1);
    $upload_name1 = preg_replace('/\s+/', '-', $upload_name1);
    $upload_name1 = $server_url . "/" . $upload_name1;

    if (move_uploaded_file($image_tmp_name1, $upload_name1)) {
        $photo1 = basename($upload_name1);
    } else {
        $photo1 = "";
    }
}

$sql = "UPDATE `category` SET `category_name`='$category',`image`='$photo1' WHERE id=$category_id";
$result = $con->query($sql);

if (!$result) {
    header("location:view_category.php?status=failed");
} else {
    header("location:view_category.php?status=success");
}
?>
