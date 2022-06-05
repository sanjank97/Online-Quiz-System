<?php 
 session_start();
 if(!isset($_SESSION['admin']))
 {
      header("Location:index.php");
 }
 include('../db_connection.php');
 $query="select * from user_record";
 $result=mysqli_query($con,$query);
 $num=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
   <head>
        <title>Subjects</title>
        <style>
            body{
                padding-top:30px;
            }
            #myInput {
               
                width: 30%;
                font-size: 16px;
                padding: 10px;
                border: 1px solid #bbbaba;
                margin-top: 12px;
                margin-bottom: -12px;
                border-radius:3px;
                }
            input:focus{
                outline:none;
            }  
            .table_box{
                width:65%;
                margin:0 auto;
                border: 1px solid #bbbaba;
                padding:20px;
                border-radius: 4px;
                
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
              text-decoration:none;
              color:red;
            }    
            #view{
              text-decoration:none;
              color:#258bd6;
            } 
            .act{
                text-align:right;
                margin-bottom:10px;
                margin-left:20px;
            }
            h3{
                margin:0px;
                margin-top:10px;
                
            }
        </style>
   </head>
   <body>
       <div class="table_box">
            <a href="dashboard.php">back</a>
            <h3>Subjects</h3>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here.." title="Type in a name">
            <div class="act">Activation :: 
                   <button> <a style='color:red; text-decoration:none' href="check_all_activation.php?status=0">OFF</a></button>
                   <button> <a style='color:green; text-decoration:none' href="check_all_activation.php?status=1">ON</a></button>
                </div>
            <table id="myTable">
                <tr>
                    <th>Stu ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Id</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Post</th>
                    <th>Remove</th>
                    <th>View More</th>
                    <th>Status</th>
                </tr>
                <?php
                   if($num > 0)
                   {
                       $i=0;
                       while($row=mysqli_fetch_assoc($result))
                       {
                          ?>
                            <tr class="tr">
                               <td class="<?php echo 'td'.$i;?>"><?php  echo $row['id'];?></td>
                               <td class="<?php echo 'td'.$i;?>"><?php  echo $row['fname'];?></td>
                               <td class="<?php echo 'td'.$i;?>"><?php  echo $row['lname'];?></td>
                               <td class="<?php echo 'td'.$i;?>"><?php  echo $row['email'];?></td>
                               <td class="<?php echo 'td'.$i;?>"><?php  echo $row['password'];?></td>
                               <td class="<?php echo 'td'.$i;?>"><?php  echo $row['phone'];?></td>
                               <td class="<?php echo 'td'.$i;?>"><?php  echo $row['user_post'];?></td>
                               <td ><button><a id="delete" href="delete_student.php?stu_id=<?php echo $row['id'];?>">Remove</a></button></td>
                               <td style="width:100px;"><button><a id="view" href="user_details.php?stu_id=<?php echo $row['id'];?>">View More</a></button></td>
                               <td class="<?php echo 'td'.$i;?>"><?php if($row['status']==1)
                                          {
                                              ?>
                                                <a style='color:green; text-decoration:none' href='activate.php?id=<?php echo $row['id'];?>'>Active</a>
                                              <?php
                                         }
                                          else
                                          {
                                              ?>
                                                 <a style='color:red; text-decoration:none' href='activate.php?id=<?php echo $row['id'];?>'>Deactive</a>
                                              <?php
                                           }
                                       ?>
                                </td>
                            </tr>
                          <?php 
                          $i++;
                       }
                   }
                
                ?>

            </table>
       </div>
       <script>
            function myFunction() {
            var input, filter,table,tr,td, i,j, textValue,flag;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table= document.getElementById("myTable");
            tr = table.getElementsByClassName("tr");
            for (i = 0; i < tr.length; i++) {
                td= table.getElementsByClassName("td"+i);
                flag=0;
                for(j=0;j<td.length;j++)
                {
                    textValue=td[j].textContent ||td[j].innerText;
                    if(filter=="")
                    {
                        flag=1;   
                    }
                    else
                    {
                        if(isNaN(filter))
                        {
                            if (textValue.toUpperCase().indexOf(filter) > -1) {
                                flag=1;
                            } 
                        }
                        else
                        {
                            if(textValue==filter)
                            {
                                flag=1;
                            }
                        } 
                    }
                }
                if(flag==1)
                {
                    tr[i].style.display = "";
                }
                else
                {
                    tr[i].style.display = "none";
                }

            }
         }
</script>
   </body>
</html>