<?php
require 'connection.php';
$data=array();
$userid=$_REQUEST['userid'];
$sql="SELECT payment.id,creator.name as cname,product.image,product.product_name,cart.quantity,user.name,user.phone,product.price FROM `product` INNER join cart on cart.product_id=product.id INNER JOIN payment on payment.cart_id=cart.id INNER JOIN user on user.id= payment.user_id INNER JOIN creator on creator.id=product.creator_id  where user.id=$userid";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$data[]=array("id"=>$row['id'],
	                 "creator_name"=>$row['cname'],
	                 "product_name"=>$row['product_name'],
	                 "order_quantity"=>$row['quantity'],
	                 "product_price"=>$row['price']*$row['quantity'],
	                 "user_name"=>$row['name'],
	                 "user_phone"=>$row['phone']);
	}
	$post=array("status"=>true,
                 "message"=>"order details",
                 "orderDetails"=>$data);
}
else{
	$post=array("status"=>false,
                 "message"=>"No order details",
                 "orderDetails"=>$data);
}

echo json_encode($post);
?>