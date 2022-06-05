<?php 
   session_start();
   include('../db_connection.php');
   if(!isset($_SESSION['admin']))
   {
        header("Location:index.php");
   }
   $stu_id=$_GET['stu_id'];
   $result_id=$_GET['result_id'];
   $query="delete from user_result where id=$result_id";
   $result=mysqli_query($con,$query);
   if($result)
   {
      header("Location:user_details.php?stu_id=$stu_id");
   }
 
?>