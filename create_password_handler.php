<?php 
  session_start();
  include("db_connection.php");
  if(isset($_POST['email'])) 
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="update user_record set password='".$password."' where email='".$email."'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        $_SESSION['psw']="psw";
        unset($_SESSION['email']);
        unset($_SESSION['valid_otp']);
        header("Location:index.php");
    }

  }

?>