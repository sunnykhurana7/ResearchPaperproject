<?php
  include 'conn.php';
  
      if($stmt=$conn->query("DELETE from register")){
          header('location:admincontent.php');
      }
  
?>
