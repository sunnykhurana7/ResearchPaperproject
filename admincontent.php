<?php
include 'conn.php';

if(!isset($_SESSION['adminname'])){
    header('location:adminheader.php');
}
?>
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>ADMIN PANEL</title>
  <link href="css/admincontent.css" type="text/css" rel="stylesheet">
  <link href="images/logo1.png" rel="shortcut icon" type="image/icon" />
</head>
<body>
 
    <div class="header">
       <div class="container">
             <a href="index.php" style="text-decoration:none;color: white;"><img src="images/logo1.png"></a>
       </div>
         <a href="logoutadmin.php" class="delete">LOGOUT</a>
       <div class="ho">
       <a href="deleteall.php" class="delete">DELETE ALL</a>
       </div>
    </div><!-- End Header -->
   <div class="ad"> 
    <div class="Container">
       <?php
           if(isset($_GET['admin'])){
               echo '<span style=color:black;text-transform:capitialize;font-size:20px;font-weight:bold;margin-top:20px;>welcome SUNNY</span>';
           }
       ?>
     </div>
    </div> 
     
     
    <div class="table" style="margin-top:54px;"> 
     <div class="container">
      <table class='table table-striped dataTable table-bordered'>
      
  <tr>
    <th>SNO</th>
    <th>FULL NAME</th>		
    <th>EMAIL ADDRESS</th>
    <th>TOPIC</th>
    <th>DOWNLOADS</th>
    <th>DELETE</th>
  </tr>
  <?php   
      $p = 0;
       if($stmt = $conn->query("SELECT * from register r INNER JOIN upload u on r.username = u.userid")){
           while ($r = $stmt->fetch_array(MYSQLI_ASSOC)){
               $p++;
          
  ?>
  <tr>
    <td><?php echo $p; ?></td>
    <td><?php echo $r['name']; ?></td>		
    <td><?php  echo $r['email']; ?></td>
    <td><?php  echo $r['title']; ?></td>  
     <td><?php echo $r['total_count'];  ?></td>   
    <td><a href="deletesingle.php?id=<?php echo $r['id']; ?>">Delete</a></td>
  </tr>
  
  <?php  }} ?>
 
</table>
    <form>
       <select>
          <option>RECORDS PER PAGE</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
       </select>
    </form>
     </div>
      <div class="footer">
   <div class="container">
       &copy; Copyright 2016 - ResearchPaperCenter  
        &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span style="font-size: 12px;color: red;font-weight: bold;"><a href="developer.php" style="text-decoration: none;color:white;">DEVELOPER</a></span>
      </div>
   
 </div><!-- End Footer-->
     </div>
        
</body>
</html>
