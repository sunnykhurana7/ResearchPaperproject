<?php
 include 'conn.php';
if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
        
    if($s1 = $conn->prepare("insert into  contact set name = ?,email =?,subject = ?,message =?")){
        $s1->bind_param('ssss',$name,$email,$subject,$message);
        $s1->execute();
        if($s1->affected_rows == 1){
            header('location:developer.php?contact');
        }
        else{
           echo 'not contact'; 
        }
    }
}
    ?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DEVELOPER PAGE</title>
  <link href="css/developer.css" type="text/css" rel="stylesheet">
  <link href="images/logo1.png" rel="shortcut icon" type="image/icon" />
</head>

<body>
 
    <div class="header">
       <div class="container">
     <a href="index.php" style="text-decoration:none;color: white;"><img src="images/logo1.png"></a> 
       </div>
    </div><!-- End Header -->
    
    <div class="message" style="font:24px   ;">
      <div class="container">
      <?php
        if(isset($_GET['contact'])){
            
            echo '<span style=color:black;font-size:18px;text-transform:uppercase;margin-top:40px;font-weight:bold;>Thank You For Contact us...</span>'; 
            echo '<span style=color:black;font-size:18px;text-transform:uppercase;margin-top:40px;font-weight:bold;>we come back to you shortly..</span>';        
        } 
    ?>
    </div>
   </div> 
    <div class="box">
      <div class="container">
         <div class="contact">
            <div class="con">
              feel free to call me or contact me
                <div class="number">+91-9871727979</div>
                <div class="gmail" style="color: black;">researchpapercenter@gmail.com</div>    
                </div>
                   <form method="post" action="#" name="form1" enctype="multipart/form-data">
                      <input type="text" name="name" placeholder="NAME" required="required"><br>
                      <input type="text" name="email" placeholder="EMAIL" required="required"><br>
                      <input type="text" name="subject" placeholder="SUBJECT" required="required"><br>
                      <textarea placeholder="MESSAGE" name="message" required="required"></textarea><br><br><br>
                      <input type="submit" name="submit" value="Contact" style="">
                   </form>
            </div>
         </div>    
         <div class="information">
           <span>hello</span><br>
                   <div class="name">I am Sunny Khurana</div>
                  <p style="text-transform: capitalize;">I Am Graduate In Bca.. i am pursuing mca from jagan institute of management studies... I have little bit knowledge on different technologies like c , c++ , photoshop , php ,bootstrap, java n dreamweaver....
                  <br>
                  LiveWebsites:-<br>
                 <a href="http://www.issacitlabs.com/" style="text-decoration: none;color: #ea604b" target="_blank">1.www.IssacItLabs.com</a><br>
                 <a href="http://www.Solutions4you.in" style="text-decoration: none;color:#ea604b;" target="_blank">2.www.solutions4you.in</a><br>
                 <a href="http://www.ResearchPaperCenter.in" style="text-decoration: none;color:#ea604b;" target="_blank">3.www.ResearchPaperCenter.com</a><br>
                <a href="http://www.harshitwedspreeti.in" style="text-decoration: none;color:#ea604b;" target="_blank">4.www.harshitwedspreeti.in</a><br>
                

                  </p><br>
                  
           
         </div>
      </div>
       <img src="images/sunny.jpg" style="width:300px;height:300px;border-radius:50%;margin-left:860px;
    margin-top: -104px;border:4px solid #ea604b;">
    </div><!-- End Box -->
    
     <div class="footer">
   <div class="container">
       &copy; Copyright 2016 - ResearchPaperCenter  
        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">DEVELOPER</a></span>
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
