<?php
require 'connection.php';
$data = array();
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$address = $_REQUEST['address'];
$userid = $_REQUEST['userid'];



    $sql = "UPDATE `user` SET `name`='$name',`phone`='$phone',`address`='$address',`email`='$email',`password`='$password' WHERE id=$userid";
    $result = $con->query($sql);

    if (!$result) {
        //echo $sql;
        $data = array("status" => false, "message" => "update failed");
    } else {
        $data = array("status" => true, "message" => "update successful");
    }
   



echo json_encode($data);
?>
