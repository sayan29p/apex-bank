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
<style>
    .t{
        margin: 10px;
    }
    table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
  text-align:center;
}
th, td {
  background-color: #96D4D4;
}
    
    th {
  background-color: #04AA6D;
  color: white;
  th, td {
  border-bottom: 1px solid #ddd;
}
}
</style>
<body>
    <?php require '_nav.php' ?>
    <div class=t>
<table align=Center border=1 width=50% >
    <tr><th><h1>BALANCE AMOUNT(in Rupess)</h1></th> 
    <th><h1>RS </h1>
    </tr>
  
<?php 
 include '_dbconnect.php';
    // $nvr= $_SESSION['CUS_ID'];
    //   echo $nvr; 
    $ACC=$_GET['ACC_NO'];
//  $ACC_NO = $_POST["ACC_NO"];
 $sql = "SELECT (sum(CR_AMT)-sum(DB_AMT)) as BALANCE FROM trantab where ACC_NO='$ACC' ";

 
 $result = mysqli_query($conn, $sql);
 
 // Find the number of records returned
 $num = mysqli_num_rows($result);
//  echo $num;
// $row=mysqli_fetch_assoc($result);
// echo $row['TRAN_ID'];

        foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
            foreach($row as $key  => $value) {
               echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
            }
        }  
       
    
    
?>   
<!-- <?php
// include '_dbconnect.php';
// $user_check=$_SESSION['CUS_ID'];
// $ACC_NO = $_POST["ACC_NO"];
//  $sql1 = "select * from customers,account where customers.CUS_ID='$user_check'and account.CUS_FK='$user_check'";
// // $sql ="SELECT *,(sum(DB_AMT)-sum(CR_AMT)) as BALANCE FROM trantab,customers where trantab.ACC_NO='$ACC_NO'";
// // $result = mysqli_query($conn, $sql);
// $result1 = mysqli_query($conn, $sql1);

// // Find the number of records returned
// // $num = mysqli_num_rows($result);
// // echo $num;

// // $row=mysqli_fetch_assoc($result);
// $row1=mysqli_fetch_assoc($result1);
  
//   echo $user_check;
//   ECHO $row1['CUS_ID'];
//   if($user_check==$row1['CUS_ID'])
//   {
//     echo 'hello';
//   }
?> -->
  
</table>   
</div> 
 
   

</body>
</html>