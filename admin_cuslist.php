<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: admin.php");
    exit;
}






?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>approval</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="styles_2.css">
<body>
<?php require '_nav1.php' ?>
   <table class="styled-table center"  id='td'>
    <thead>
        <tr>
            <th>ACCOUNT</th>
            <th>CUSTOMER ID</th>
            <th>CUSTOMER NAME</th>
            <th>CUSTOMER ADDRESS</th>
            <th>APPROVE</th>
           
        </tr>
        
    </thead>
    <tbody>  
  
<?php 
 include '_dbconnect.php';
 
 
 $sql = "select * from customers where APPROVE='Y'";
 $result = mysqli_query($conn, $sql);

 while($rows1 = mysqli_fetch_assoc($result)) 
 {
?>   


        <tr>
        <td><?php echo $rows1['ACC_NO'] ?></a></td>
         <td><?php echo $rows1['CUS_ID'] ?></td>
         <td><?php echo $rows1['CUS_NAME'] ?></td>
         <TD><?php echo $rows1['CUS_ADD'] ?></TD>
         <td><?php echo $rows1['APPROVE'] ?></td>
        
        </tr>
        
        <?php 
  } 
 ?>    
        <!-- and so on... -->
    </tbody>
</table>
    
 
   

</body>
</html>