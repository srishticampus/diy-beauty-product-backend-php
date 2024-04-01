<?php
require 'connection.php';
$user_id=$_REQUEST['user_id'];
$customer_name=$_REQUEST['customer_name'];
$address=$_REQUEST['address'];
$pincode=$_REQUEST['pincode'];
$phone=$_REQUEST['phone'];
$city=$_REQUEST['city'];
$state=$_REQUEST['state'];
$cart_id=$_REQUEST['cart_id'];
$data=array();
$total=0;
// $query="select * from cart where cart_id=$cart_id ";
// $queryResult=$con->query($query);
// $queryCount=$queryResult->num_rows;
// while ($queryrow=$queryResult->fetch_assoc()) {
// 	$totalResult=$queryrow['total_amount'];
// 	$total=$total+$totalResult;
// }

$sql="update `orders` set `user_id`='$user_id',  `total`='$total', `customer_name`='$customer_name', `address`='$address', `pincode`='$pincode', `phone`='$phone', `city`='$city', `state`='$state', `status`='Order Placed' where cart_id=$cart_id";
$result=$con->query($sql);
//$count=$result->affected_rows;
if(!$result){
	$data=array("status"=>false,
                "message"=>"Failed!"
				
				);
	}
else{
	$query="select * from cart where cart_id=$cart_id ";
$queryResult=$con->query($query);
$queryCount=$queryResult->num_rows;
while ($queryrow=$queryResult->fetch_assoc()) {
	$product_id=$queryrow['product_id'];
	$quantity=$queryrow['qty'];
	$result1=$con->query("select * from product where product_id='$product_id'");
		$row1=$result1->fetch_assoc();
		
		$stock=$row1["qty"];
		if($stock>0){
		$sql_update="update product set qty=qty-$quantity where product_id='$product_id'";
		$result_update=$con->query($sql_update);
	}
	else{
		$data=array("status"=>false,
                "message"=>"Failed!"
				
				);
	}
}
$data=array("status"=>true,
                "message"=>"success"
				);
}

echo json_encode($data);
	
?>