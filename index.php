
<?php 
  session_start();
  if(isset($_SESSION["user"]))
  {
	  header("Location:test_subject.php");
  }
?>
<!DOCTYPE html>
<html>
     <head>
		<title>User Login</title>
		<meta charset="UTF-8">
		<meta name="description" content="Free Web tutorials">
		<meta name="keywords" content="HTML, CSS, JavaScript">
		<meta name="author" content="John Doe">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
     	  <style>
			body{
				padding-top:50px;
			}   
            form div{
            	margin-top:20px;
            }
			  .main{
				 
				width:30%;
				margin:0 auto;
				border: 1px solid #FF9800;
				padding-left: 20px;
				padding-bottom: 20px;
				border-radius: 4px;
              }
			  label{
				  color: #EF6C00;
			  }
			  ::placeholder{
               color: #EF6C00;
			  }
		     .email input{
				padding: 8px;
				margin-left: 24px;
				border: 1px solid #FF9800;
				border-radius: 3px;
				width:60%;
				
			  }
			
			  .password input{
				padding: 8px;
				margin-left: 27px;
				border: 1px solid #FF9800;
				border-radius: 3px;
				width:60%
			  }
			  .submit input{
				padding: 8px 35px;
				margin-left: 0px;
				border: 1px solid #FF9800;
				border-radius: 3px;
				background: #f57c00;
				color:#fff;
			  }
			  input:focus{
				
				outline:none;
				border: 2px solid #FF9800;
				border-radius: 3px;
			  }
			  form span{
				  margin-left:94px;
				  color:red;
				  font-size:14px;
			  }
			  .submit input:hover{
				  background:#ef6c00;
			  }
			  #create{
				margin-left:20px; 
				color: #EF6C00; 
				text-decoration:none;
			  }
			  #create:hover{
                color:#e65100;
			  }
			@media only screen and (max-width:576px) {
			.main{
				width:100%;
			}
			}
			@media only screen and (max-width:992px) {
			.main{
				width:70%;
			}
			}
			@media only screen and (max-width:1200px) {
			.main{
				width:50%;
			}
			}
			
			
		
     	  </style>
     </head>	
     <body>
		 <div class="main">
			<div><h2>User Login</h2></div>
			<?php 
				if(isset($_SESSION['error']))
				{
					?>
					 <p style="color:red"> You entered wromg credentials.!</p>
					<?php
					unset($_SESSION['error']);
				}
			?>
			<?php 
				if(isset($_SESSION['status_error']))
				{
					?>
					 <p style="color:red">Sorry Admin site Issue Please Try After Sometimes Thank You.!</p>
					<?php
					unset($_SESSION['status_error']);
				}
			?>
			<?php 
				if(isset($_SESSION['psw']))
				{
					?>
					 <p style="color:green">Password Updated successfully.!</p>
					<?php
					unset($_SESSION['psw']);
				}
			?>
			<form action="user_login_handler.php" method="post" onsubmit="return validateForm()">
			<div class="email">
				<label>Username</label>
				<input type="text" name="email" id="email" placeholder="Enter Email" onblur="return emailValidate()" >
			</div>
			<span id="email_err"></span>	
			<div class="password">
				<label>Password</label>
				<input type="password" name="password" id="pass" Placeholder="Enter Password" onblur="return passwordValidate()">
			</div>	
			<span id="pass_err"></span>
			<div class="submit">
				<input type="submit" value="submit">
				<a id="create" href="forget_password.php">Forget Password</a>
				<a id="create" href="registration.php">Create Account?</a>
			</div>

			</form>
		</div>
		<script>
		        function emailValidate()
                  {
					  var email=document.getElementById('email').value;
					  
                      var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                      if(email=="")
                      {
                        document.getElementById('email_err').innerHTML="The Email Id field is required.";  
                        return false;
                      }
                      else if(regex.test(email)==false)
                      {
                        document.getElementById('email_err').innerHTML="Please Enter Valid Email Id.";  
                        return false;
                      }
                      else
                      {
                        document.getElementById('email_err').innerHTML="";  
                        return true;
                      }
                  }  
				  function passwordValidate()
                  {
                    var pass=document.getElementById('pass').value;
                      if(pass=="")
                      {
                        document.getElementById('pass_err').innerHTML="The Password field is required";  
                        return false;
                      }
                      else if(pass.length<6)
                      {
                        document.getElementById('pass_err').innerHTML="please enter password of length atleast 6.";
                        return false;
                      }
                      else
                      {
                        document.getElementById('pass_err').innerHTML="";  
                        return true;
                      }
                  }
				  function validateForm()
                  {
                   
                    var email_validation= emailValidate(); 
                    var password_validation= passwordValidate(); 
                    
                    if(email_validation==false ||password_validation==false)
                    {
                        return false;
                    }
                  }
		</script>	 
     	 
     </body>	
</html>