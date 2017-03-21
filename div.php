<?php  
   include 'conn.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Neat Admin Template</title>
        <meta name="description" content="">

        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <script type="text/javascript" src="/js/jquery.js?1404237138"></script>
        
        <script type="text/javascript" src="js/bootstrap.min.js?1404237163"></script>
        <script type="text/javascript" src="js/jquery.js?1404237163"></script>
        
        <script type="text/javascript" src="js/jquery.dataTables.min.js?1404237137"></script>
        <script type="text/javascript" src="js/jquery.dataTables.bootstrap.js?1404237163"></script>
        <script type="text/javascript" src="js/custom.js?1405929245"></script>
        
    </head>
    <body>
    
    
    
    <div class="header" style="width: 100%;">
       <div class="container" style="margin-bottom: 30px;font-size:72px;background: #314D68;width: 100%;color: white;height:70px;
     margin:0 auto;
     width:1000px;
">
      XYZ
       </div>
 
    
    
    
    
    
    
    
    
    
    
        <table class='table table-striped dataTable table-bordered'>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Full Name</th>
                    <th>E-Mail Address</th>
                    <th>Delete</th>
                </tr>
            </thead>
            
         
            
            <tbody>
                  <tr>
                       <?php  
                $ctr = 0;
            if($stmt=$conn->query("SELECT * from register ")){
             while ($r = $stmt->fetch_array(MYSQLI_ASSOC)){
                 $ctr++;
         ?>
          <td><?php echo $ctr;  ?></td>
                    <td><?php  echo $r['name']  ?></td>
                    <td><?php  echo $r['email']  ?></td>
                   <td><a href="deletesingle.php?id=<?php  echo $r['id'] ?>">Delete</a></td>
                  </tr>
                  <?php  }}  ?>
             </tbody>
        </table>   
    </body>
</html>