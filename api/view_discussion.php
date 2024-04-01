<?php
require 'connection.php';
$data=array();

$sql="SELECT * FROM `discussion`";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
	
	$category_id=$row['category'];
		$sq="select * from category where id=$category_id";
		$res=$con->query($sq);
		$ro=$res->fetch_assoc();
	$data[]=array("id"=>$row['id'],
                 "topics"=>$row['topics'],
                 "category"=>$ro['category_name'],
                 "created_at"=>$row['created_at']);
}


$post=array("status"=>true,
            "message"=>"discussion details Listed",
            "categoryDetails"=>$data);
}
else{
	$post=array("status"=>false,
            "message"=>"No discussion Listed",
            "categoryDetails"=>$data);
}
echo json_encode($post);
?>