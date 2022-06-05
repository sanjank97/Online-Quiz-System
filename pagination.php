<?php 
  include("db_connection.php");

  $query="select * from questions where sub_id=1";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
  echo $num;
  $total_record=$num;
  $no_ques=1;
  $page=0;
  $offset=0;
  if(isset($_GET['page']))
  {
     echo $page=$_GET['page']+1;
     $offset =  $no_ques * $page ;
  }
  else
  {
     echo $page=0;
     $offset=0;
  }
   
  $query ="select * from questions LIMIT $offset , $no_ques";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
  
  echo $num;

  if($page>0)
  {
      ?>
       <a>next</a>
      <?php
  }
  else
  {
    ?>
    <a>prev</a>
    <?php
  }


?>
<html>
       <div id="stime"></div> 
     	 <div id="ctime"></div>
</html>
<script>
     
				var date1 = new Date();
				var h1=date1.getHours();
				var m1=date1.getMinutes();
				var s1=date1.getSeconds();

				if(localStorage.getItem('stime')==null)
				{
				localStorage.setItem('stime',h1+":"+m1+":"+s1);
                }
                document.getElementById('stime').innerHTML=localStorage.getItem('stime');
				var startTime=localStorage.getItem('stime');
				var splitTime=startTime.split(":");
				var oldseconds= diffTime(splitTime[0],splitTime[1],splitTime[2]);  
				function showTime()
				{
				var date = new Date();
				var h=date.getHours();
				var m=date.getMinutes();
				var s=date.getSeconds();
				var curseconds= diffTime(h,m,s);  
				var diffseconds=curseconds - oldseconds;
				document.getElementById('ctime').innerHTML=format(diffseconds);
				setTimeout(showTime,1000);
				}
				showTime();
				function diffTime(hour,min,sec)
				{
				var seconds = hour * 3600 + (min * 60) + (sec*1);
				return seconds;
				}
				function format(time) {   
				// Hours, minutes and seconds
				var hrs = ~~(time / 3600);
				var mins = ~~((time % 3600) / 60);
				var secs = ~~time % 60;

				// Output like "1:01" or "4:03:59" or "123:03:59"
				var ret = "";
				if (hrs > 0) {
				ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
				}
				ret += "" + mins + ":" + (secs < 10 ? "0" : "");
				ret += "" + secs;
				return ret;
				}

		</script>	
