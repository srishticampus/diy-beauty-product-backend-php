<?php
require 'connection.php';
session_start();
$title=$_POST['title'];
$creator_id=$_SESSION['creator'];
$category=$_POST['category'];
$ingredients=$_POST['ingredients'];
$instructions=$_POST['instructions'];
$benefits=$_POST['benefits'];
$usage=$_POST['usage'];
$preparation_time=$_POST['preparation_time'];
$difficulty_level=$_POST['difficulty_level'];
$storage=$_POST['storage'];
$link=$_POST['link'];
$comments=$_POST['comments'];
$sql="INSERT INTO `recipes`( `title`, `category`, `ingredients`, `instructions`, `benefits`, `usage_product`, `preparation_time`, `difficulty_level`, `storage`, `link`, `comments`, `creator_id`) VALUES ('$title','$category','$ingredients','$instructions','$benefits','$usage','$preparation_time','$difficulty_level','$storage','$link','$comments','$creator_id')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:recipes.php?status=success");
}
else{
	header("location:recipes.php?status=failed");
}

?>