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
    <title>transaction Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    table.center {
  margin-left: auto; 
  margin-right: auto;
}
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

</style>



<body>
    <?php require '_nav.php' ?>
    <h2 class="text-center pt-4" style="color : black;">Transaction Details</h2>
    <table class="styled-table center"  id='td'>
    <thead>
        <tr>
            <th>TRAN_ID</th>
            <th>DATE</th>
            <th>ACCOUNT</th>
           
            <th>CR_AMT</th>
            <th>DB_AMT</th>
            <th>DETAILS</th>
        </tr>
        
    </thead>
    <tbody>  
  
<?php 
 include '_dbconnect.php';
 $user_check=$_SESSION['CUS_ID'];
 $sql="SELECT * FROM  `customers` where CUS_ID=$user_check";
 $query = mysqli_query($conn,$sql);
 $rows = mysqli_fetch_array($query); 
 
 $r=$rows['ACC_NO'];
 //    echo $r;
 $sql1= "SELECT * FROM trantab where ACC_NO='$r'";
 $query = mysqli_query($conn,$sql1);
 
 while($rows1 = mysqli_fetch_assoc($query)) 
 {
?>   


        <tr>
        <td> <?php echo $rows1['TRAN_ID'] ?></td>
         <td><?php echo $rows1['TRAN_DATE'] ?></td>
         <!-- <td><?php echo $rows1['ACC_NO'] ?></td> -->
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