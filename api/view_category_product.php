<?php
require 'connection.php';
$data=array();
$category=$_REQUEST['category_id'];

$sql="select *  from product where category_id=$category";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while ($row=$result->fetch_assoc()) {
		$creator_id=$row['creator_id'];
		$sq="select * from creator where id=$creator_id";
		$res=$con->query($sq);
		$ro=$res->fetch_assoc();
	
	$data[]=array("id"=>$row['id'],
                 "product_name"=>$row['product_name'],
                 "image"=>"http://campus.sicsglobal.co.in/Project/Diy_product/Creator/uploads/".$row['image'],
                 "quantity"=>$row['quantity'],
                 "price"=>$row['price'],
                 "creator_name"=>$ro['name']);

}
$post=array("status"=>true,
            "message"=>"Product Listed",
            "categoryDetails"=>$data);
}
else{
	$post=array("status"=>false,
            "message"=>"No Product Listed",
            "categoryDetails"=>$data);
}
echo json_encode($post);
?>