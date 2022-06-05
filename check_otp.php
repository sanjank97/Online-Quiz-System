
<?php 
  session_start();
  if(isset($_SESSION["user"]))
  {
	  header("Location:test_subject.php");
  }
  if(!isset($_SESSION['email']))
  {
      header("Location:forget_password.php");
  }
?>
<!DOCTYPE html>
<html>
     <head>
		<title>Otp</title>
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
		     .otp input{
				padding: 8px;
				margin-left: 24px;
				border: 1px solid #FF9800;
				border-radius: 3px;
				width:60%;
				
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
				  margin-left:58px;
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
			<div><p style="color:green;">OTP has been sent on your Registered Email Id please check.</p></div>
		
			<form action="check_otp_handler.php" method="post" onsubmit="return validateForm()">
			<div class="otp">
				<label>OTP</label>
				<input type="text" name="otp" id="otp" placeholder="Enter OTP" onblur="return otpValidate()" >
			</div>
			<span id="otp_err"></span>
			<?php 
				if(isset($_SESSION['otp_err']))
				{
					?>
					 <span style="color:red">Enter valid OTP.</span>
					<?php
					unset($_SESSION['otp_err']);
				}
			?>	
			<div class="submit">
				<input type="submit" value="submit">
				<a id="create" href="forget_password.php">Resend OTP</a>
			</div>

			</form>
		</div>
		<script>
		        function otpValidate()
                  {
					  var otp=document.getElementById('otp').value;
                      if(otp=="")
                      {
                        document.getElementById('otp_err').innerHTML="The otp field is required.";  
                        return false;
                      }
                      else
                      {
                        document.getElementById('otp_err').innerHTML="";  
                        return true;
                      }
                  }  
			
				  function validateForm()
                  {
                   
                    var otp_validation= otpValidate(); 
                    if(otp_validation==false)
                    {
                        return false;
                    }
                  }
		</script>	 
     	 
     </body>	
</html>