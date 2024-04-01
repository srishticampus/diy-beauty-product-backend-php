<?php

require 'connection.php';
$id=$_REQUEST['id'];
$post=array();
$sql="select * from category";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$post[]=array('id'=>$row['id'],
	                  "item"=>$row['item']
	              ); 
	                 
	}
	$data=array('status'=>true,
                 "category"=>$post);
}
else{
	$data=array('status'=>false,
                 "category"=>$post);
}
echo json_encode($data);

?>