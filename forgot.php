<?php
session_start();
include 'conn.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $number = md5(rand(00000,99999));
    
   if($stmt = $conn->query("UPDATE register set password ='".$number."' where email ='".$email."'"))
        {
        echo 'password is update';
        header('location:login.php?forgot');
        
        $body = '<table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#FFF; font:normal 13px Arial, Helvetica, sans-serif;line-height:25px; padding:10px">
                        <tr>
                        <td><strong>Dear '.$name.',</strong><br />
                        Welcome To My Website<br />
                        your password is recover... Your Password is '.$number.';
                        <br>
                         <a href="http://www.mywebsite.in" target="_blank">http://www.website.in</a> <br> <br /><div style=" width:400px; line-height:18px;color:#666">

                        Best Regards<br>

                        mywebsite.in

                        </div>
                        </td>
                        </tr>
                        </table>';    
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
<title>Untitled Document</title>
<link href="images/logo1.png" rel="shortcut icon" type="image/icon" />
</head>

<body>


<form method="post" enctype="multipart/form-data">
  <p>
   Enter Your Email Id
    <input type="email" name="email" />
    <input type="submit" name="submit" value="submit" />
  </p>
</form>
</body>
</html>
