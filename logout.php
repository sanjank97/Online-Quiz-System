<?php 
   session_start();

   if(isset($_SESSION['test_page']))
   {
     
    header("Location:test_subject_handler.php");
   }
   else
   {
    if(isset($_SESSION["user"]))
    {
        unset($_SESSION["user"]);
        session_destroy();
        header("Location:index.php");
    }
    else
    {
        header("Location:index.php");  
    }
   }


?>
 <script>
     window.localStorage.clear();
 </script>
  