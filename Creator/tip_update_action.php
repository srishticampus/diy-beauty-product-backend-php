<?php
session_start();
require "connection.php"; // Assuming you have a file for database connection

$title = $_POST['title'];
$creator_id = $_SESSION['creator'];
$category = $_POST['category'];
$ingredients = $_POST['ingredients'];
$description = $_POST['description'];
$benefits = $_POST['benefits'];
$usage = $_POST['usage']; // Corrected variable name
$additional_tips = $_POST['additional_tips'];
$link = $_POST['link'];
$comments = $_POST['comments'];
$tip_id=$_POST['tip_id'];
$image=$_FILES['file']['name'];
if($image==""){
	$sq="select * from tips where id=$tip_id";
	$res=$con->query($sq);
	$ro=$res->fetch_assoc();
	$image=$ro['file'];
}
else{
	$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);
$imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));

// Check if the uploaded file is a PNG image
if ($imageFileType !== 'png') {
    header("location:view_tips.php?status=failed&error=invalid_file_type");
    exit; // Stop further execution
}
move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
$image = basename($_FILES['file']['name']);
}
$sql="UPDATE `tips` SET `title`='$title',`description`='$description',`category`='$category',`ingredients`='$ingredients',`benefits`='$benefits',`usage_product`='$usage',`additional_tips`='$additional_tips',`file`='$image',`link`='$link',`comments`='$comments' WHERE id=$tip_id";
$result=$con->query($sql);
if(!$result){
	header("location:view_tips.php?status=failed");
}
else{
	header("location:view_tips.php?status=success");
}


?>