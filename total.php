<?php
  include 'conn.php';
  if(isset($_GET['id'])){
      if($stmt = $conn->query("SELECT * from upload where id = '".$_GET['id']."'")){
          $r = $stmt->fetch_array(MYSQLI_ASSOC);
          $total_count = $r['total_count']+1;
          
          if($stmt=$conn->query("UPDATE upload set total_count ='".$total_count."' where id ='".$_GET['id']."'")){
              
          }
      }
  }
?>
