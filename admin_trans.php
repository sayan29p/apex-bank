<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
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

    <h2 class="text-center pt-4" style="color : black;">All Customer Transaction</h2>


     <!-- $sql = "select * from trantab order by TRAN_ID"; -->
 
  <table class="styled-table center"  id='td'>
    <thead>
        <tr>
            <th>TRANSACTION ID</th>
            <th>DATE</th>
            <th>ACCOUNT NO</th>
            <th>ACCOUNT NO</th>
            <th>CR_AMT</th>
            <th>DB-AMT</th>
            <th>TRANSACTION DETAILS</th>
            
        </tr>
        
    </thead>
    <tbody>  
  
<?php 
 include '_dbconnect.php';


 $sql1= "SELECT * FROM trantab ";
 $query = mysqli_query($conn,$sql1);
 
 while($rows1 = mysqli_fetch_assoc($query)) 
 {
?>   


        <tr>
        <td> <?php echo $rows1['TRAN_ID'] ?></td>
         <td><?php echo $rows1['TRAN_DATE'] ?></td>
         <td><?php echo $rows1['ACC_NO'] ?></td>
         <TD><?php echo $rows1['TO_ACC'] ?></TD>
         <td><?php echo $rows1['CR_AMT'] ?></td>
         <td><?php echo $rows1['DB_AMT'] ?></td>
         <td><?php echo $rows1['TRANS_DETAILS'] ?></td>
        </tr>
        
        <?php 
  } 
 ?>    
        <!-- and so on... -->
    </tbody>
</table>








  
    
 
   

</body>
</html>