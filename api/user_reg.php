<?php
require 'connection.php';
$id=$_POST['id'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$age=$_POST['age'];
$email=$_POST['email'];
$password=$_POST['password'];
$device_token=$_POST['device_token'];
$upload_dir = 'uploads/';
$details=array();
$server_url = '/home/ubuntu/html/Project/janani/api/';
 $avatar_name = $_FILES["image"]["name"];
    
    $avatar_tmp_name = $_FILES["image"]["tmp_name"];
 
    $error = $_FILES["image"]["error"];
   
$data=array();
$sql="select * from user where mobile='$mobile'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$data=array("status"=>false,
              "message"=>"User Already Exist",
              "userDetails"=>array());
	}
	else{


		 $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);


         $upload_name= $server_url."/".$upload_name;
         
  move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
          
$sql="INSERT INTO `user`(`name`,`mobile`,`age`,`email`,`password`,`file`,`device_token`) VALUES ('$name','$mobile','$age','$email','$password','$image','$device_token')";
$result=$con->query($sql);
$count=$con->affected_rows;
//$last_id = $con->insert_id;
if($count>0)
{
	$query="select * from user where id='$id'";
	$queryResult=$con->query($query);
	while($row=$queryResult->fetch_assoc()){
    $details[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "mobile"=>$row['mobile'],
                   "age"=>$row['age'],
                   "email"=>$row['email'],
                   "password"=>$row['password'],
                   "image"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$row['file'],
                   "device_token"=>$row['device_token']);
  }


$data=array("status"=>true,
              "message"=>"Registration Success",
              "userDetails"=>$details);
}
else{
	$data=array("status"=>false,
              "message"=>"Registration Failed",
              "userDetails"=>array());
	

}}
echo json_encode($data);

?>