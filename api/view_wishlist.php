<?php
require 'connection.php';

$data=array();
$details=array();
$sql="SELECT wishlist.id as wid,user.id as user_id,user.name as uname,user.mobile,user.age,user.email,wishlist.product_id,product.name as pname,product.category ,product.image1,product.image2,product.image3,product.video,product.mrp,product.selling_price,product.qty FROM `user` INNER JOIN wishlist on wishlist.user_id=user.id INNER JOIN product on product.product_id=wishlist.product_id where wishlist.wstatus=0";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while ($row=$result->fetch_assoc()) {
		$image1=basename($row['image1']);
		$video=basename($row['video']);
		$details[]=array("wishlistid"=>$row['wid'],
	                    "user_id"=>$row['user_id'],
	                    "username"=>$row['uname'],
	                    "userMobile"=>$row['mobile'],
	                    "age"=>$row['age'],
	                    "email"=>$row['email'],
	                    "product_id"=>$row['product_id'],
	                    "productname"=>$row['pname'],
	                    "category"=>$row['category'],
	                    "mrp"=>$row['mrp'],
	                    "selling_price"=>$row['selling_price'],
	                    "quantity"=>$row['qty'],
	                    "image1"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$image1,
	                    "video"=>"http://campus.sicsglobal.co.in/Project/janani/api/uploads/".$video
	                    );
	}
	$data=array("status"=>true,
                "message"=>"listed wishlist",
                "wishlistDetails"=>$details);
}
else{
	$data=array("status"=>false,
                "message"=>"no wishlist listed ",
                "wishlistDetails"=>$details);

}
echo json_encode($data);
?>