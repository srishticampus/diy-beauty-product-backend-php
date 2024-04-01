<?php
require 'connection.php';
$userid=$_REQUEST['userid'];

$data=array();
$post=array();
$sql="select * from user where id=$userid";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
   
	
	$data[]=array("id"=>($row['id']== null ?"":$row['id']),
              "name"=>($row['name']== null ?"":$row['name']),
              "phone"=>($row['phone_number']== null ?"":$row['phone_number']),
              "email"=>($row['email']== null ?"":$row['email']),
              "password"=>($row['password']== null ?"":$row['password']),
              "username"=>($row['username']== null ?"":$row['username']),
              "image"=>($row['image']==null?"":"http://campus.sicsglobal.co.in/Project/Evlocators/api/uploads/".$row['image']),
              "skincare_preferences"=>($row['skincare_preferences']== null ?"":$row['skincare_preferences']),
              "profile_description"=>($row['profile_description']== null ?"":$row['profile_description']),
              "user_type"=>($row['user_type']== null ?"":$row['user_type']),
              "creation_date"=>($row['creation_date']== null ?"":$row['creation_date']));
	$post=array("status"=>true,
               "message"=>"User details listed",
               "userData"=>$data);

}
else{
	$post=array("status"=>false,
               "message"=>"No User details found",
               "userData"=>$data);
}
echo json_encode($post);
?>