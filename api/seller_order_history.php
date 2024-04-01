<?php

require 'connection.php';
$seller_id=$_REQUEST['seller_id'];
$post=array();
$sql="select * from orders inner join product on product.product_id=orders.product_id  where product.seller_id='$seller_id' and orders.status='Order Placed'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){

		$sql1="select * from product where seller_id=$seller_id";
		$result1=$con->query($sql1);
		$row1=$result1->fetch_assoc();
		$selling_price=$row1['selling_price'];
		$total=$selling_price*$row['quantity'];

		$post[]=array('product_id'=>$row['product_id'],
			'cart_id'=>($row['cart_id']==null)?"":$row['cart_id'],
	                  "seller_id"=>$row['seller_id'],
	                  "name"=>$row['name'],
	                  "description"=>$row['description'],
	                  "selling_price"=>$row['selling_price'],
	                  "customer_name"=>($row['customer_name']==null)?"":$row['customer_name'],
	                   "address"=>($row['address']==null)?"":$row['address'],
	                  "pincode"=>($row['pincode']==null)?"":$row['pincode'],
	                  "phone"=>($row['phone']==null)?"":$row['phone'],
	                  "order_status"=>$row['status'],
	                  // "image1"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$row['image1'],
                   //"video"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$row['video'],
                   "qty"=>$row['quantity'],
	                  "amount"=>$total); 
	                 
	}
	$data=array('status'=>true,
                 "product_details"=>$post);
}
else{
	$data=array('status'=>false,
                 "product_details"=>$post);
}
echo json_encode($data);

?>