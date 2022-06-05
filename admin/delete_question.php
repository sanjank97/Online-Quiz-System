<?php 
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location:index.php");
    }
    include('../db_connection.php');
    $qid=$_GET['qid'];
    $sub_id=$_GET['sub_id'];
    echo $qid;
    $query="delete from questions where id=$qid";
    $result=mysqli_query($con,$query);
    if($result)
    {
       header("Location:fetch_questions.php?sub_id=$sub_id");
    }

?>