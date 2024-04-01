<?php

require 'connection.php';
$userid=$_REQUEST['userid'];
$sql="select * from user where id=$userid";
$result=$con->query($sql);
$count=$result->num_rows;
$data=array();
$details=array();
if($count>0){
	$row=$result->fetch_assoc();
	$details[]=array("id"=>$row['id'],
                     "name"=>$row['name'],
                     "mobile"=>$row['mobile'],
                     "age"=>$row['age'],
                     "email"=>$row['email'],
                     "password"=>$row['password'],
                     "file"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$row['file'],
                     "device_token"=>$row['device_token']);
	$data=array("status"=>true,
               "message"=>"User Details",
               "userDetails"=>$details);
}
else{
$data=array("status"=>false,
               "message"=>"No User Details",
               "userDetails"=>$details);
}
echo json_encode($data);
?>