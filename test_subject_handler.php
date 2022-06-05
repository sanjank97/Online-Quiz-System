<?php 
    session_start();
    include('db_connection.php');
     $error="";
     $no_ques="";
     if(isset($_SESSION['summery_id']))
     {
       header("Location:result_summery.php");
     }
    if(!isset($_SESSION["user"]))
    {
        header("Location:test_subject.php");
    }
      
    if(isset($_POST['subject']))
    {
        $subject=$_POST['subject'];
        $stu_id=$_POST['stu_id'];
        $_SESSION['subject']=$subject;
        $_SESSION['stu_id']=  $stu_id;
        $_SESSION['test_page']="testpage";
       
    }
    if(!isset($_POST['subject']) && !isset($_SESSION['subject']))
    {
        header("Location:test_subject.php"); 
    }
        $subject=$_SESSION['subject'];
        $stu_id=$_SESSION['stu_id'];
        $query="select * from subjects where subject='$subject'";
        $result=mysqli_query($con,$query);
        $num=mysqli_num_rows($result);
        $questionArray = array();
    if($num > 0)
    {
        $row=mysqli_fetch_assoc($result);
        $sub_id=$row['id'];
        $query="select id,ques,opa,opb,opc,opd from questions where sub_id=$sub_id";
        $result=mysqli_query($con,$query);
        $num=mysqli_num_rows($result);
        $no_ques=$num;
        $n=1;
        if($num > 0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                
                array_push($questionArray, $row);
                
            }
        }
        else
        {
            $error="Not Add Question Yet..!";
        }

    }
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <style>
             body{
                 margin-top:50px;
             }
             .main{
                width:50%;
                margin:0 auto;
                border: 1px solid #bbbaba;
                padding-left: 25px;
                padding-bottom: 25px;
                padding-top:10px;
                border-radius: 4px;
             }
             
             p input{
                margin-left: 10px;
                margin-right: 10px;
                font-size:10px;
             }
             #submit{

                padding: 7px 28px;
                margin-top:10px;
                border: 1px solid #bbbaba;
                border-radius: 3px;
             }
             #nxt,#prev{

                padding: 7px 28px;
                margin-top:20px;
                border: 1px solid #bbbaba;
                border-radius: 3px;
                
                }
              p:not(:first-child) span{
                  margin-left:10px;
              }  
              p:first-child{
                  font-weight:600;
              }
              .btn{
                  display:flex;

              }
              #nxt{
                  margin-left:20px;
              }
         
        </style>
        <script src="jquery.js"></script>
    </head>
    <body oncontextmenu="return false" >
       
        <div class="main">
            <span> Total Time :</span><span id="num_ques"><?php echo $no_ques; ?></span> <span> Minutes.</span>
      
     	    <span style="font-weight:600;">Time Start : <span style="color:red" id="ctime"></span></span>
           
            <div style="color:red; text-align:center; font-size:20px;">
            <?php if($error!="")
             {
               echo "$error";
               ?>
                 <form action="test_subject.php" method="post">
                      <input type="submit" value="Go Back" name="go_back">
                 </form>
               <?php
             }
            
             ?>
             </div>
             
                <div id="ques"></div>
                <div class="btn">
                    <button id="prev" onclick="previous()">Prev</button>  
                    <button id="nxt" onclick="nxt()">Next</button>
                </div>
                <button id="submit" onclick="final_submit()">submit</button>
             
             
       </div>
       <script>
                var time_taken="";
                var trigger_var=0;
				var date1 = new Date();
				var h1=date1.getHours();
				var m1=date1.getMinutes();
				var s1=date1.getSeconds();

				if(localStorage.getItem('stime')==null)
				{
				localStorage.setItem('stime',h1+":"+m1+":"+s1);
                }
               // document.getElementById('stime').innerHTML=localStorage.getItem('stime');
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
                time_taken=format(diffseconds); 
                var link= document.getElementById('submit');
                var total_time=document.getElementById('num_ques').innerHTML;
                   if(diffseconds / 60 > total_time)
                   {
                     trigger_var=1;
                     link.click();
                   }
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
            
           <script>
               $(document).ready(function(){
               $('#inst_head').click(function(){
                 $('#inst').slideToggle();
               });
              
                $(document).keydown(function(e){
                if(e.keyCode == 123){
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                    return false;
                }
                });
            });
        </script>
        <script>
                function myConfirm() {
                    var r = confirm("Are You Sure For Quit Quiz.? \n Either OK or Cancel.");
                    if (r == false) {
                 
                     window.location.href = "test_subject_handler.php";
                   }
                    else
                    {
                        window.localStorage.clear();  
                    }
             
                }
        </script>
        <script>
                var submit=document.getElementById('submit');
                submit.style.display="none"; 
                var prev=document.getElementById('prev');
                prev.style.display="none"; 
                var questions = <?php echo json_encode($questionArray)?>;
                var old_answers=new Array();
                var i=0;
                callQues(i); 
                function nxt()
                {
                
                    if(document.querySelector("input[name='ans"+(i+1)+"']:checked"))
                    {
                        var ans = document.querySelector("input[name='ans"+(i+1)+"']:checked").value;
                        old_answers[i]=ans;
                        localStorage.setItem("ans"+i, ans);
                      
                    } 
                    else
                    {
                        old_answers[i]="empty";  
                        localStorage.setItem("ans"+i,"empty");
                    }
                    i++;
                    callQues(i);  
                }
                function previous()
                {
                    if(document.querySelector("input[name='ans"+(i+1)+"']:checked"))
                    {
                        var ans = document.querySelector("input[name='ans"+(i+1)+"']:checked").value;
                        old_answers[i]=ans;
                        localStorage.setItem("ans"+i, ans);
                    } 
                    else
                    {
                        old_answers[i]="empty"; 
                        localStorage.setItem("ans"+i,"empty");
                    }
                    
                    i--;
                    callQues(i);  
                }
            
                function final_submit()
                {
                    
                   
                    if(document.querySelector("input[name='ans"+(i+1)+"']:checked"))
                    {
                        var ans = document.querySelector("input[name='ans"+(i+1)+"']:checked").value;
                        old_answers[i]=ans;
                        localStorage.setItem("ans"+i, ans);
                        
                    } 
                    else
                    {
                        old_answers[i]="empty"; 
                        localStorage.setItem("ans"+i,"empty");
                    }
                    if(trigger_var==0)
                    {
                        
                        myConfirm();
                    }
                    else
                    {
                        window.localStorage.clear();  
                    }
                    
                 alert(time_taken);
                    $.ajax({
                        type:"POST",
                        url:"welcome.php",
                        data:{ sub_id : '<?php echo $sub_id; ?>', stu_id: '<?php echo $stu_id;?>',user_ans:old_answers,total_ques:old_answers.length, time:time_taken},    
                        success: function (response) {
                                    var jsonObj = JSON.parse(response);
                                    
                                    $.ajax({
                                            type:"POST",
                                            url:"result_summery.php",
                                            data:{result_summery_id :jsonObj.last_id},    
                                            success: function (response) {
                                                       
                                                        window.location.href="result_summery.php";
                                                        }
                                                        
                                                
                                        });   
                            }
                    }); 
                 
                    
                 }
                        
                function callQues(i)
                {

                    if(i >0 )
                    {
                        prev.style.display="block";    
                    }
                    else
                    {
                        prev.style.display="none";    
                    }
                    if(i>= 0 && i<questions.length-1)
                    {
                        var nxt=document.getElementById('nxt');
                        nxt.style.display="block";
                    }
                    else
                    {
                        var nxt=document.getElementById('nxt');
                        nxt.style.display="none"; 
                    }
                    if(i==questions.length-1)
                    {
                        var submit=document.getElementById('submit');
                        submit.style.display="block"; 
                    }
                    else
                    {
                        var submit=document.getElementById('submit');
                        submit.style.display="none";  
                    }
                   
                    console.log('questions[i].ques: ', questions[i].ques)
                    document.getElementById('ques').innerHTML="<p><span>"+(i+1)+".</span><span id='Question'></span></p><p><span>a.</span><input type='radio'  value='a' name='ans"+(i+1)+"'><span id='opa'></span></p><p><span>b.</span><input type='radio'  value='b' name='ans"+(i+1)+"'><span id='opb'></span></p><p><span>c.</span><input type='radio'  value='c' name='ans"+(i+1)+"'><span id='opc'></span></p><p><span>d.</span><input type='radio'  value='d'  name='ans"+(i+1)+"'><span id='opd'></span></p>";
                    
                    document.getElementById('Question').textContent =" "+questions[i].ques;
                    document.getElementById('opa').textContent =" "+questions[i].opa;
                    document.getElementById('opb').textContent =" "+questions[i].opb;
                    document.getElementById('opc').textContent =" "+questions[i].opc;
                    document.getElementById('opd').textContent =" "+questions[i].opd;
                    var data=document.querySelector("input[name='ans"+(i+1)+"'][value='"+localStorage.getItem("ans"+i)+"']");
                    data.checked = true;
                    
                }
                
                console.log('questions', questions);
               
        </script>
     <script>
    
       
    </script>
   </body>    
 </html>   
