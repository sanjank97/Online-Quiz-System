<?php 
    session_start();
    if(!isset($_SESSION['admin']))
    {
         header("Location:index.php");
    }
    include('../db_connection.php');
    $sub_id=$_GET['sub_id'];
    echo $sub_id;
    $query="delete from subjects where id=$sub_id";
    $result=mysqli_query($con,$query);
    if($result)
    {
        header("Location:all_subjects.php");
    }

?>