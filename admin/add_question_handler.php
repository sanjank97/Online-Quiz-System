<?php 
   session_start();
   if(!isset($_SESSION['admin']))
   {
      header("Location:index.php");
   }
   include('../db_connection.php'); 
   $sub_id = $_POST['sub_id'];
   $ques=$_POST['ques'];
   $opa=$_POST['opa'];
   $opb=$_POST['opb'];
   $opc=$_POST['opc'];
   $opd=$_POST['opd'];
   $opcorrect=$_POST['opcorrect'];
   $query="insert into questions(ques,opa,opb,opc,opd,opcorrect,sub_id) values('".$ques."','".$opa."','".$opb."','".$opc."','".$opd."','".$opcorrect."','".$sub_id."')";
   $result=mysqli_query($con,$query);
   if($result)
   {
      $_SESSION['added']="added";	
      header("Location:add_question.php");
   }
   else
   {
      echo "Failed";
   }



?>