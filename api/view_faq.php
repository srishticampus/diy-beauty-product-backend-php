<?php

require 'connection.php';
$id=$_REQUEST['id'];
$post=array();
$sql="select * from faq";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$post[]=array('id'=>$row['id'],
	                  "question"=>$row['question'],
	                  "answer"=>$row['answer']
	              ); 
	                 
	}
	$data=array('status'=>true,
                 "faq"=>$post);
}
else{
	$data=array('status'=>false,
                 "faq"=>$post);
}
echo json_encode($data);

?>