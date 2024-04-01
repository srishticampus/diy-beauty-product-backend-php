<?php
require 'connection.php';
$data=array();
$tip_id=$_REQUEST['tip_id'];
$sql="select * from tips where id=$tip_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	
	$row=$result->fetch_assoc();
		$category=$row['category'];
		$sq="select * from category where id=$category";
		$res=$con->query($sq);
		$ro=$res->fetch_assoc();
		$creator_id=$row['creator_id'];
		$sq1="select * from creator where id=$creator_id";
		$res1=$con->query($sq1);
		$ro1=$res1->fetch_assoc();
		$data[]=array("id"=>$row['id'],
	                  "category"=>$ro['category_name'],
	                  "description"=>$row['description'],
	                  "ingredients"=>$row['ingredients'],
	                  "instructions"=>$row['instructions'],
	                  "benefits"=>$row['benefits'],
	                  "usage_product"=>$row['usage_product'],
	                  "additional_tips"=>$row['additional_tips'],
	                  "file"=>"http://campus.sicsglobal.co.in/Project/Diy_product/Creator/uploads/".$row['file'],
	                  "storage"=>$row['storage'],
	                  "link"=>$row['link'],
	                  "comments"=>$row['comments'],
	                  "creator"=>$ro1['name']);
	
	$post=array("status"=>true,
              "message"=>"Tip Listed",
              "recipeDetails"=>$data);


}
else{
	$post=array("status"=>false,
              "message"=>" No Tip Listed",
              "recipeDetails"=>$data);

}
echo json_encode($post);
?>