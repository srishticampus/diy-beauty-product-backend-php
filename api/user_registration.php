<?php
require 'connection.php';
$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];

 $address=$_REQUEST['address'];

$data=array();
$post=array();

$sql="select * from  user where phone='$phone'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
$row=$result->fetch_assoc();
	
$post =array("status"=>false,
             "message"=>"User Already Exist",
             "userData"=>$data);
}
else{
	

        $sql="INSERT INTO `user`( `name`, `phone`, `address`, `email`, `password`) VALUES ('$name','$phone','$address','$email','$password')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
$last_id = $con->insert_id;
$sq="select * from user where id=$last_id";
$res=$con->query($sq);
$row=$res->fetch_assoc();
$data[]=array("id"=>($row['id']== null ?"":$row['id']),
              "name"=>($row['name']== null ?"":$row['name']),
              "phone"=>($row['phone_number']== null ?"":$row['phone_number']),
              "email"=>($row['email']== null ?"":$row['email']),
              "password"=>($row['password']== null ?"":$row['password']),
              "address"=>($row['address']== null ?"":$row['address']),
             
              "creation_date"=>($row['creation_date']== null ?"":$row['creation_date']));
$post =array("status"=>true,
             "message"=>"Registration Successfull",
             "userData"=>$data);
}
else{
	$post =array("status"=>false,
             "message"=>"Registration Failed",
             "userData"=>$data);
}
}
echo json_encode($post);
?>