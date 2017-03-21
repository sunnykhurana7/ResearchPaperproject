<?php
include 'conn.php';
if(isset($_SESSION['username'])){
    header('location:user.php');
}


?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RESEARCH PAPERS BY XYZ</title>
  <link href="css/display.css" type="text/css" rel="stylesheet" />
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link href="images/logo1.png" rel="shortcut icon" type="image/icon" />
<script src="js/hello.js" ></script>
<script src="js/scroll.js" ></script>
</head>

<body>
  
       <div class="header">
       <div class="container">
       
      <a href="index.php" style="text-decoration: none;color: white;">ResearchPaperCenter</a>
       <div class="anchor">
        <a href="login.php">LOGIN</a> 
         <a href="reg.php">REGISTER</a>
         </div><!-- End Anchor -->     
       </div>
    </div><!-- End Header -->
       
  <div class="box">
      <div class="container">
        <span>research papers</span>
        <p>published by STUDENTS AND TEACHERS</p>
      </div>
  </div> <!-- End Box -->   
  
  
  <div class="container">
    <div class="search">
        <form method="post" action="search.php" enctype="multipart/form-data">
           <input type="text" name="search" placeholder"search" class="search">
             <input type="submit" name="submit" value="SEARCH" class="submit">
        </form>
    </div>
  </div>
  
  <?php              
  $search   =   $_POST['search'];
  
        if($stmt = $conn->query("SELECT * from register r RIGHT JOIN upload u on r.username=u.userid WHERE title='".$search."' || abstract='".$search."'  ||  reference ='".$search."' || d1 ='".$search."' || course ='".$search."' || keywords = '".$search."' ")){
          while($r = $stmt->fetch_array(MYSQLI_ASSOC)){ ?>
          <div class="content">
     <div class="container">
        <ul class="papers">
          <span><?php  echo substr($r['title'],0,20); ?></span>
            <div class="abs">Abstract:</div>
            <p><?php echo $r['abstract'];  ?> </p>
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
                <a href="allfiles/<?php echo $r['file'];?>" target="_blank">Download</a>
                
            </div>
        </ul><!--End ul -->
     </div>
   </div><!-- End Content -->
      <?php
          }
      }
  ?>
  
  
  
  
                        
 <a href="#" id="backToTop" class="backToTop"><img src="images/scroll1.png" /></a> 
 <?php   ?>  
 <div class="footer">
   <div class="container">
       &copy; Copyright 2015 All Rights Reserved with XYZ
      </div>
 </div><!-- End Footer -->
 
</body>
<script src="js/hello.js" ></script>
<script src="js/scroll.js" ></script>
</html>
