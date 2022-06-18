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

<body>
    
    <?php require '_nav1.php' ?>
    <h2 class="text-center pt-4" style="color : black;">NOT APPROVAL LIST</h2>
    
<?php 
 include '_dbconnect.php';
    $ANO=$_GET['ACC_NO'];
  $sql = "update customers set APPROVE='Y' where ACC_NO='$ANO'";
 
 $result = mysqli_query($conn, $sql);
 
 // Find the number of records returned
//  $num = mysqli_num_rows($result);
//  echo $num;
 if($result)
 {
    header("location:cus_app.php");
 }
     
?>   
  
    
 
   

</body>
</html>