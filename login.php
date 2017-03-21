<?php
  include 'conn.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $password1 = $_POST['password'];
    $check = $_POST['check'];
   
    if($check!=""){
         setcookie('user_name',$username);
         setcookie('user_password',$password1);
       
    }
  
    if($stmt=$conn->query("SELECT * from register where username ='".$username."' and password = '".$password."'")){
        if($stmt->num_rows>0){
            $_SESSION['username'] = $username;
            header('location:index.php');
        }
        else
        {
            header('location:login.php?error');
        }
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
         $('#cbshowpassword').click(function (){
             $('#txtpassword').attr('type',$(this).is(':checked')?'text':'password');
         }); 
         
         $('#txtpassword').keypress(function(e) { 
         var s = String.fromCharCode( e.which );
          if(s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
           alert('caps is on please caps off');
    }
});
      });
    </script>
<title> NEW REGISTRATION </title>
  <link href="css/login.css" type="text/css" rel="stylesheet">
</head>

<body>
 <div class="header">
       <div class="container">
           <a href="index.php" style="text-decoration:none;color: white;"><img src="images/logo1.png"></a> 
       </div>
    </div><!-- End Header -->
    
    
    <div class="message">
      <div class="container">
      
      
          <?php   
            
            
              if(isset($_GET['inserted'])){
                                  echo '<span style=color:black;font-size:18px;margin-top:20px;font-weight:bold;text-transform:uppercase;>YOU HAVE A SUCCESSFULL REGISTER!!</span>';
              }
              else
               if(isset($_GET['update'])){
                   //echo '<span>Password Is Updated.. Please Login</span>';
                    echo '<span style=color:red;text-align:center;font-weight:bold;>PASSWORD IS UPDATED SUCCESSFULLY.. PLEASE LOGIN</span>';
               }
               else
                 if(isset($_GET['forgot'])){
                      echo '<span style=color:red;text-align:center;font-weight:bold;>PASSWORD IS RECOVER SUCCESSFULLY.. PLEASE LOGIN</span>';
                 }
          ?>
          
      </div>
    </div>
 
  <div class="box1">
     <div class="container">
       <div class="header1">
         <span style="color:white;font-size: 18px;text-transform: none;"><a href="index.php" style="text-decoration: none;color: white;">ResearchPaperCenter</a></span>
        </div><!-- End Header --> 
       <div class="title1">
        Enter Your Details
       </div>
         <?php
          if(isset($_GET['error'])){
                echo '<span style=color:white;font-size:12px;margin-top:20px;font-weight:bold;>Your email or password is incorect..</span>';
            }
         ?>
            
       <form method="post" enctype="multipart/form-data" class="form2">
         <input type="text" name="username" placeholder="username" value="<?php if(isset($_COOKIE['user_name'])){echo $_COOKIE['user_name'];}?>" required ="required"> 
         <input type="password" name="password" id ="txtpassword" placeholder="password" class="uname" value="<?php if(isset($_COOKIE['user_password'])) { echo $_COOKIE['user_password'];}?>" required ="required">
            <!-- <input type="checkbox" id="cbshowpassword"><span class="show">Show Password</span>  --> 
       <div class="fp">
         <a href="reset.php">Forgot Password?</a>
       </div><!-- End fp -->
       <div class="sign">
        
         <label>
            <input type="checkbox" name="check" value="check">Stay Signed In<br>
         </label>
         <input type="submit" name="login" value="LoginNow" class="button">
         
         </form>
         
       </div><!-- End Sign -->
        
     </div>
  </div><!-- End Box1 -->
 <div class="footer">
   <div class="container">
       &copy; Copyright 2016 - ResearchPaperCenter  
        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">DEVELOPER</a></span>
      </div>
   
 </div>
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
