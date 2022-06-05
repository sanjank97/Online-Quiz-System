<?php 
    session_start();
    include("db_connection.php");
   if(isset($_POST['otp']))
   {
       $otp=$_POST['otp'];
       if(isset($_SESSION['email']))
       {
           $email=$_SESSION['email'];
           $query="select * from user_record where email='".$email."'";
           $result=mysqli_query($con,$query);
           $row=mysqli_fetch_assoc($result);
           if($row['otp']==$otp)
           {
               $_SESSION['valid_otp']="valid_otp";
               header("Location:create_password.php");
           }
           else
           {
               $_SESSION['otp_err']="otp_err";
               header("Location:check_otp.php");
           }



       }
       else
       {
           header("Location:forget_password.php");
       }
   }

?>