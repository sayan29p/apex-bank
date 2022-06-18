<?php
include '_dbconnect.php';
$user_check=$_SESSION['CUS_ID'];
// $sql = "select * from customers,account where CUS_ID='$user_check'";
$sql ="SELECT * FROM customers INNER JOIN account D ON D.CUS_FK='$user_check' and customers.CUS_ID='$user_check'";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
// $num = mysqli_num_rows($result);
// echo $num;
$row=mysqli_fetch_assoc($result);
//  echo $row['CUS_ID'];
?>