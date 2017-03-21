<?php
    include 'conn.php';
    if(isset($_POST['submit'])){
        //echo 1;exit;
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $chcode = $_POST['code'];
        $code = 123456;

       // if($chcode!=$code){
            //echo 'a';exit;
       //     header('location:reg.php?codeerror');
       // }  
          
            if($stmt=$conn->query("SELECT email from register where email ='".$_POST['email']."'")){
                if($stmt->num_rows>0){
                    //echo 'b';exit;
                    header('location:reg.php?email');
                }
                else
                {
                    if($stmt1=$conn->query("SELECT username from register where username ='".$_POST['username']."'")){
                        if($stmt1->num_rows>0){
                            //echo 'b';exit;
                            header('location:reg.php?name');
                        }
                        else {
                             //echo 'c';exit;
                            if($stmt2 = $conn->prepare("INSERT into register set name =?,username=?,password=?,email=?,code=?")){
                                $stmt2->bind_param('ssssi',$name,$username,$password,$email,$code);
                                $stmt2->execute();
                                if($stmt2->affected_rows==1){
                                    header('location:login.php?inserted');
                                }
                                else
                                {
                                    echo 'not inserted';
                                }
                            }
                        }
                    }  

                }




            }
        }
    
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Registeration</title>
        <link href="css/reg.css" type="text/css" rel="stylesheet" />
        <link href="images/logo1.png" rel="shortcut icon" type="image/icon" />
        <script src="js/jquery.js"></script>
        <script language="javascript">
            function valform()
            {
                var testName =/^([a-z]|[A-Z]| )*$/;
                var numericExpression = /^[0-9]+$/;
                var validate_char= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                if (document.form22.name.value=="")
                {
                    document.getElementById("name").style.borderColor = "#E34234";
                    document.getElementById("em").innerHTML = "Enter Your Username";
                    document.form1.email.focus();
                    return false;
                }

                else
                return true;
            }
        </script>

    </head>

    <body>
        <div class="header">
            <div class="container">
                <a href="index.php" style="text-decoration:none;color: white;"><img src="images/logo1.png"></a> 
            </div>
        </div><!-- End Header -->

        <div class="contennt">
            <div class="container">
                <?php
                    if(isset($_GET['inserted'])){
                        echo '<span style=color:black;font-size:20px;margin-left:40px;background:red;margin-top:10px;float:left;>You have Registered!!</span>';
                    }
                    else
                    if(isset($_GET['error']))
                    {
                        echo '<span style=color:white;margin-left:90px;font-size:14px;width:250px;>You have Entered wrong information!!</span>';
                    }
                    else
                    if(isset($_GET['email'])){
                        echo '<span style=color:black;font-size:20px;margin-left:40px;background:red;margin-top:10px;float:left;width:250px;>This Email Is Already Exist...</span>'; 
                    }
                    else
                    if(isset($_GET['codeerror'])){
                        echo '<span style=color:black;font-size:20px;margin-left:40px;background:red;margin-top:10px;float:left;width:350px;>Please enter a valid code...</span>';
                    }
                    else
                    if(isset($_GET['name'])){
                        echo '<span style=color:black;font-size:20px;margin-left:40px;background:red;margin-top:10px;float:left;width:600px;>This Username is already exist... please choose another username...</span>';
                    }

                ?>

            </div>
        </div>
        <div class="box1">
            <div class="container">
                <div class="header1">
                    <span><span style="color:white;font-size: 18px;text-transform: none;"><a href="index.php" style="text-decoration: none;color: white;">ResearchPaperCenter</a></span></span>
                </div><!-- End Header --> 
                <div class="title1">
                    New Registeration
                </div>
                <form method="post" enctype="multipart/form-data" class="form2" name="form22" onSubmit="return valform();">
                    <input type="text" name="name" placeholder="Name" class="uname" required ="required" id="name">
                    <input type="text" name="username" placeholder="Username" class="uname" required ="required">
                    <input type="password" name="password" placeholder="Password" class="uname" required ="required">
                    <input type="email" name="email" placeholder="E-mail" class="uname" required ="required">
                <!--    <input type="password" name="code" placeholder="Institute Code" class="uname" required ="required"> --->



                    <input type="submit" name="submit" value="create an account">

                    <a href="login.php" class="alr">Already Registered</a>
                </form>

            </div>



        </div><!-- End Box1 -->
        <div class="footer">
            <div class="container">
                &copy; Copyright 2015 -- SK TECHNOLOGY &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">Creater:-Sunny</a></span>
            </div>
        </div><!-- End Footer-->
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3bNxMgqe9yblFYUdDXScuojANerxFYzv";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->

    </body>
</html>
