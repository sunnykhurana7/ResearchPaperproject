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
<title>RESEARCHPAPERSCENTER</title>
  <link href="css/display.css" type="text/css" rel="stylesheet" />
 <link href="css/introLoader.css" type="text/css" rel="stylesheet" />
  <link href="css/introloadermin.css" type="text/css" rel="stylesheet" />

 
<link href="images/logo1.png" rel="shortcut icon" type="image/icon" />  
<script src="js/hello.js" ></script>
<script src="js/scroll.js" ></script>
<link href="css/select2.css" rel="stylesheet"/>
    <script src="js/jquery-1.8.0.min.js"></script>
    <script src="js/select2.js"></script>
    <script>
        $(document).ready(function() {
            $("#states").select2();   
        });
    </script>
    


</head>

<body background="images/b18.png">
  

       <div class="header">
       <div class="container">
           <a href="index.php" style="text-decoration:none;color: white;"><img src="images/logo1.png"></a> 
       <div class="anchor">
        <a href="login.php">LOGIN</a> 
         <a href="reg.php">REGISTER</a>
         </div><!-- End Anchor -->     
       </div>
    </div><!-- End Header -->
       
  <div class="box">
      <div class="container">
        <span>research papers</span>  <!--Beta Version  -->   
        <p>published by students and teachers</p>
      </div>
  </div> <!-- End Box -->   
  
  
   <div class="box1" style="width: 100%;height: 40px;background: black;">
     <div class="container1" style="color: white;padding:8px;text-align: center;font-size:20px;">
       Contains Only Dummy Paper. Please Don't Upload Papers. Website Live For Testing Purpose.
     </div>     
   </div>
  
  
  <div class="container">
    <div class="search">
        <form method="post" action="search.php" enctype="multipart/form-data">
           <input type="text" name="search" placeholder="Search For Paper" required="required">
             <input type="submit" name="submit" value="SEARCH" class="submit">
               
          <!--   
             <input type="text" name="searching" required="required" class="searching" placeholder="Search Here For Content">
             <input type="submit" name="Searching" required="required" value="SEARCHING" class="searching1"> -->
             
       <!--       <select name="page" class="page" style="width:300px;">
               <option>Papers Per Page</option>
               <option>10</option>
               <option>20</option>
               <option>30</option>
               <option>40</option>
               <option>50</option>
             </select>  
          <!--   <select style="width:300px" id="states" name="papers">
               <optgroup label>
                   <option value="10">10</option>
                   <option value="20">20</option>
               </optgroup>
               
              </select>  -->
        </form>
    </div>
  </div>
 

  <?php
  
     $page = $_GET['page'];
     if($page == "" || $page =='1'){
         $page1 = 0;
     }  
     else
     {
       $page1 = ($page*6)-6;
     }
      if($stmt = $conn->query("SELECT * from register r RIGHT JOIN upload u on r.username=u.userid LIMIT $page1,6")){
          while($r = $stmt->fetch_array(MYSQLI_ASSOC)){ ?>
          <div class="content">
     <div class="container">
        <ul class="papers">
         <li><a href="" title="TOTAL DOWNLOAD"><?php echo $r['total_count']; ?></a></li>
          <span><?php  echo substr($r['title'],0,20); ?></span>
            <div class="abs">Abstract:</div>
            <p><?php echo substr($r['abstract'],0,50);;  ?> </p>
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
              <a href="download.php?id=<?php echo $r['id'];?>" target="_blank" onclick="refresh">Download</a>
                <script>
                    function refresh(){
                        location.reload();
                    }
                </script>
                
            </div>
        </ul><!--End ul -->
     </div>
   </div><!-- End Content -->
      <?php
              
          }
          
      }
  ?>
  
  
  
  
  
      
   
 <?php   ?>
 
 <div class="pagination" style="float: left;clear: both;margin-left: 20px;margin-top: 10px;margin-bottom: 10px;font-size: 20px;">
   <div class="container">
   
   <?php
//pagination code
   if($st = $conn->query("select count(*) from upload")){
       while($t = $st->fetch_array(MYSQLI_ASSOC)){
           foreach($t as $i);
           $a = $i/6;
           $c = ceil($a);
            for($b=1;$b<=$c;$b++){
                
                ?>
     <!-- <a href="index.php?page=<?php  echo $b; ?>" style="text-decoration: none;background-color: black;color: white;width: 120px;"><?php echo $b .""; ?></a> -->
       
      <a href="index.php?page=<?php echo $b; ?>" style="text-decoration: none;padding-left:5px;padding-right: 5px;margin-left:5px;background:black;color: white;text-align:center"><?php echo $b; ?></a>
     <!-- <a href="#" style="text-decoration: none;">Hello</a> --> 
 
       <?php
            }
       }
   }

?>  
          
   </div>
 </div><!-- End Pagination -->
     
 <div class="footer">
   <div class="container">
       &copy; Copyright 2016 - ResearchPaperCenter  
        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">DEVELOPER</a></span>
      </div>
   
 </div>
 <script src="js/jquery.introLoader.js"></script>
 <script src="js/jquery.introLoader.min.js"></script>
 
 






</body>



<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3bNxMgqe9yblFYUdDXScuojANerxFYzv";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->

<script src="js/hello.js" ></script>
<script src="js/scroll.js" ></script>
</html>
