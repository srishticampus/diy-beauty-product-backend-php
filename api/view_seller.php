<?php

require 'connection.php';
$userid=$_REQUEST['sellerid'];
$sql="select * from seller where id=$userid and status=1";
$result=$con->query($sql);
$count=$result->num_rows;
$data=array();
$details=array();
if($count>0){
	$row=$result->fetch_assoc();
	$details[]=array("id"=>$row['id'],
                     "name"=>$row['name'],
                     "phone"=>$row['phone'],
                     "address"=>$row['address'],
                     "email"=>$row['email'],
                     "password"=>$row['password'],
                     "license"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$row['license_pic'],
                     "license_num"=>$row['license_num'],
                     "user_kit"=>$row['user_kit']);
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