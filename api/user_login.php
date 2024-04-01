<?php
require 'connection.php';
$mobile=$_REQUEST['mobile'];
$password=$_REQUEST['password'];
$device_token=$_REQUEST['device_token'];
$data=array();
 $sq="update user set device_token='$device_token' where mobile='$mobile' and password='$password'";
      $res=$con->query($sq);
$sql="select * from user where mobile='$mobile' and password='$password'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
     
	while($row=$result->fetch_assoc()){
	$data[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "mobile"=>$row['mobile'],
                   "age"=>$row['age'],
                   "email"=>$row['email'],
                   "password"=>$row['password'],
                   "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['file'],
                   "device_token"=>$row['device_token']);

}
$post=array("status"=>true,
            "message"=>"Login Success",
            "userDetails"=>$data);
}
else{
	$post=array("status"=>false,
            "message"=>"Login Failed",
            "userDetails"=>$data);
}
echo json_encode($post);
?>