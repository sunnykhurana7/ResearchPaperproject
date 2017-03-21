<?php
  include 'conn.php';
  if(isset($_GET['id'])){
      if($stmt=$conn->query("DELETE from upload where id ='".$_GET['id']."'")){
          header('location:view.php');
      }
  }
?>
