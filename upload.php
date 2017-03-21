<?php
 
 

include 'conn.php';

if(!isset($_SESSION['username'])){
    header('location:login.php');
}
if(isset($_POST['submit'])){
   $title = $_POST['title'];
   $abstract = $_POST['abstract'];
   $reference = $_POST['reference'];
   $course = $_POST['course'];
   $file = $_FILES['file']['name'];
   $userid = $_SESSION['username'];
   $date = date('d-m-y');
   $keywords = $_POST['keywords'];
   
   
   $_SESSION['userid'] = $userid;
   $fileext = pathinfo($file,PATHINFO_EXTENSION);
   if(!($fileext=="pdf" || $fileext =="docx")){
       header('location:upload.php?error');
   }
   else
   if($stmt=$conn->prepare("INSERT into upload set title =?,abstract=?,reference=?,course=?,file=?,userid=?,d1=?,keywords=?")){
       
       $stmt->bind_param('ssssssss',$title,$abstract,$reference,$course,$file,$userid,$date,$keywords);
       $stmt->execute();
       if($stmt->affected_rows==1){
           move_uploaded_file($_FILES['file']['tmp_name'],'allfiles/'.$file);
           header('location:upload.php?insert');
       } 
       else
       {
           header('location:upload.php?error');
       }
   }
   

}
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UPLOAD PDF</title>
<link href="css/upload.css" type="text/css" rel="stylesheet" />
 <link href="css/validationEngine.jquery.css" type="text/css" rel="stylesheet" />
 <script src="js/jquery.validationEngine.js" type="text/javascript"></script>
 <script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
 <script src="js/jquery-1.8.2.min.js" ></script>
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
    
    <div class="msg" style="color: black;text-transform: capitalize;font-weight: bold;font-size:30px;">
     <div class="container">
          <?php    
               if(isset($_GET['error'])){
                   echo 'data cannot upload please provide full details and upload only pdf,doc files';
               }
               else
                  if(isset($_GET['insert'])){
                      echo 'Data is uploaded';
                  }
          ?>
     </div>
    </div>
    
    <div class="box1">
     <div class="container">
       <div class="header1">
         <span>XYZ</span>
        </div><!-- End Header --> 
       
       <form method="post" enctype="multipart/form-data" class="form2" id="form">
         <input type="text" name="title" placeholder="Title" class="title">
         <textarea placeholder="Abstract" class="textarea" name="abstract"></textarea>
         <input type="text" name="reference" placeholder="Reference" class="title">
         <select name="course">
           <option>Select course </option>
            <option value="mca">MCA</option>
             <option value="bca">BCA</option>
             <option value="bba">BBA</option>
             <option value="b-tech">B-TECH</option>
             <option value="m-tech">M-TECH</option>
             <option value="teacher">TEACHER</option>
             <option value="others">OTHERS</option>
         </select>
         <textarea placeholder="Please Provide Keywords So Paper Can Be Search Easily" class="textarea1" name="keywords"></textarea>
         <input type="file" name="file"  class="custom-file-input"/>
         <input type="submit" name="submit" value="SUBMIT" class="submit">
         
       </form>
       
       </div>
  </div><!-- End Box1 -->
 
 
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
