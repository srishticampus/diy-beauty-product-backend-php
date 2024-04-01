<?php
require 'connection.php';
$data=array();
$userid=$_REQUEST['userid'];
//$phone=$_REQUEST['phone'];
//$email=$_REQUEST['email'];
$comment=$_REQUEST['comments'];
$product_id=$_REQUEST['product_id'];
$sql="INSERT INTO `feedback`( `userid`,`comments`,`product_id`) VALUES ('$userid','$comment',$product_id)";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
                "mesaage"=>"Feedback Added");

}
else{
	 $data=array("status"=>false,
                 "mesaage"=>"Feedback Added Failed");
    //echo $sql;
}
echo json_encode($data);
?>