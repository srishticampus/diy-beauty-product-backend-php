<?php
require 'connection.php';
$data=array();
$sql="select * from recipes";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
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
	                  "ingredients"=>$row['ingredients'],
	                  "instructions"=>$row['instructions'],
	                  "benefits"=>$row['benefits'],
	                  "usage_product"=>$row['usage_product'],
	                  "preparation_time"=>$row['preparation_time'],
	                  "difficulty_level"=>$row['difficulty_level'],
	                  "storage"=>$row['storage'],
	                  "link"=>$row['link'],
	                  "comments"=>$row['comments'],
	                  "creator"=>$ro1['name']);
	}
	$post=array("status"=>true,
              "message"=>"Recipes Listed",
              "recipeDetails"=>$data);


}
else{
	$post=array("status"=>false,
              "message"=>" No Recipes Listed",
              "recipeDetails"=>$data);

}
echo json_encode($post);
?>