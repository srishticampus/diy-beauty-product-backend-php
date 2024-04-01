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
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);
$imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));

// Check if the uploaded file is a PNG image
if ($imageFileType !== 'png') {
    header("Location: add_tips.php?status=failed&error=invalid_file_type");
    exit; // Stop further execution
}

move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
$image = basename($_FILES['file']['name']);
$sql = "INSERT INTO `tips`(`title`, `description`,`category`, `ingredients`, `benefits`, `usage_product`, `additional_tips`, `file`, `link`, `comments`, `creator_id`) 
        VALUES ('$title','$description','$category',$ingredients','$benefits','$usage','$additional_tips','$image','$link','$comments','$creator_id')";
$result = $con->query($sql);
$count = $con->affected_rows;
if ($count > 0) {
    header("Location: add_tips.php?status=success");
} else {
    header("Location: add_tips.php?status=failed");
    //echo $sql;
}
?>
