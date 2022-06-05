
<?php 
  session_start();
  if(isset($_SESSION["user"]))
  {
	  header("Location:test_subject.php");
  }
  if(!isset($_SESSION["valid_otp"]))
  {
	  header("Location:check_otp.php");
  }
  if(!isset($_SESSION['email']))
  {
      header("Location:forget_password.php");
  }
?>
<!DOCTYPE html>
<html>
     <head>
		<title>Create Password</title>
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
				margin-left: 41px;
				border: 1px solid #FF9800;
				border-radius: 3px;
				width:60%;
				
			  }
			
			  .password input{
				padding: 8px;
				margin-left: 44px;
				border: 1px solid #FF9800;
				border-radius: 3px;
				width:60%
			  }
              .re-password input{
                padding: 8px;
                margin-left: 15px;
                width: 60%;
                border: 1px solid #FF9800;
                border-radius:3px;
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
				  margin-left:110px;
				  color:red;
				  font-size:14px;
			  }
			  .submit input:hover{
				  background:#ef6c00;
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
			<div><h2>Create Password</h2></div>
			
			<form action="create_password_handler.php" method="post" onsubmit="return validateForm()">
			<div class="email">
				<label>Username</label>
				<input type="text" name="email" id="email" value="<?php echo $_SESSION['email'];?>" placeholder="Enter Email" onblur="return emailValidate()" >
			</div>
			<span id="email_err"></span>	
			<div class="password">
				<label>Password</label>
				<input type="password" name="password" id="pass" Placeholder="Enter Password" onblur="return passwordValidate()">
			</div>	
			<span id="pass_err"></span>
            <div class="re-password">
                        <label> Re-Password :</label>
                        <input type="password" name="re_password" placeholder="Re-password" id='repass' onblur="return repassValidate()" >
                    </div>
                    <span id="repass_err"></span>
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
                  function repassValidate()
                  {
                    var pass=document.getElementById('pass').value;
                    var repass=document.getElementById('repass').value;
                    if(repass=="")
                      {
                        document.getElementById('repass_err').innerHTML="The repassword field is required.";  
                        return false;
                      }
                      else if(repass.length<6)
                      {
                        document.getElementById('repass_err').innerHTML="please enter repassword of length atleast 6.";
                        return false;
                      }
                      else if(repass != pass)
                      {
                        document.getElementById('repass_err').innerHTML="Password mis-matched try again.";
                        return false;
                      }
                      else
                      {
                        document.getElementById('repass_err').innerHTML="";  
                        return true;
                      }

                  }
				  function validateForm()
                  {
                   
                    var email_validation= emailValidate(); 
                    var password_validation= passwordValidate();
                    var repass_validation= repassValidate();  
                    
                    if(email_validation==false ||password_validation==false||repass_validation==false)
                    {
                        return false;
                    }
                  }
		</script>	 
     	 
     </body>	
</html>