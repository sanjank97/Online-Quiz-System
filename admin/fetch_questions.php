<?php
     session_start();
     if(!isset($_SESSION['admin']))
     {
          header("Location:index.php");
     }
     include('../db_connection.php');
     $sub_id=$_GET['sub_id'];
     $query="select * from questions where sub_id=$sub_id";
     $result=mysqli_query($con,$query);
     $num=mysqli_num_rows($result);
     ?>
      <!DOCTYPE html>
      <html>
          <head>
               <title>View Questions</title>
               <style>
                  body{
                      padding-top:30px;
                  }
                  .table-box{
                        width:80%;
                        margin:0 auto;
                        border: 1px solid #bbbaba;
                        padding:20px;
                        border-radius: 4px;
                        height:500px;
                        overflow:auto;

                  }
                  table {
                        border-collapse: collapse;
                        width: 80%;
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
                    #edit{
                       color:#0887f7; 
                    }    
               </style>
          </head>
          <body>
              <div class="table-box">
               <a href="dashboard.php">back</a>
               <h3> View Questions and We can also modify it.</h3>
                <table>
                        <tr>
                            <th>Question</th>
                            <th>Option a</th>
                            <th>Option b</th>
                            <th>Option c</th>
                            <th>Option d</th>
                            <th>Answer</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
           



     <?php
     if($num > 0)
     {
         
         while($row=mysqli_fetch_assoc($result))
         {
             
             ?>
               <tr>
               <tr>
                  <td><?php  echo htmlspecialchars($row['ques']);  ?></td>
                  <td><?php  echo htmlspecialchars($row['opa']); ?></td>
                  <td><?php  echo htmlspecialchars($row['opb']);?></td>
                  <td><?php  echo htmlspecialchars($row['opc']); ?></td>
                  <td><?php  echo htmlspecialchars($row['opd']);  ?></td>
                  <td><?php  echo $row['opcorrect']; ?></td>
                  <td><button><a id='edit' href="edit_question.php?qid=<?php echo $row['id']; ?>">edit</a></button></td>
                  <td><button><a id="delete" href="delete_question.php?qid=<?php echo $row['id']; ?>&sub_id=<?php echo $row['sub_id'];?>">delete</a></button></td>
               </tr>
               </tr>
         
             <?php
         }
     }
  

?>

                </table>
        </div>
    </body>
</html>