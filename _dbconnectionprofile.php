<?php
include '_dbconnect.php';
$user_check=$_SESSION['CUS_ID'];
$sql = "select * from customers where CUS_ID='$user_check'";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
// $num = mysqli_num_rows($result);
// echo $num;
$row=mysqli_fetch_assoc($result);
//  echo $row['ACC_NO'] ;
?>