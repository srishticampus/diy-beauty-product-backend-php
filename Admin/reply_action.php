<?php
require 'connection.php';
session_start();
$discussion_id=$_POST['discussion_id'];
$reply=$_POST['reply'];
$sql="update discussion_answers set admin_reply='$reply' where id=$discussion_id";
$result=$con->query($sql);
if(!$result){
	header("location:view_discussion.php?status=failed");
}
else{
	header("location:view_discussion.php?status=success");
}
?>