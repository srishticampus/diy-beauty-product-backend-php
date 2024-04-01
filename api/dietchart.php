<?php

require 'connection.php';


$sql="select * from dietchart order by id asc";

$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$details=array();
	while($row=$result->fetch_assoc()){
		$details[]=array("id"=>$row['id'],
	                   "time"=>$row['time'],
	                   "day"=>$row['day'],
	                   "description"=>$row['description']);
	}
	$data=array("status"=>true,
"message"=>"Details Listed",
"dietDetails"=>$details);
}
else{
	$data=array("status"=>false,
"message"=>"No Details Listed",
"dietDetails"=>$details);
}
echo json_encode($data);
?>