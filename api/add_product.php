<?php
require 'connection.php';
$id=$_POST['id'];
$seller_id=$_POST['seller_id'];
$name=$_POST['name'];
$category=$_POST['category'];
$description=$_POST['description'];
$mrp=$_POST['mrp'];
$selling_price=$_POST['selling_price'];
$qty=$_POST['qty'];

$upload_dir = 'uploads/';
$server_url = '/home/ubuntu/html/Project/janani/api/';
$avatar_name = $_FILES["avatar"]["name"];
    $icon_name=$_FILES["icon"]["name"];
    $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
    $icon_tmp_name=$_FILES["icon"]["tmp_name"];
    $error = $_FILES["avatar"]["error"];
    $error1=$_FILES["icon"]["error"];

    $avatar1_name = $_FILES["avatar1"]["name"];
    $avatar1_tmp_name = $_FILES["avatar1"]["tmp_name"];
    $error2 = $_FILES["avatar1"]["error"];

    $avatar2_name = $_FILES["avatar2"]["name"];
    $avatar2_tmp_name = $_FILES["avatar2"]["tmp_name"];
    $error3 = $_FILES["avatar3"]["error"];

  $sql="select * from product where product_id='$id'";
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

        $random_name2 = rand(1000,1000000)."-".$avatar1_name;
        $upload_name2 = $upload_dir.strtolower($random_name2);
        $upload_name2 = preg_replace('/\s+/', '-', $upload_name2);
        $image1= $server_url."/".$upload_name2;

        $random_name3 = rand(1000,1000000)."-".$avatar2_name;
        $upload_name3 = $upload_dir.strtolower($random_name3);
        $upload_name3 = preg_replace('/\s+/', '-', $upload_name3);
        $image2= $server_url."/".$upload_name3;

$random_name1 = rand(1000,1000000)."-".$icon_name;
        $upload_name1 = $upload_dir.strtolower($random_name1);
        $upload_name1 = preg_replace('/\s+/', '-', $upload_name1);
        $image= $server_url."/".$upload_name;
        $video= $server_url."/".$upload_name1;

 if(move_uploaded_file($avatar_tmp_name,$upload_name))
 {
  $image= basename($upload_name);
 }


 // if(move_uploaded_file($avatar1_tmp_name,$upload_name2))
 // {
 //  $image1= basename($upload_name2);
 // }

 // if(move_uploaded_file($avatar2_tmp_name,$upload_name3))
 // {
 //  $image2= basename($upload_name3);
 // }
            
if(move_uploaded_file($icon_tmp_name,$upload_name1))
{
  $video= basename($upload_name1);
}

      
        //  $image= basename($upload_name);
         
      
$sql="INSERT INTO `product`(`seller_id`,`name`,`category`,`description`,`image1`,`video`,`mrp`,`selling_price`,`qty`) VALUES ('$seller_id','$name','$category','$description','$image','$video','$mrp','$selling_price','$qty')";
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