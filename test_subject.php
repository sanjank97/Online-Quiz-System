<?php 
  session_start();
  include('db_connection.php');
  if(isset($_SESSION['summery_id']))
  {
	 header("Location:result_summery.php");
  }
  if(isset($_POST['go_back']))
  {
	  unset($_SESSION['test_page']);
  }
  if(isset($_SESSION['test_page']))
  {
	 
    header("Location:test_subject_handler.php");
  }
  if(!isset($_SESSION['user']))
  {
     header("Location:index.php");
  }
 
  $query="select * from subjects";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Select Subject</title>
		<style>
			body{
				padding-top:50px;
			}
			form div{
				margin-top:25px;
			}
			.main{
				width:30%;
				margin:0 auto;
				border: 1px solid #bbbaba;
				padding-left: 22px;
				padding-bottom: 25px;
				border-radius: 4px;
				padding-top:20px;
			}
			.msg-box{
				text-align:center;
                width:40%;
                margin:0 auto;
                border: 1px solid #bbbaba;
                padding: 7px;
                border-left:none;
				border-right:none;
				margin-bottom:10px;
             }
			.subject select{
				padding: 8px;
				margin-left: 24px;
				border: 1px solid #bbbaba;
				border-radius: 3px;
				width:60%
				}
				.submit input{
				padding: 8px 35px;
				border: 1px solid #bbbaba;
				border-radius: 3px;
				} 
			#inst{
               display:none;
			   text-align:justify;
			   padding-left:40px;
           }
           #inst_head{
               padding:10px 20px;
			   
           }
		</style>
		<script src="jquery.js"></script>
	</head>
	<body>
	<div class="msg-box">
            <button id="inst_head" style="color:red;">Instructions!</button> 
            <span style="color:red; margin-left:20px;">*Before Starting Test Carefully Read Instructions!</span>
            <div id="inst">
            <h4>Maximum Time 5 Minutes :</h4>
            <p> *If you don't quit exam under 5 minutes default submitted.</p>
            <h4>Before Submission Exam :</h4>
            <p> *Please check given answer fields by clicking Prev Button.</p>
            </div>
        </div>
		 <div class="main">
		
		      <a href="logout.php">LOGOUT</a>
			 <h3>Please Select Subject For Test</h3>
			 <form action="test_subject_handler.php" method="post"> 
				 <input type="text" name="stu_id" value="<?php echo $_SESSION['stu_id']?>" hidden>
				 <div class="subject">
						<label>Select Subject</label>
						<select name="subject"> 
							<?php
							if($num > 0)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									echo"<option>".$row['subject']."</option>";
								}
							} 
							?>
						</select>
		         </div>	   
				  <div class="submit">
				      <input type="submit" name="submit" value="start">
			      </div>	  
				
			</form>
         </div>	 
			<script>
				$(document).ready(function(){
					$('#inst_head').click(function(){
				 	$('#inst').slideToggle();
				  });
				});
			</script>
	</body>
</html>