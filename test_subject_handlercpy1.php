
<?php 
session_start();
include('db_connection.php');
$subject=$_POST['subject'];
$query="select * from subjects where subject='".$_SESSION['subject']."'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
$questionArray = array();
if($num > 0)
{
    $row=mysqli_fetch_assoc($result);
    $sub_id=$row['id'];
    $query="select * from questions where sub_id=$sub_id";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    $n=1;
    if($num > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
           // array_push($questionArray, $row);
           echo $row['ques'];
        }
    }
  
}

?>
