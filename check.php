<?php
  include 'conn.php';
?>


<?php
 if($stmt = $conn->query("select * from upload order by id desc LIMIT 1")){
     while($r = $stmt->fetch_array(MYSQLI_ASSOC)){
         

?>
  <ul>
    <li><?php echo $r['title'];  ?></li>
    <li><?php echo $r['reference']; ?></li>
    <li></li>
  </ul>
<?php   }} ?>