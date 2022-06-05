<?php 
    session_start();
    include('db_connection.php');
	$email=$_POST['email'];
	$password= $_POST['password'];

	$query="select * from user_record where email='$email' AND password='$password'"; 
	$result=mysqli_query($con,$query);
	$num=mysqli_num_rows($result);
	if($num>0)
	{
       
		$row=mysqli_fetch_assoc($result);
	    if($row['status'] == 1)
		{
			$_SESSION['user']="user";
			$_SESSION['stu_id']=$row['id'];
			header("Location:test_subject.php");
		}
		else
		{  
			$_SESSION['status_error']="status_error";
			header("Location:index.php");
		}
		
	}
	else
	{
		$_SESSION['error']="error";
		header("Location:index.php");
	}




?>