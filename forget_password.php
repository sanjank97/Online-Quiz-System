
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
		<title>Forget Password</title>
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
				  margin-left:84px;
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
			<div><h2>Registered Email</h2></div>
		
			<form action="forget_password_handler.php" method="post" onsubmit="return validateForm()">
			<?php 
				if(isset($_SESSION['email_error']))
				{
					?>
					   <p style="color:red"><?php echo $_SESSION['email_error'];?></p>
					<?php
					unset($_SESSION['email_error']);
				}
			
			?>
			<p></p>
			<div class="email">
				<label>Email Id</label>
				<input type="text" name="email" id="email" placeholder="Enter Email" onchange="return emailValidate()" >
			</div>
			<span id="email_err"></span>	
		
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
			
				  function validateForm()
                  {
                   
                    var email_validation= emailValidate(); 
                    if(email_validation==false)
                    {
                        return false;
                    }
                  }
		</script>	 
     	 
     </body>	
</html>