<?php
  include 'conn.php';
  if(isset($_GET['id'])){
      if($stmt=$conn->query("DELETE from register where id ='".$_GET['id']."'")){
          header('location:admincontent.php');
      }
  }
?>
