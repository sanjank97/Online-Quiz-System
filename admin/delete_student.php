<?php 
    session_start();
    if(!isset($_SESSION['admin']))
    {
         header("Location:index.php");
    }
    include('../db_connection.php');
    $stu_id=$_GET['stu_id'];
    echo $stu_id;
    $query="delete from user_record where id=$stu_id";
    $result=mysqli_query($con,$query);
    if($result)
    {
       header("Location:registered_stu.php");
    }

?>