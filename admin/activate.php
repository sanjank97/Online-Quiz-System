<?php 
   session_start();
   if(!isset($_SESSION['admin']))
   {
        header("Location:index.php");
   }
   include('../db_connection.php');
  $id=$_GET['id'];
  echo $id;
  $query="select status from user_record where id=$id";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($result);
  echo $row['status'];
  if($row['status']==1)
  {
      $query="update user_record set status=0 where id=$id";
  }
  else
  {
    $query="update user_record set status=1 where id=$id";
  }
  $result=mysqli_query($con,$query);
  if($result)
  {
      header("Location:registered_stu.php");
  }
  else
  {
      echo "failed";
  }

?>