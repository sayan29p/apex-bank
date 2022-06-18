
<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$user_check=$_SESSION['CUS_ID'];
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $ACC_NO = $_POST["ACC_NO"];
    $ACC_TYPE = $_POST["ACC_TYPE"];
    $ACC_BAL = $_POST["ACC_BAL"];
    $CUS_FK = $_POST["CUS_FK"];

    $existSql = "SELECT * FROM `customers` WHERE ACC_NO='$ACC_NO' AND CUS_ID='$user_check'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows ==1){
        // $exists = true;
        // $showError = "Username/Account Already Exists";
        $sql="INSERT INTO `account` (`ACC_NO`, `ACC_BAL`,`ACC_TYPE`,`CUS_FK`) VALUES ('$ACC_NO','$ACC_BAL','$ACC_TYPE','$CUS_FK')";     
        $results = mysqli_query($conn, $sql);
         if ($results){
             $showAlert = true;
             header("location: welcome.php");
         }
    }
    else
    {
        $showError="mismatch";
    }

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
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> submitted successfully
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
    ?>

    <div class="container my-4">
     <h1 class="text-center">Fill up the form if you login for the first time </h1>
     <form action="/apexbank/first_time.php" method="post">
     <div class="form-floating">
        <label for="floatingTextarea2">ACCOUNT NO</label>
        <input type="text" class="form-control" id="ACC_NO" name="ACC_NO">
         </div>
         <br>
         <div class="form-floating">
        <label for="floatingTextarea2">CUSTOMER ID</label>
        <input type="text" class="form-control" id="CUS_FK" name="CUS_FK">
         </div>
        
<div class="form-floating">
        <label for="floatingTextarea2">ACCOUNT TYPE</label>
        <input type="text" class="form-control"id="ACC_TYPE" name="ACC_TYPE">
         </div>
      
<br>
       


        

    <button type="submit" class="btn btn-primary">SUBMIT</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>