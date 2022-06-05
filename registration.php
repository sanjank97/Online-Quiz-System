<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exam Portal</title>
        <style>
           body{
               padding-top:30px;
           }
           .main{
                width:30%;
                margin:0 auto;
                border: 1px solid #bbbaba;
                padding-left: 20px;
                padding-bottom: 20px;
                border-radius: 4px;
           }
           
            form div{
                margin-top:17px;}
            .fname input{
                padding: 8px;
                margin-left: 25px;
                width: 60%;
                border: 1px solid #bbbaba;
                border-radius:3px;

            }
            #fname_err, #lname_err, #email_err, #pass_err, #repass_err
            , #phone_err, #user_post_err{
                margin-left: 110px;
                margin-top:2px;
                font-size:14px;
                color:red;
            }
            .lname input{
                padding: 8px;
                margin-left: 27px;
                width: 60%;
                border: 1px solid #bbbaba;
                border-radius:3px;
            }
            .email input{
                padding: 8px;
                margin-left: 42px;
                width: 60%;
                border: 1px solid #bbbaba;
                border-radius:3px;}
            .password input{
                padding: 8px;
                margin-left: 37px;
                width: 60%;
                border: 1px solid #bbbaba;
                border-radius:3px;
            }
            .re-password input{
                padding: 8px;
                margin-left: 15px;
                width: 60%;
                border: 1px solid #bbbaba;
                border-radius:3px;
            }
            .phone input{
                padding: 8px;
                margin-left: 32px;
                width: 60%;
                border: 1px solid #bbbaba;
                border-radius:3px;
            }
            .post_app select{
                margin-left:10px;
                padding: 8px;
                height:70px;
                width:60%;
                border: 1px solid #bbbaba;
                border-radius:3px;
            }
            .submit input{
                padding: 8px 28px;
                border: 1px solid #bbbaba;
                border-radius:3px;
            }
           
        </style>
    </head>
    <body>
        <div class="main">
              <?php 
                 if(isset($_SESSION['status']))
                 {
                     ?>
                     <p style="color:green">You have registered successfully..!</p>
                     <?php
                     unset($_SESSION['status']);
                 }
                 if(isset($_SESSION['error']))
                 {
                    ?>
                     <p style="color:red">Error :: This Email Id already Exist.</p>
                     <?php
                     unset($_SESSION['error']);  
                 }
              ?>
              <form action="user_registration.php" method="post" onsubmit="return validateForm()" >
                    <h2>Sign Up</h2>
                    <div class="fname">
                        <label>First Name :</label>
                        <input type="text" name="fname" placeholder="First Name" id="fname" onblur="return fnameValidate()" >
                    </div>
                    <span id="fname_err"></span>

                    <div class="lname">
                        <label>Last Name :</label>
                        <input type="text" name="lname" placeholder="Last Name" id="lname" onblur="return lnameValidate()">
                    </div>
                    <span id="lname_err"></span>
                    <div class="email">
                        <label> Email Id :</label>
                        <input type="text" name="email" placeholder="Email Id" id="email" onblur="return emailValidate()">
                    </div>
                    <span id="email_err"></span>
                    <div class="password">
                        <label> Password :</label>
                        <input type="password" name="password" placeholder="Password" id='pass' onblur="return passwordValidate()">
                    </div>
                    <span id="pass_err"></span>
                    <div class="re-password">
                        <label> Re-Password :</label>
                        <input type="password" name="re_password" placeholder="Re-password" id='repass' onblur="return repassValidate()" >
                    </div>
                    <span id="repass_err"></span>
                    <div class="phone">
                        <label>Phone No. :</label>
                        <input type="text" name="phone" placeholder="Phone No." id="phone" onblur="return phoneValidate()">
                    </div>
                    <span id="phone_err"></span>
                    <div class="post_app">
                         <label>Post-Application :</label>
                         <select name="user_post[]" id="user_post" multiple onblur="return postValidate()">
                             <option>PHP Developer</option>
                             <option>React Developer</option>
                             <option>Angular Developer</option>
                             <option>Wordpress Developer</option>
                         </select>
                    </div>
                    <span id="user_post_err"></span>
                    <div class="submit">
                        <input type="submit" value="submit">
                        <span style="margin-left:20px;">Already have Account ?<a  href="index.php">Login</a></span>
                    </div>
                </form>
            </div>
            <script>
                  function fnameValidate()
                  {
                    var x =document.getElementById('fname');
                    var fname=document.getElementById('fname').value;
                    var regex = /^[A-Za-z]+$/;
                      if(fname=="")
                      {
                        document.getElementById('fname_err').innerHTML="The First Name field is required.";  
                        return false;
                      }
                      else if(fname.length<3)
                      {
                        document.getElementById('fname_err').innerHTML="please enter name of length atleast 3.";
                        return false;
                      }
                      else if(regex.test(fname)==false)
                      {
                        document.getElementById('fname_err').innerHTML="Please Enter Only alphabet space not allowed.";  
                        return false;
                      }
                      else
                      {
                        x.value=fname.replace(/\b\w/g, l => l.toUpperCase());  
                        document.getElementById('fname_err').innerHTML="";  
                        return true;
                      }
                  }
                  function lnameValidate()
                  {
                    var x =document.getElementById('lname');
                    var lname=document.getElementById('lname').value;
                    var regex = /^[A-Za-z]+$/;
                      if(lname=="")
                      {
                        document.getElementById('lname_err').innerHTML="The Last Name field is required.";  
                        return false;
                      }
                      else if(lname.length<3)
                      {
                        document.getElementById('lname_err').innerHTML="please enter name of length atleast 3.";
                        return false;
                      }
                      else if(regex.test(lname)==false)
                      {
                        document.getElementById('lname_err').innerHTML="Please Enter Only alphabet space not allowed.";  
                        return false;
                      }
                      else
                      {
                        x.value=lname.replace(/\b\w/g, l => l.toUpperCase()); 
                        document.getElementById('lname_err').innerHTML="";  
                        return true;
                      }
                  }
                  function emailValidate()
                  {
                    var email=document.getElementById('email').value;
                    var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                      if(email=="")
                      {
                        document.getElementById('email_err').innerHTML="The Email Id field is required.";  
                        return false;
                      }
                      else if(regex.test(email)==false)
                      {
                        document.getElementById('email_err').innerHTML="Please Enter Valid Email Id.";  
                        return false;
                      }
                      else
                      {
                        document.getElementById('email_err').innerHTML="";  
                        return true;
                      }
                  }
                  function passwordValidate()
                  {
                    var pass=document.getElementById('pass').value;
                      if(pass=="")
                      {
                        document.getElementById('pass_err').innerHTML="The Password field is required.";  
                        return false;
                      }
                      else if(pass.length<6)
                      {
                        document.getElementById('pass_err').innerHTML="please enter password of length atleast 6.";
                        return false;
                      }
                      else
                      {
                        document.getElementById('pass_err').innerHTML="";  
                        return true;
                      }
                  }
                  function repassValidate()
                  {
                    var pass=document.getElementById('pass').value;
                    var repass=document.getElementById('repass').value;
                    if(repass=="")
                      {
                        document.getElementById('repass_err').innerHTML="The repassword field is required.";  
                        return false;
                      }
                      else if(repass.length<6)
                      {
                        document.getElementById('repass_err').innerHTML="please enter repassword of length atleast 6.";
                        return false;
                      }
                      else if(repass != pass)
                      {
                        document.getElementById('repass_err').innerHTML="Password mis-matched try again.";
                        return false;
                      }
                      else
                      {
                        document.getElementById('repass_err').innerHTML="";  
                        return true;
                      }

                  }
                  function phoneValidate()
                  {
                    var phone=document.getElementById('phone').value;
                    var regex =/^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/;
                      if(phone=="")
                      {
                        document.getElementById('phone_err').innerHTML="The Phone field is required.";  
                        return false;
                      }
                      else if(regex.test(phone)==false)
                      {
                        document.getElementById('phone_err').innerHTML="Please Enter Valid phone number.";  
                        return false;
                      }
                      else
                      {
                        document.getElementById('phone_err').innerHTML="";  
                        return true;
                      }
                  }
                  function postValidate()
                  {
                      var user_post=document.getElementById('user_post').value;
                      if(user_post=="")
                      {
                         document.getElementById('user_post_err').innerHTML="The User Post field is required";
                          return false;
                      }
                      else
                      {
                          document.getElementById('user_post_err').innerHTML="";
                          return true;
                      }
                  }
                 
                  function validateForm()
                  {
                    var fname_validation= fnameValidate(); 
                    var lname_validation= lnameValidate(); 
                    var email_validation= emailValidate(); 
                    var password_validation= passwordValidate(); 
                    var repass_validation= repassValidate(); 
                    var phone_validation= phoneValidate();
                    var post_validation= postValidate();
                    if(fname_validation==false ||lname_validation==false ||email_validation==false ||password_validation==false
                    ||repass_validation==false ||post_validation==false)
                    {
                        return false;
                    }
                  }


            </script>
    </body>
</html>