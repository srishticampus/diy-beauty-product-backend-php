<?php
require 'connection.php';
$phone=$_REQUEST['phone'];
$password=$_REQUEST['password'];
$data=array();
$sql="select * from seller where phone='$phone' and password='$password' and status=1";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
     
	while($row=$result->fetch_assoc()){
	$data[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "address"=>$row['address'],
                   "phone"=>$row['phone'],
                   "email"=>$row['email'],
                   "password"=>$row['password'],
                   "logo"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['logo'],
                   "license_pic"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['license_pic'],
                   "license_num"=>$row['license_num'],
                   "user_kit"=>$row['user_kit']);

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