<?php
include 'conn.php';
if(!isset($_SESSION['username'])){
    header('location:index.php');
}


?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RESEARCH PAPERS'S</title>
  <link href="css/view.css" type="text/css" rel="stylesheet" />
  <link href="images/logo1.png" rel="shortcut icon" type="image/icon" />
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
       
  <div class="box">
      <div class="container">
        <span>research papers</span>
        <p>published by  <?php echo $_SESSION['username'];  ?></p>
      </div>
  </div> <!-- End Box -->   
  
  
  
  
 // <?php          
   /* if(!isset($_SESSION['userid'])){
       echo '<span style=color:black;text-transform:uppercase;font-size:20px;>NO RESEARCH PAPER PUBLISHED BY YOU</span>   ';
    }*/
  ?>
  
  <?php
  
       
      if($stmt = $conn->query("SELECT * from register r RIGHT JOIN upload u on r.username=u.userid where userid='".$_SESSION['username']."'")){
          while($r = $stmt->fetch_array(MYSQLI_ASSOC)){ ?>
          <div class="content">
     <div class="container">
        <ul class="papers">
          <span><?php  echo $r['title']; ?></span>
            <div class="abs">Abstract:</div>
            <p><?php echo substr($r['abstract'],0,20);  ?> </p>
           <div class="refer">
            references:-  <?php echo $r['reference']; ?>
           </div> 
            <div class="date">
             Date:- <?php if(isset($r['d1']))  { echo $r['d1']; } ?>
            </div>
            <div class="upload">
              Upload By:- <?php  echo $r['userid'];   ?>
            </div>
            <div class="course">
              Course:- <?php  echo $r['course']; ?>
            </div>
            <div class="link">
               <a href="deletepdf.php?id=<?php  echo $r[id]; ?>">Delete</a>
            </div>
        </ul><!--End ul -->
     </div>
   </div><!-- End Content -->
      <?php
              
          }
          
      }
  ?>
  
  
  
  
  
      
   
 <?php   ?>  
 <div class="footer">
   <div class="container">
       &copy; Copyright 2016 - ResearchPaperCenter  
        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">DEVELOPER</a></span>
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
