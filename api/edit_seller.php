<?php
require 'connection.php';
$id=$_POST['id'];
$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user_kit=$_POST['user_kit'];
$password=$_POST['password'];
$license_num=$_POST['license_num'];

$data=array();

 $upload_dir="uploads/";
$server_url = '/home/ubuntu/html/Project/janani/api/'; 
$image=$_FILES["license_pic"]["name"];;
$random_name = rand(1000,1000000)."-".$image;
 $image_tmp_name = $_FILES["license_pic"]["tmp_name"];
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
        $upload_name=$server_url."/".$upload_name;

        if($image==""){

        $query="select * from seller where id='$id'";
$resultquery=$con->query($query);
$row=$resultquery->fetch_assoc();
$photo=$row[' license_pic'];
        }
        else{
        move_uploaded_file($image_tmp_name , $upload_name);
           $photo=basename($upload_name); 
       }

      
       $sql="UPDATE `seller` SET `name`='$name',`address`='$address',`phone`='$phone',`license_pic`='$photo',`license_num`='$license_num',`password`='$password',`user_kit`='$user_kit' WHERE id='$id'";
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