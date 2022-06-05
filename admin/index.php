<?php 
  session_start();
  if(isset($_SESSION['admin']))
  {
	  header("Location:dashboard.php");
  }
?>
<!DOCTYPE html>
<html>
     <head>
     	    <title>Admin Login</title>
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
				border: 1px solid #bbbaba;
				padding-left: 20px;
				padding-bottom: 20px;
				border-radius: 4px;
              }
		     .email input{
				padding: 8px;
				margin-left: 24px;
				border: 1px solid #bbbaba;
				border-radius: 3px;
				width:60%
			  }
			  .password input{
				padding: 8px;
				margin-left: 27px;
				border: 1px solid #bbbaba;
				border-radius: 3px;
				width:60%
			  }
			  .submit input{
				padding: 8px 35px;
				margin-left: 0px;
				border: 1px solid #bbbaba;
				border-radius: 3px;
			  }
			  form span{
				  margin-left:94px;
				  color:red;
				  font-size:14px;
			  }
     	   </style> 
     </head>
     <body>
	    <div class="main">
			<h3>Admin Login</h3>
			<?php 
				if(isset($_SESSION['error']))
				{
					?>
					 <p style="color:red"> You entered wromg credentials.!</p>
					<?php
					unset($_SESSION['error']);
				}
			?>
			<form action="admin_handler.php" method="post" onsubmit="return validateForm()">
				<div class="email">
					<label>Username</label>
					<input type="email" name="email" id="email" placeholder="Enter Email" onblur="return emailValidate()">
				</div>
				<span id="email_err"></span>
				<div class="password">
					<label>Password</label>
					<input type="password" name="password" id="pass" placeholder="Enter password" onblur="return passwordValidate()">
				</div>
				<span id="pass_err"></span>
				<div class="submit">
					<input type="submit" value="submit">
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
                        document.getElementById('pass_err').innerHTML="The Password field is required.";  
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