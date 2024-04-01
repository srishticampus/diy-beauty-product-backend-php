<?php
require 'connection.php';
$user_id=$_REQUEST['user_id'];
$post['status']="error";
$data=array();

$base_url="http://campus.sicsglobal.co.in/Project/janani/api/uploads/"; 
//$base_url="http://localhost/e_commerce/upload/"; 
$user_id=$_REQUEST['user_id'];
$result=$con->query("select * from orders inner join product on product.product_id=orders.product_id  where orders.user_id='$user_id' and orders.status='Order Placed'");
$count=$result->num_rows;
$order_status=$_REQUEST['status'];

if($count>0)
{


// $result5= $con->query("SELECT count(*) as tot_count FROM orders where user_id='$user_id'");
// $row5=$result5->fetch_assoc(); 
// $cart_count = $row5['tot_count'];

// $result6= $con->query("SELECT sum(total) as tot_price FROM orders where user_id='$user_id'");
// $row6=$result6->fetch_assoc(); 
// $cart_price = $row6['tot_price'];


while($row=$result->fetch_assoc())
{

$basename=basename($row['image1']);
$sql1="select * from product where seller_id=$user_id";
		$result1=$con->query($sql1);
		$row1=$result1->fetch_assoc();
		$selling_price=$row1['selling_price'];
		$total=$selling_price*$row['quantity'];


                  $data[] =array(
                        "product_id" => $row['product_id'],
                         "cart_id"=>($row['cart_id']==null)?"":$row['cart_id'],
                        "name" => $row['name'],
                        "description" =>$row['description'],
						// "quantity" =>$row['quantity'],
						 "selling_price" =>$row["selling_price"],
						 "customer_name"=>($row['customer_name']==null)?"":$row['customer_name'],
	                   "address"=>($row['address']==null)?"":$row['address'],
	                      "pincode"=>($row['pincode']==null)?"":$row['pincode'],
	                  "phone"=>($row['phone']==null)?"":$row['phone'],
						"photo" =>$base_url.$basename,
						"quantity_ordered" =>$row['qty'],
						"total_price" =>$total,
						// "total_count" =>$cart_count,
						"total_payable" =>$row['mrp'], 
						"order_status"=>$row["status"]		
                   );      

}        

$post = array("status"=>"true","orderDetails"=>$data);

}
 else {
$post = array("status"=>"false","orderDetails"=>$data);
   // $post['status']="fail";
}


echo(json_encode($post));

?>
