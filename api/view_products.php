<?php

require 'connection.php';
$product_id=$_REQUEST['product_id'];
$post=array();
$sql="select * from product";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$image1=basename($row['image1']);
		$video=basename($row['video']);
		$post[]=array('product_id'=>$row['product_id'],
	                  "seller_id"=>$row['seller_id'],
	                  "name"=>$row['name'],
	                    "category"=>$row['category'],
	                  "description"=>$row['description'],
	                  "image1"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$image1,
					  "image2"=>$row['image2'],
					  "image3"=>$row['image3'],
                   "video"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$video,
                   "mrp"=>$row['mrp'],
	                  "selling_price"=>$row['selling_price']); 
	                 
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