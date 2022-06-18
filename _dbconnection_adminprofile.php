<?php
include '_dbconnect.php';
$user_check=$_SESSION['ADMIN_ID'];
$sql = "select * from admin where ADMIN_ID='$user_check'";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
// $num = mysqli_num_rows($result);
// echo $num;
$row=mysqli_fetch_assoc($result);
// echo $row['ADMIN_ID'] ;
?>