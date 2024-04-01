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
$recipes_id=$_POST['recipes_id'];
$sql="UPDATE `recipes` SET `title`='$title',`category`='$category',`ingredients`='$ingredients',`instructions`='$instructions',`benefits`='$benefits',`usage_product`='$usage',`preparation_time`='$preparation_time',`difficulty_level`='$difficulty_level',`storage`='$storage',`link`='$link',`comments`='$comments' WHERE id=$recipes_id";
$result=$con->query($sql);
if(!$result){
	header("location:view_recipes.php?status=failed");
}
else{
	header("location:view_recipes.php?status=success");
}

?>