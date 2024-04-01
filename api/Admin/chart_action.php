<?php
require 'connection.php';
session_start();
               $time=$_POST['time'];
               $day=$_POST['day'];
               $description=$_POST['description'];
                    $sql = "INSERT INTO `dietchart`( `time`, `day`, `description`) VALUES ('$time','$day','$description')";
                 $result = $con->query($sql);
                  $count = $con->affected_rows;
            if($count>0){
            header("location:add_chart.php?status=success");
                  //echo $sql;
            }
            else{
            	header("location:add_chart.php?status=failed");
            }
?>