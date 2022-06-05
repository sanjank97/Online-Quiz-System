<?php 
     session_start();
     if(!isset($_SESSION['admin']))
     {
          header("Location:index.php");
     }
     include('../db_connection.php');
     
      if(isset($_GET['status']))
      {
         $status=$_GET['status'];
         $query="update user_record set status=$status";
         $result=mysqli_query($con,$query);
      }
     
      header("Location:registered_stu.php");

     
  



?>