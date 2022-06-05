<?php 
session_start();
if(!isset($_SESSION['admin']))
{
     header("Location:index.php");
}
  include('../db_connection.php');
  $subject = $_GET['subject'];
  $query="select * from subjects where subject='$subject'";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
  if($num >0)
  {
    $_SESSION['sub_error']="sub_error";
    header("Location:dashboard.php");
  }
  else
  {
    $query ="insert into subjects(subject) values('$subject')";
    $result = mysqli_query($con,$query);
    if($result)
    {
      header("location:dashboard.php");
    }
    else
    {
      echo "failed";
    }
  }
  







?>