<?php 
   session_start();
   include('db_connection.php');

   if(!isset($_SESSION["user"]))
   {
       header("Location:test_subject.php");
   }
  
   if(isset($_POST['result_summery_id']))
   {
      $summery_id=$_POST['result_summery_id'];
      $_SESSION['summery_id']= $summery_id;
      unset($_SESSION['test_page']);
   }
 
   if(isset($_SESSION['summery_id']))
   {
       $id=$_SESSION['summery_id'];
       $query="select * from user_result where id=$id";
       $result=mysqli_query($con,$query);
       $row=mysqli_fetch_assoc($result);
       $sub_id=$row['sub_id'];
       $user_ans=explode(",",$row['user_ans']);
       $time_taken=$row['time_taken'];
       $query="select * from questions where sub_id=$sub_id";
       $result=mysqli_query($con,$query);
       $query1="select * from subjects where id=$sub_id";
       $result1=mysqli_query($con,$query1);
       $subject=mysqli_fetch_assoc($result1);
   }
   else
   {
    header("Location:test_subject.php");   
   }

?>
<!DOCTYPE html>
<html>
    <head>
          <title>Result Summery Page</title>
          <style>
                 body{
                     padding-top:30px;
                 }
                .main{
                    margin:0 auto;
                    width:50%;
                    border:1px solid black;
                    padding:20px  0px 20px 30px;
                }
                h3{
                    text-align:center;
                    text-decoration: underline;
                    
                }
                .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                position: relative;
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                border: 1px solid #888;
                width: 40%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }

            /* Add Animation */
            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0} 
                to {top:0; opacity:1}
            }

            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
                }

            /* The Close Button */
            .close {
                color: white;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            .modal-header {
                padding: 2px 16px;
                background-color: #5cb85c;
                color: white;
            }

            .modal-body {
                padding: 10px 16px;}
            .modal-body input{
                padding: 10px;
                width: 60%;
                border: 1px solid #c1bbbb;
                border-radius: 3px;
            }   
            .modal-body button{
                padding: 10px 38px;
                border-radius: 3px;
                border: 1px solid #c1bbbb;
            } 

            .modal-footer {
                padding: 2px 16px;
                background-color: #5cb85c;
                color: white;
            }
          </style>
    </haed>
     <body> 
          <div class="main">
                
                <h3>Your Answer Summery</h3>
                <a href="logout.php">LOGOUT</a>
                <p> Subject : <span><?php echo $subject['subject'];?></span></p>
                <p> Your Total Score : <span><?php echo $row['score']." / ".$row['total_ques'];?></span></p>
                <p>Time_Taken: <?php  echo $time_taken;?></p>
               <?php 
                   
                   $i=0;
                  while($row=mysqli_fetch_assoc($result))
                    {
                        ?>
                        <p> <strong><?php echo ($i+1)." .".$row['ques'];?></strong></p>
                        <p><input type="radio" value="a" name="<?php echo "ans".($i)?>" disabled><?php echo $row['opa'];?></p>
                        <p><input type="radio" value="b" name="<?php echo "ans".($i)?>" disabled> <?php echo $row['opb'];?></p>
                        <p><input type="radio" value="c" name="<?php echo "ans".($i)?>" disabled> <?php echo $row['opc'];?></p>
                        <p><input type="radio" value="d" name="<?php echo "ans".($i)?>" disabled> <?php echo $row['opd'];?></p>
                        <script>
                            var data=document.querySelector("input[name='<?php echo "ans".($i);?>'][value='<?php echo $user_ans[$i]?>']");
                            data.checked = true;

                        </script>
                        
                        <?php
                        if($row['opcorrect']==$user_ans[$i])
                        {
                            ?>
                              <p style="color:green;">Correct</p>
                            <?php
                        }
                        else
                        {
                            ?>
                            <p style="color:red;">Incorrect</p>
                            <p>Answer : <span><?php echo $row['opcorrect']; ?></span></p>
                          <?php
                        }

                        $i++;
                    }
               
               
               ?>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close">&times;</span>
                            <h2>Welcome</h2>
                        </div>
                        <div class="modal-body">
                                
                                <div id="showEventDiv">
                                    <p style=" line-height:1.6;">Congratulations You Have Completed Quiz.Please Check Your Result Otherwise You can Logout Thank You.!</p>
                                </div>
                            
                        </div>
                        
                    </div>
                </div>
          </div>
          <script>
            
               if(localStorage.getItem("modal_loaded")!="yes")
                 {
                    window.onload=myfun();
                 }
                 localStorage.setItem("modal_loaded", "yes");
            
               

                function myfun()
                {
                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";
                    var span = document.getElementsByClassName("close")[0];
                    span.onclick = function() {
                    modal.style.display = "none";
                  }
                }
                
          </script>
         
     </body>
</html>