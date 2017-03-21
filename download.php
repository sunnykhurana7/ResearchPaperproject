<?php
  include 'conn.php';
  if(isset($_GET['id'])){
        if($stmt = $conn->query("SELECT * FROM upload where id = '".$_GET['id']."'"))
        {
           $r = $stmt->fetch_array(MYSQLI_ASSOC);
           $totalCount  =   $r['total_count']+1;
           if($stmt=    $conn->query("UPDATE upload SET total_count='".$totalCount."' WHERE id='".$_GET['id']."'")){
               $location    =   "allfiles/".$r['file'];
               header("location:$location");
           }
        }
    }

?>
