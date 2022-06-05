<?php session_start();
 if(!isset($_SESSION['admin']))
 {
      header("Location:index.php");
 }?>
<!DOCTYPE html>
<html>
    <head>
    	<title>Add Question</title>
    	<style>
		   body{
			   padding-top:50px;
		   }
    		form div{
				margin-top: 25px;
    		}
			.main{
				width:30%;
				margin:0 auto;
				border: 1px solid #bbbaba;
				padding-left: 20px;
				padding-bottom: 20px;
				border-radius: 4px;
			}
			.ques input{
				padding: 8px;
				margin-left: 20px;
				width: 60%;
				border: 1px solid #bbbaba;
				border-radius:3px;
		}
		.opa input,.opb input,.opc input,.opd input,.opcorrect input{
				padding: 8px;
				margin-left: 23px;
				width: 60%;
				border: 1px solid #bbbaba;
				border-radius:3px;
		}
		.opcorrect input{
				margin-left: 23px;
				width: 50%;
		}
		.submit input{
				padding: 8px 40px;
				border: 1px solid #bbbaba;
				border-radius:3px;
		}
    	</style>	
    </head>
    <body> 
	     <div class="main">
				<?php
				   if(isset($_SESSION['added']))
				   {
					   ?>
					     <p style="color:green">Question Added..!</p>
					   <?php
					   unset($_SESSION['added']);
				   }
				
				?>
		        <h3>Add Question</h3>
				<form action="add_question_handler.php" method="post">
					<input type="text" name="sub_id" value="<?php echo  $_GET['sub_id']; ?>" hidden>
					<div class="ques">
					<label>Qusetion : </label>
					<input type="text" name="ques" placeholder="Enter Question">
					</div>
					<div class="opa">
						<label>Option a :</label>
						<input type="text" name="opa" placeholder="Enter Answer ">

					</div>	
					<div class="opb">
						<label>Option b :</label>
						<input type="text" name="opb" placeholder="Enter Answer">

					</div>	

					<div class="opc">
						<label>Option c : </label>
						<input type="text" name="opc" placeholder="Enter Answer">

					</div>	

					<div class="opd">
						<label>Option d :</label>
						<input type="text" name="opd" placeholder="Enter Answer">

					</div>
					<div class="opcorrect">
						<label>Correct Option :</label>
						<input type="text" name="opcorrect" id="opcorrect" maxlength="1" placeholder="Enter correct option" pattern="[A-Za-z]" onkeyup="myFunction()">

					</div>

					<div class="submit">
						<input type="submit" value="submit">
						<a style="margin-left:20px;" href="dashboard.php">back</a>
					</div>	
                      
				</form>
		 </div>
		  <script>
		      function myFunction() {
				var x = document.getElementById("opcorrect");
				x.value = x.value.toLowerCase();
				}
		  </script>
    	
    </body>	
</html>