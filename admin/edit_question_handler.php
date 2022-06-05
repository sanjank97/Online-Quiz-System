<?php 
     session_start();
     if(!isset($_SESSION['admin']))
     {
          header("Location:index.php");
     }
    include('../db_connection.php');
    $qid=$_POST['qid'];
    echo $qid;
    $sub_id=$_POST['sub_id'];
    echo $ques=$_POST['ques'];
    echo $opa=$_POST['opa'];
    echo $opb=$_POST['opb'];
    echo $opc=$_POST['opc'];
    echo $opd=$_POST['opd'];
    echo $opcorrect=$_POST['opcorrect'];
    $query="update questions set ques='$ques',opa='$opa',opb='$opb',opc='$opc',opd='$opd',opcorrect='$opcorrect' where id=$qid";
    $result=mysqli_query($con,$query);
    if($result)
    {
        header("Location:fetch_questions.php?sub_id=$sub_id");
    }

?>