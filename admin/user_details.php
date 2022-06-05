<?php
    session_start();
    if(!isset($_SESSION['admin']))
    {
         header("Location:index.php");
    } 
    include('../db_connection.php');
    $stu_id=$_GET['stu_id'];
    $query="select * from user_record where id=$stu_id";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    $query="select * from subjects";
    $result=mysqli_query($con,$query);
    

?>
<!DOCTYPE html>
<html>
    <head>
       <title>User Information</title>
       <style>
             body{
                 padding-top:30px;
             }
             .main div{
                 margin-top:20px;
             }
             .main{
                width:50%;
				margin:0 auto;
				border: 1px solid #bbbaba;
				padding-left: 20px;
				padding-bottom: 20px;
				border-radius: 4px;  
                padding-right:20px;
                padding-top:10px;
             }
             .id span{
                 margin-left:60px;
             }
             .name span{
                 margin-left:91px;
             }
             .email span{
                 margin-left:91px;
             }
             .password span{
                 margin-left:67px;
             }
             .phone span{
                 margin-left:90px;
             }
             .post_status span{
                 margin-left:62px;
             }
             table {
                        border-collapse: collapse;
                        width: 100%;
                        border-radius:3px;
                        }
                        td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                        }
            #delete{
                    text-decoration: none;
                    color:red;
            }
            td select,td input{
                    border: 1px solid #fff;
                    background: #fff;
            }
           
       </style>
    </head>
    <body>
         <div class="main">
             <a href="registered_stu.php">back</a>
             <h3>User Details:</h3>
             <div class="id">
                 <lable>Student ID : <span><?php echo $row['id']?></span></lable>
             </div>
             <div class="name">
                 <lable>Name : <span><?php echo $row['fname']." ".$row['lname']?></span></lable>
             </div>
             <div class="email">
                 <lable>Email : <span><?php echo $row['email']?></span></lable>
             </div>
             <div class="password">
                 <lable>Password : <span><?php echo $row['password']?></span></lable>
             </div>
             <div class="phone">
                 <lable>Phone : <span><?php echo $row['phone']?></span></lable>
             </div>
             <div class="post_status">
                 <lable>Post-status : <span><?php echo $row['user_post']?></span></lable>
             </div>
             <h4>Quiz Marks :</h4>
             <table id="myTable">
                 <tr>
                    <td>Sno</th>
                    <td>
                        <select id="myInput" onchange="myFunction()">
                               <option value="">Subject</option>
                             <?php
                                while($sub_row=mysqli_fetch_assoc($result))
                                {
                                    ?>
                                     <option ><?php echo $sub_row['subject'] ?></option>
                                    <?php
                                }
                             ?>
                              
                       </select>    

                    </td>
                    <td>Score</td>
                    <td>Total Questions</td>
                    <td>Time Taken</td>
                    <td><input id="myDate" type="date" name="date"></td>
                 </tr>
              <?php 
                $query="select * from user_result where stu_id=$stu_id";
                $result=mysqli_query($con,$query);
                $num=mysqli_num_rows($result);
                if($num>0)
                {
                    $i=0;
                    $c=1;
                   while($row=mysqli_fetch_assoc($result))
                   {
                       $sub_id=$row['sub_id'];
                       $query1="select * from subjects where id=$sub_id";
                       $result1=mysqli_query($con,$query1);
                       $sub_row=mysqli_fetch_assoc($result1);
                       ?>
                        <tr class="tr">
                           <td class="<?php echo 'td'.$i;?>"><?php echo $c++;?></td>
                           <td class="<?php echo 'td'.$i;?>"><?php echo $sub_row['subject'];?></td>
                           <td class="<?php echo 'td'.$i;?>"><?php echo $row['score'];?></td>
                           <td class="<?php echo 'td'.$i;?>"><?php echo $row['total_ques'];?></td>
                           <td class="<?php echo 'td'.$i;?>"><?php echo $row['time_taken'];?></td>
                           <td><?php echo $row['date'];?></td>
                           <td><button><a id="delete" href="delete_result.php?result_id=<?php echo $row['id'];?>&stu_id=<?php echo $stu_id;?>">delete</a></button></td>
                        </tr>

                       <?php
                       $i++;
                   }
                } 
                else
                {
                    echo "<p style='color:red;'>Record Not Found ..!</p>";
                }
              
              ?>
             </table>
             
         </div>
         <script>
            function myFunction() {
            /*  var date=document.getElementById("myDate");
              alert(date);*/
            var input, filter,table,tr,td, i, textValue,flag;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table= document.getElementById("myTable");
            tr= table.getElementsByClassName("tr");
        
            for (i = 0; i < tr.length; i++) {
                td= table.getElementsByClassName("td"+i);
                textValue=td[1].textContent ||td[1].innerText;
                
                 if(filter=="")
                    {
                        alert(filter);
                         tr[i].style.display = ""; 
                    }
                    else
                    {
                        
                        if (textValue.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                        } 

                        else
                        {
                          tr[i].style.display = "none";  
                        }
                      
                    }
               

            }
         }
</script>
    </body>
</html>