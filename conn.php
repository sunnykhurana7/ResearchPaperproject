<?php
  session_start();
  $conn = new mysqli('localhost','root','','jims');
  if($conn->connect_errno){
      echo 'not connected properly with database';
      
  }
?>
