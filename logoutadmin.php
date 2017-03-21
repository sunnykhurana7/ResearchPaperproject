<?php
  include 'conn.php';
  session_destroy();
  header('location:adminheader.php');
?>
