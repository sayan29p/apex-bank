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
    <title>BALANCE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<STYLE>  
/* table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
  text-align:center;
  font-size:20px;
} */
td {
      border-width: 1px;
      border-radius: 50px;
      border-color:black;  
      padding: 10px;
      cursor:pointer;
      font-size: 15px;
      background-color: #9fc5e8;
      text-align:center;
      font-size:30px;
      
    }

    th {
      font-weight: normal;
      border: 0;
      padding: 10px 0;
      font-size:30px;
    }

    div {
      margin-bottom: 50px;
      
    }
</STYLE>
<body>
<?php require '_nav.php' ?>
<!-- <table align=Center border=1 width=80%> -->
<?php 




      include '_dbconnect.php';
 $user_check=$_SESSION['CUS_ID'];
  $sql1 = "select * from customers where CUS_ID='$user_check'";
 
 $result1 = mysqli_query($conn, $sql1);
 $row1=mysqli_fetch_assoc($result1);
$r=$row1['PAN_NO'];

$sql = "select * from customers where PAN_NO='$r'";
$result = mysqli_query($conn, $sql);
 // Find the number of records returned
 $num = mysqli_num_rows($result);
  echo $num;
 
    while ($row=mysqli_fetch_assoc($result)) {
      ECHO '<div>
<table class="table-Warning" align=Center>
  <thead>
    <tr>
      
      <th >ACCONUT NO</th>
      
      </tr>
      </thead>';

         echo ("<tr><TD ><a href=cus_bal.php?ACC_NO=".$row["ACC_NO"].">".$row["ACC_NO"]."</a></tr>");
        
    }
?> 



<!-- <?php 
 include '_dbconnect.php';
 $user_check=$_SESSION['CUS_ID'];
  $sql = "select * from customers where CUS_ID='$user_check'";
 
 $result = mysqli_query($conn, $sql);
 
 // Find the number of records returned
 $num = mysqli_num_rows($result);
//  echo $num;
 
    while ($row=mysqli_fetch_assoc($result)) {
         echo ("<tr><TD ><a href=cus_bal.php?ACC_NO=".$row["ACC_NO"].">".$row["ACC_NO"]."</a></tr>");
        
    }
?>   
   
  
</TABLE>
</div>    -->
  <!-- <a href=dminapp.php?ACC_NO=".$row["ACC_NO"]."> -->





</body>
</html>