
<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
      header("Location:index.php");
 }
 include('../db_connection.php');
  ?>
<!DOCTYPE HTML>
<html>
     <head>
     	  <title>Adminstrator</title>
            <style>
                  body{
                       padding-top:50px;
                  }
                  .main{
                         width:30%;
                         margin:0 auto;
                         border: 1px solid #bbbaba;
                         padding-left: 20px;
                         padding-bottom: 20px;
                         border-radius: 4px;
                  } 
                  form div {
                         margin-top:10px;
                  }
                  
                  .subject input{
                         padding: 8px;
                         margin-left: 12px;
                         width: 60%;
                         border: 1px solid #bbbaba;
                         border-radius:3px;
                  }
                  .submit input, .submit button,.all_stu button{
                         padding: 8px 28px;
                         border: 1px solid #bbbaba;
                         border-radius:3px;
                  }
                  .subject_id select{
                         padding: 8px;
                         margin-left: 45px;
                         width: 66%;
                         border: 1px solid #bbbaba;
                         border-radius: 3px;
                  }
                  .submit button a,.all_stu a{
                       text-decoration:none;
                       color:black;
                  }
                  .all_stu{
                       margin-top:20px;}
               form span{
                    margin-left:94px;
                    color:red;
                    font-size:14px;
          }
            </style>
     </head>
     <body>
           <div class="main">
               <h3>Admin Dashboard</h3>
               <a href="logout.php">LOGOUT</a>
               <div class="Add Subject">
                    <form action="add_subject_handler.php"  onsubmit=" return validateForm()">
                         <div class="subject">
                              <label>Add Subject : </label>
                              <input type="text" name="subject" id="add_subject" placeholder="Subject Name" >
                         </div>
                         <?php 
                           if(isset($_SESSION['sub_error']))
                           {
                                ?>
                                <span style='color:red; font-size:14px;'>This Subject is Already Added!</span>
                                <?php
                                unset($_SESSION['sub_error']);
                           }
                         ?>
                         <span id="subject_err"></span>
                         <div class="submit" id="firstDiv">
                              <input type="submit" value="submit">
                              <button><a href="all_subjects.php">view all subject<a></button>
                         </div>
                    </form>
                    <h4>Add Questions Choose Subject </h4>
               
                    <form action="add_question.php"  onsubmit="return validateForm2()">
                        <div class="subject_id">
                              <label>Subject : </label>
                              <select name="sub_id" id="select_sub">
                                   <option value="" selected>select subject</option>
                                   <?php 
                                   $query="select * from subjects";
                                   $result=mysqli_query($con,$query);
                                   if(mysqli_num_rows($result) > 0)
                                   {
                                        if($result)
                                        {
                                             while($row=mysqli_fetch_assoc($result))
                                             {
                                                  ?>
                                                  <option value="<?php echo $row['id'];?>"><?php echo $row['subject'];?></option>
                                                  <?php
                                             
                                             }
                                        }    
                                   }
                                   ?>
                              </select>
                        </div>
                        <span id="select_sub_err"></span>    
                         <div class="submit">
                             <input type="submit" value="submit">
                         </div>
                         
                    </form>
                    <h4>View Questions Choose Subject </h4>
                    <form action="fetch_questions.php" onsubmit="return validateForm3()" >
                        <div class="subject_id">
                              <label>Subject : </label>
                              <select name="sub_id" id="select_sub_ques">
                                   <option value="" selected>select subject</option>
                                   <?php 
                                   $query="select * from subjects";
                                   $result=mysqli_query($con,$query);
                                   if(mysqli_num_rows($result) > 0)
                                   {
                                        if($result)
                                        {
                                             while($row=mysqli_fetch_assoc($result))
                                             {
                                                  ?>
                                                  <option value="<?php echo $row['id'];?>"><?php echo $row['subject'];?></option>
                                                  <?php
                                             
                                             }
                                        }    
                                   }
                                   ?>
                              </select>
                        </div> 
                        <span id="select_sub_ques_err"></span>     
                         <div class="submit">
                             <input type="submit" value="submit">
                         </div>
                         
                    </form>
                    <h4>View All Registered Students </h4>
                    <div class="all_stu">
                     <button> <a href="registered_stu.php">View All Registered Students</a></button>
                    </div>
               </div> 
           </div>
     	<script>
               function validateForm()
               {
                    var subject=document.getElementById('add_subject').value;
                    if(subject=="")
                    {
                        document.getElementById('subject_err').innerHTML="The subject Field is required.";
                         return false;
                    }
                    else
                    {
                         document.getElementById('subject_err').innerHTML="";
                        
                         return true;
                    }

               }
               function validateForm2()
               {
                    var subject=document.getElementById('select_sub').value;
                    if(subject=="")
                    {
                        document.getElementById('select_sub_err').innerHTML="The subject Field is required.";
                         return false;
                    }
                    else
                    {
                         document.getElementById('select_sub_err').innerHTML="";
                       
                         return true;
                    }

               }
               function validateForm3()
               {
                   
                    var subject=document.getElementById('select_sub_ques').value;
                    if(subject=="")
                    {
                        document.getElementById('select_sub_ques_err').innerHTML="The subject Field is required.";
                         return false;
                    }
                    else
                    {
                         document.getElementById('select_sub_ques_err').innerHTML="";
                         return true;
                    }

               }
          </script>
     </body>	
</html>