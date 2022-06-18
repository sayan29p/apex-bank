<!-- <?php
// session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }
// // $showAlert = false;
// // $showError = false;
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     include '_dbconnect.php';
//     $ACC_NO = $_POST["ACC_NO"];
//     $sql = "SELECT * FROM `trantab` WHERE ACC_NO = '$ACC_NO'";
//     $result = mysqli_query($conn, $sql);
//     $numExistRows = mysqli_num_rows($result);
//     if($numExistRows > 0){
//         header(location:cus_admin)// $exists = true;
//         $showError = "Username/Account Already Exists";
//     }
//     }

    
?> -->
<?php
session_start();
// <a href=adminapp.php?ACC_NO=".$row["ACC_NO"];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;

// include '_dbconnect.php';
// $user_check=$_SESSION['CUS_ID'];
// $sql = "select * from customers where CUS_ID='$user_check'";
// $result = mysqli_query($conn, $sql);

// // Find the number of records returned
// // $num = mysqli_num_rows($result);
// // echo $num;
// $row=mysqli_fetch_assoc($result);
//  echo $row['ACC_NO'] ;

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
      
    <?php require '_nav.php' ?>
    <!-- <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?> -->
   <?php include '_dbconnect.php';
$user_check=$_SESSION['CUS_ID'];
$sql = "select * from customers where CUS_ID='$user_check'";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
// $num = mysqli_num_rows($result);
// echo $num;
$row=mysqli_fetch_assoc($result);
 echo $row['ACC_NO'] ;
 echo '<b>submit</a>';
 echo ("<a href=cus_bal.php?ACC_NO=".$row["ACC_NO"].">"echo <b>submit</a>"</a>");
 echo('<a href=cus_bal.php?ACC_NO=".$row["ACC_NO"]>SUBMIT</a>');
 
 ?>
 
 <tr>
    <!-- other cells -->
    <td>
      <form method="post" action="cus_bal.php?ACC_NO=$row["ACC_NO"]">
        <input type="submit" name="action" value="Edit"/>
        <input type="submit" name="action" value="<?php echo $row['ACC_NO']; ?>"/>
        <input type="hidden" name="id" value="<?php echo $row['ACC_NO']; ?>"/>
        <button type="submit" class="btn btn-primary"></button>
      </form>
    </td>
  </tr>


    <div class="container my-4">
     <h1 class="text-center">Enter your account no</h1>
     <form action="/apexbank/cus_bal.php" method="post">
        <div class="form-group">
            <label for="customerid">ACCOUNT ID</label>
            <input type="text" class="form-control" id="ACC_NO" name="ACC_NO" aria-describedby="emailHelp">
        </div>
        <button type="button" class="btn btn-link">Link</button>


        <button type="submit" class="btn btn-primary"><a href="#">SUBMIT</a></button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
