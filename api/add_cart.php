<?php
require 'connection.php';
$product_id=$_REQUEST['product_id'];
$user_id=$_REQUEST['user_id'];
$qty=$_REQUEST['qty'];
// $seller_id=$_REQUEST['seller_id'];

$data=array();
 $last_id=0;
$sql="SELECT * FROM product WHERE product_id='$product_id'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$seller=$row['seller_id'];
$price=$row['selling_price'];
$total_price=$qty*$price;
$query="select * from cart where user_id=$user_id";
$queryResult=$con->query($query);
$queryCount=$queryResult->num_rows;
if($queryCount>0){
$sql="update  cart set user_id=$user_id,seller_id=$seller where user_id=$user_id";
$result=$con->query($sql);
$que="select * from cart where user_id=$user_id";
$queryRes=$con->query($que);
$queryCo=$queryRes->num_rows;
$queryRow=$queryRes->fetch_assoc();
$last_id=$queryRow['cart_id'];
$s="select * from orders where product_id=$product_id";
$r=$con->query($s);
$c=$r->num_rows;
if($c>0){
$sql1="update `orders` set `user_id`=$user_id, `cart_id`=$last_id ,`product_id`=$product_id, `quantity`=`quantity`+'$qty', `status`='Cart' where product_id=$product_id";
$result1=$con->query($sql1);
if(!$result){
	$data=array("status"=>false,
                "message"=>"Failed!"
				
				);
}
else
{
	

	
	$data=array("status"=>true,
                "message"=>"success"
				);
}
}
else{
	$sql1="INSERT INTO `orders`(`user_id`, `cart_id` ,`product_id`, `quantity`, `status`) VALUES ($user_id, $last_id,$product_id,'$qty','Cart')";
$result1=$con->query($sql1);

$count1=$con->affected_rows;
if($count1>0){
	$data=array("status"=>true,
                "message"=>"success"
				);
}
else
{
	//echo $sql1;

	$data=array("status"=>false,
                "message"=>"Failed!"
				
				);
}

}



	
}
else{
$sql="insert into cart(user_id,seller_id)values('$user_id','$seller')";
$result=$con->query($sql);

$count=$con->affected_rows;
 $last_id = $con->insert_id;

$sql1="INSERT INTO `orders`(`user_id`, `cart_id` ,`product_id`, `quantity`, `status`) VALUES ($user_id, $last_id,$product_id,'$qty','Cart')";
$result1=$con->query($sql1);

$count1=$con->affected_rows;
if($count1>0){
	$data=array("status"=>true,
                "message"=>"success"
				);
}
else
{
	//echo $sql1;

	$data=array("status"=>false,
                "message"=>"Failed!"
				
				);
}
}

echo json_encode($data);
	
?>