<?php
require 'connection.php';
$data=array();
$sql="select *  from category";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while ($row=$result->fetch_assoc()) {
		// code...
	
	$data[]=array("id"=>$row['id'],
                 "category_name"=>$row['category_name'],
                 "image"=>"http://campus.sicsglobal.co.in/Project/Diy_product/Admin/uploads/".$row['image']);

}
$post=array("status"=>true,
            "message"=>"Category Listed",
            "categoryDetails"=>$data);
}
else{
	$post=array("status"=>false,
            "message"=>"No Category Listed",
            "categoryDetails"=>$data);
}
echo json_encode($post);
?>