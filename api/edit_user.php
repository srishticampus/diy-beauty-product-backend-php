<?php
require 'connection.php';
$id=$_POST['id'];
$name=$_POST['name'];
$age=$_POST['age'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$password=$_POST['password'];

$data=array();

 $upload_dir="uploads/";
$server_url = '/home/ubuntu/html/Project/janani/api/'; 
$image=$_FILES["file"]["name"];
$random_name = rand(1000,1000000)."-".$image;
 $image_tmp_name = $_FILES["file"]["tmp_name"];
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
        $upload_name=$server_url."/".$upload_name;
        if($image==""){
$query="select * from user where id='$id'";
$resultquery=$con->query($query);
$row=$resultquery->fetch_assoc();
$photo=$row['file'];
        }
        else{
        move_uploaded_file($image_tmp_name , $upload_name);
           $photo=basename($upload_name); 
       }
       $sql="UPDATE `user` SET `name`='$name',`age`='$age',`mobile`='$mobile',`file`='$photo',`password`='$password',`email`='$email' WHERE id='$id'";
       $result=$con->query($sql);
       if(!$result){
       	$status=array("status"=>false,
                    "message"=>"failed");
     
       }
       else{
       		$status=array("status"=>true,
                     "message"=>"success");
       }
       
      echo json_encode($status);  

        ?>