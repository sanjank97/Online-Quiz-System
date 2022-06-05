<?php 
    session_start();
	if(!isset($_SESSION['admin']))
	{
		 header("Location:index.php");
	}
    include('../db_connection.php'); 
    $qid=$_GET['qid'];
    $query="select * from questions where id=$qid";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    if($num > 0)
    {
      $row=mysqli_fetch_assoc($result);
    }
  ?> 
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
				margin-left: 20px;
				width: 60%;
				border: 1px solid #bbbaba;
				border-radius:3px;
		}
		.opcorrect input{
				margin-left: 20px;
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
		        <h3>Update Question</h3>
				<form action="edit_question_handler.php" method="post">
					<input type="text" name="qid" value="<?php echo  $row['id']; ?>" hidden>
                    <input type="text" name="sub_id" value="<?php echo $row['sub_id'] ; ?>" hidden>
					<div class="ques">
					<label>Qusetion : </label>
					<input type="text" name="ques" placeholder="Enter Question" value="<?php echo $row['ques'] ?>">
					</div>
					<div class="opa">
						<label>Option a :</label>
						<input type="text" name="opa" placeholder="Enter Answer " value="<?php echo $row['opa'] ?>">

					</div>	
					<div class="opb">
						<label>Option b :</label>
						<input type="text" name="opb" placeholder="Enter Answer" value="<?php echo $row['opb'] ?>">

					</div>	

					<div class="opc">
						<label>Option c : </label>
						<input type="text" name="opc" placeholder="Enter Answer"value="<?php echo $row['opc'] ?>" >

					</div>	

					<div class="opd">
						<label>Option d :</label>
						<input type="text" name="opd" placeholder="Enter Answer"value="<?php echo $row['opd'] ?>">

					</div>
					<div class="opcorrect">
						<label>Correct Option :</label>
						<input type="text" name="opcorrect" placeholder="Enter correct option" value="<?php echo $row['opcorrect'] ?>">

					</div>

					<div class="submit">
						<input type="submit" value="Update">
                        <a style="margin-left:20px;" href="dashboard.php">back</a>
					</div>	

				</form>
		 </div>
    	
    </body>	
</html>
