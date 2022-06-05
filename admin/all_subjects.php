<?php 
session_start();
if(!isset($_SESSION['admin']))
{
     header("Location:index.php");
}
 include('../db_connection.php');
 $query="select * from subjects";
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
            .table_box{
                width:50%;
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
        </style>
   </head>
   <body>
       <div class="table_box">
            <a href="dashboard.php">back</a>
            <h3>Subjects</h3>
            <table>
                <tr>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>Total Qns.</th>
                    
                </tr>
                <?php
                   if($num > 0)
                   {
                       while($row=mysqli_fetch_assoc($result))
                       {
                        $subject=$row['subject'];
                         $query1="select id from subjects where subject='$subject'";
                         $result1=mysqli_query($con,$query1);
                         $row1=mysqli_fetch_assoc($result1);
                         $sub_id=$row1['id'];
                         $query2="select * from questions where sub_id=$sub_id";
                         $result2=mysqli_query($con,$query2);
                         $num=mysqli_num_rows($result2);


                          ?>
                            <tr>
                               <td><?php  echo $row['id'];?></td>
                               <td><?php  echo $row['subject'];?></td>
                               <td><?php  echo $num;?></td>
                               <td><button><a id="delete" href="delete_subject.php?sub_id=<?php echo $row['id'];?>">Remove</a></button></td>
                            </tr>
                          <?php 
                       }
                   }
                
                ?>

            </table>
       </div>
        
   </body>
</html>