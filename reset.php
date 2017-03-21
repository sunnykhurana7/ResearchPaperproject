<?php
session_start();
include 'conn.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
      if($email==""){
          echo 'please enter email';
      }
    $number = rand(00000,99999);
    $insertNumber = md5($number);
    
    
   if($stmt = $conn->query("UPDATE register set password ='".$insertNumber."' where email ='".$email."'"))
        {
        
        header('location:login.php?forgot');
        $body = '
                        <tr>
                        <td><strong>Dear '.$name.',</strong><br />
                        Welcome To My Website<br />
                        your password is recover... Your Password is '.$number.';
                        <br>
                         
                        </div>
                        </td>
                        </tr>
                        </table>';    
         }
         
                        else{
                            header('location:xyz.php');
                        
                        }
                        include('include/class.phpmailer.php');
                        $mail = new PHPMailer();
                        $mail->AddReplyTo('sunnykhurana777.sk@gmail.com','sunny');//
                        $mail->SetFrom('sunnykhurana777.sk@gmail.com','sunny');
                        $mail->AddAddress($email,$name);
                        $mail->Subject= "Password Is Recover";
                        $mail->MsgHTML($body);
                        if(!$mail->Send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }
    }
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FORGET PASSWORD</title>
  <link href="css/reset.css" type="text/css" rel="stylesheet" />
  <!--Start of Zopim Live Chat Script-->
  <!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?3aQy2A8m2ekw24ZymGZ8fYHCNxOQkOr2';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

  </head>

<body>
  
       <div class="header">
       <div class="container" style="padding-top: 25px;padding-bottom: 25px;">
      <a href="index.php" style="text-decoration:none;color: white;margin-top: 15px;"><img src="images/logo1.png"></a> 
       </div>
    </div><!-- End Header -->
       
       <!--<div class="welcome">
         Welcome jims
       </div>-->
      <!-- <div class="nav">
         <ul>
            <li><a href="#">Home</a><img src="images/icon.png" alt "No icon" />
              <ul>
                 <li><a href="#">update password</li>
                 <li><a href="#">update password</li>
                 <li></li>
              </ul> End ul 
            </li>
         </ul> End ul 
      </div> End Nav -->
       
       <div class="box1">
     <div class="container">
        <div class="up">
          <p>RECOVER PASSWORD </p>
          <p><span class="msg">please enter your email address and  submit to receive  </span></p>
          <p><span class="msg">a code so that you recover your password... </span></p>
            <form method="post" action="" enctype="multipart/form-data">
              <input type="email" placeholder="Enter Your E-mail Address"  name="email" required="required  "/>
              <p><input type="submit" name="submit" value="submit" class="button"/></p>
            </form>
            <a href="login.php" class="login">Back To Login  </a>
        </div><!-- End Up  -->
     </div>
     </div> 
     <?php  echo $number; ?>
  <div class="footer">
   <div class="container">
       &copy; Copyright 2016 - ResearchPaperCenter  
        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">DEVELOPER</a></span>
      </div>
   
 </div>
 
 <script src="js/jquery.introLoader.js"></script>
 <script src="js/jquery.introLoader.min.js"></script>
 <script src="jquery.easing.1.3.js"></script>
 <!-- Progressbar -->
          <script src="js/jquery.easing.1.3.js"></script>
        
          <script src="js/jquery.introLoader.js"></script>
          <script src="js/jquery.introLoader.min.js"></script>
        
              
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
