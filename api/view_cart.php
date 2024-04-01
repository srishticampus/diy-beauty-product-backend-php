<?php
require 'connection.php';
$user_id=$_REQUEST['user_id'];
$post['status']="error";
$data=array();
$base_url="http://campus.sicsglobal.co.in/Project/janani/api/uploads/"; 
//$base_url="http://localhost/e_commerce/upload/"; 
$userid=$_REQUEST['userid'];
$sql="select * from product inner join orders on product.product_id=orders.product_id WHERE orders.user_id='$user_id' and orders.cart_delete_status=0";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0)
{


// $result5= $con->query("SELECT count(*) as tot_count FROM cart where user_id='$user_id'");
// $row5=$result5->fetch_assoc(); 
// $cart_count = $row5['tot_count'];

// $result6= $con->query("SELECT sum(total_amount) as tot_price FROM cart where user_id='$user_id'");
// $row6=$result6->fetch_assoc(); 
// $cart_price = $row6['tot_price'];


while($row=$result->fetch_assoc())
{

$basename=basename($row['image1']);
$mrp=$row['mrp'];
$selling_price=$row["selling_price"];
$quantity=$row['quantity'];
$cart_price =$selling_price*$quantity;

                  $data[] =array("cart_id"=>$row['cart_id'],
                        "product_id" => $row['product_id'],
                        "name" => $row['name'],
                        "description" =>$row['description'],
						//"quantity" =>$row['quantity'],
						 "selling_price" =>$row["selling_price"],
						"photo" =>$base_url.$basename,
						"quantity_ordered" =>$quantity,
						//"total_price" =>$row["cart_price"],
						//"total_count" =>$cart_count,
						"total_amount" =>$cart_price 				
                   );      

}        

$post = array("status"=>"true","orderDetails"=>$data);

}
 else {
 	//echo $sql;
$post = array("status"=>"false","orderDetails"=>$data);
   // $post['status']="fail";
}


echo(json_encode($post));

?>
