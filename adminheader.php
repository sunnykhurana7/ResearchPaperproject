<?php  
 include 'conn.php';
 if(isset($_POST['submit'])){
       $username = $_POST['username'];
       $password = $_POST['password'];
       if($stmt=$conn->query("select * from admin where username ='".$username."' and password='".$password."'")){
           if($stmt->num_rows > 0){
              $_SESSION['adminname'] = $username;
               header('location:admincontent.php?admin');
           }
           else{
               echo header("location:adminheader.php?error");
           }
       }
       
 }
 ?>

<html>
<head>
<meta charset="utf-8">
<title>ADMIN PANEL</title>
  <link href="css/admin.css" type="text/css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <link href="images/logo1.png" rel="shortcut icon" type="image/icon" />
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<body>
 
    <div class="header">
       <div class="container">
             <a href="index.php" style="text-decoration:none;color: white;"><img src="images/logo1.png"></a>
       </div>
    </div><!-- End Header -->
     <?php
                if(isset($_GET['error']))
                {
                    echo '<span style=color:black;font-weight:bold;margin-left:90px;margin-top:20px;font-size:24px;>YOU ARE NOT A ADMINISTRATOR </span>';
                }
                
                ?>
    <div class="box">
      <div class="container">
         <img src="images/user.png" alt="No Image">
            <p>Admin Login</p>
             <form enctype="multipart/form-data" name="adminform" class="form1" method="post">
                <input type="text" name="username" placeholder="username">
                <input type="password" name="password"  placeholder = "password">
                <input type="submit" name="submit" value="LOGIN" class="button">
               
             </form>
             
             
             
             
      </div>
    </div><!-- End Box -->
    
  <div class="footer">
   <div class="container">
       &copy; Copyright 2016 - ResearchPaperCenter  
        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">DEVELOPER</a></span>
      </div>
   
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