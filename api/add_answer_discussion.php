<?php
require 'connection.php';
$data=array();
$userid=$_REQUEST['userid'];
$discussion_id=$_REQUEST['discussion_id'];
$answers=$_REQUEST['answers'];
$sql="INSERT INTO `discussion_answers`( `discussion_id`, `user_id`, `answers`) VALUES ('$discussion_id','$userid','$answers')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
                "message"=>"answers added successfully");
}
else{
	$data=array("status"=>false,
                "message"=>"answers added failed");
}
echo json_encode($data);
?>