<?php 
       session_start();
       if(isset($_POST['email']))
       {
            header("Location:index.php");
       }
       include('../db_connection.php'); 
       echo $email = $_POST['email'];
       echo $password = $_POST['password'];
       $query="select * from admin where email='$email' AND password='$password'";
       $result=mysqli_query($con,$query);
       $num=mysqli_num_rows($result);
       if($num > 0)
       {
          $_SESSION['admin']="admin";
          header("Location:dashboard.php");
       }
       else
       {
         $_SESSION['error']="error";
         header("Location:index.php");
       }
 


?>