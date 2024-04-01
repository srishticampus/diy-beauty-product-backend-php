<?php
require 'connection.php';
$id=$_POST['id'];
$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$license_num=$_POST['license_num'];
$user_kit=$_POST['user_kit'];

$upload_dir = 'uploads/';
$server_url = '/home/ubuntu/html/Project/janani/api/';
$avatar_name = $_FILES["avatar"]["name"];
    $icon_name=$_FILES["icon"]["name"];
    $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
    $icon_tmp_name=$_FILES["icon"]["tmp_name"];
    $error = $_FILES["avatar"]["error"];
    $error1=$_FILES["icon"]["error"];

  $sql="select * from seller where phone='$phone'";
  $result=$con->query($sql);
  $count=$result->num_rows;

if($count>0)
{
$response=array("status" =>false,
"message"=> "User_exist");
}

else{
        $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);

$random_name1 = rand(1000,1000000)."-".$icon_name;
        $upload_name1 = $upload_dir.strtolower($random_name1);
        $upload_name1 = preg_replace('/\s+/', '-', $upload_name1);
        $image= $server_url."/".$upload_name;
        $video= $server_url."/".$upload_name1;

 if(move_uploaded_file($avatar_tmp_name,$upload_name))
 {
  $image= basename($upload_name);
 }
 else
 {
  $image="";
 }
            
if(move_uploaded_file($icon_tmp_name,$upload_name1))
{
  $video= basename($upload_name1);
}
else
{
  $video="";
}
      
        //  $image= basename($upload_name);
         
      
$sql="INSERT INTO `seller`(`name`,`address`,`phone`,`email`,`password`,`logo`,`license_pic`,`license_num`,`user_kit`) VALUES ('$name','$address','$phone','$email','$password','$image','$video','$license_num','$user_kit')";
$result=$con->query($sql);
$count=$con->affected_rows;
 if($count>0)
{
            $response = array(
                "status" =>true,
                "message" => "Inserted successfully"
               
              );


        }else
        {
           $response = array(
                "status" =>false,
                "message" =>"Failed"
            );
     }
    }
    echo json_encode($response);
?>