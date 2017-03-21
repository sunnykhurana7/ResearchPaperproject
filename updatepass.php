<?php
 include 'conn.php';
 
if(isset($_POST['submit'])){
    
    $old = md5($_POST['oldpass']);
    $new = md5($_POST['newpass']);
    $userid = $_SESSION['username'];
    //echo "SELECT * FROM register WHERE username ='".$userid."' and password ='".$old."'";exit;
     
        if($stmt=$conn->query("SELECT * FROM register WHERE username ='".$userid."' and password= '".$old."'")){
            if($stmt->num_rows>0){
                if($st = $conn->query("UPDATE register SET password='".$new."' WHERE username='".$userid."'")){
                    echo header('location:login.php?update');
                    session_destroy();
                }
            }
        
    }
    else
    {
        echo header('location:updatepass.php?error');
    }
}


if(!isset($_SESSION['username'])){
    header('location:index.php');
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FORGET PASSWORD</title>
  <link href="css/updatepaas.css" type="text/css" rel="stylesheet" />
</head>

<body>
  
       <div class="header">
       <div class="container">
                 <a href="index.php" style="text-decoration:none;color: white;"><img src="images/logo1.png"></a> 
        <div class="anchor">
        <a href="view.php">view</a> 
         <a href="upload.php">upload</a>
        <a href="updatepass.php">update password</a> 
         <a href="logout.php">logout</a>
         </div><!-- End Anchor -->
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
       
      <div class="message"> 
        <div class="container">
          <?php  
          
                if(isset($_GET['update'])){
                    echo '<span style=color:red;text-align:center;>PASSWORD IS UPDATED SUCCESSFULLY</span>';
                }         
          
           ?>
            
        </div>
      </div> 
       
       
       
       <div class="box1">
     <div class="container">
        <div class="up">
          <span>UPDATE YOUR PASSWORD</span>
            <form method="post" enctype="multipart/form-data" class="form2">
             <input type="password" placeholder="ENTER OLD PASSWORD" name="oldpass" class="old"/>
             <input type="password" placeholder="ENTER NEW PASSWORD" name="newpass" />
                          <input type="submit" name="submit" value="update">
            </form><!-- End Form -->
        </div><!-- End Up  -->
     </div>
     </div> 
     
     <a href="#" id="backToTop" class="backToTop"><img src="images/scroll1.png" /></a>
  <div class="footer">
   <div class="container">
       &copy; Copyright 2016 - ResearchPaperCenter  
        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">DEVELOPER</a></span>
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
