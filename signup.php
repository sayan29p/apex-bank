<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $CUS_ID = $_POST["CUS_ID"];
    $CUS_PASS = $_POST["CUS_PASS"];
    $CUS_NAME = $_POST["CUS_NAME"];
    $CUS_EMAIL = $_POST["CUS_EMAIL"];
    $CUS_ADD = $_POST["CUS_ADD"];
    $CUS_MOBLIE = $_POST["CUS_MOBLIE"];
    $ACC_NO = $_POST["ACC_NO"];
    $PAN_NO = $_POST["PAN_NO"];
    $cpassword = $_POST["cpassword"];
    //$exists=false;

    $existSql = "SELECT * FROM `customers` WHERE CUS_ID = '$CUS_ID'OR ACC_NO='$ACC_NO'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username/Account Already Exists";
    }

    else{
    if(($CUS_PASS == $cpassword)){
      
       $sql="INSERT INTO `customers` (`CUS_ID`, `CUS_PASS`, `CUS_NAME`, `CUS_EMAIL`, `CUS_ADD`, `CUS_MOBILE`, `ACC_NO`, `DATE`,`APPROVE`,`PAN_NO`) VALUES ('$CUS_ID', '$CUS_PASS', '$CUS_NAME', '$CUS_EMAIL', '$CUS_ADD', '$CUS_MOBLIE', '$ACC_NO', current_timestamp(),'N','$PAN_NO')";     
       $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
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
    ?>

    <div class="container my-4">
     <h1 class="text-center">Signup to Apex Bank</h1>
     <form action="/apexbank/signup.php" method="post">
        <div class="form-group">
            <label for="customerid">CUSTOMER ID</label>
            <input type="text" class="form-control" id="CUS_ID" name="CUS_ID" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="text">NAME</label>
            <input type="text" class="form-control" id="CUS_NAME" name="CUS_NAME">
        </div>

        <div class="form-group">
            <label for="cpassword">EMAIL</label>
            <input type="text" class="form-control" id="CUS_EMAIL" name="CUS_EMAIL">
        </div>

        <div class="form-floating">
        <label for="floatingTextarea2">ADDRESS</label>
        <textarea class="form-control"  id="CUS_ADD" name="CUS_ADD" style="height: 100px"></textarea>
         
        </div>

        <div class="form-floating">
        <label for="floatingTextarea2">ACCOUNT NO</label>
        <input type="text" class="form-control" id="ACC_NO" name="ACC_NO">
         </div>

         <div class="form-group">
            <label for="password">PHONE NO</label>
            <input type="text" class="form-control" id="PAN_NO" name="PAN_NO">
        </div>
        <div class="form-group">
            <label for="password">PHONE NO</label>
            <input type="text" class="form-control" id="CUS_MOBLIE" name="CUS_MOBLIE">
        </div>

        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="CUS_PASS" name="CUS_PASS">
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>

        
        
         
        <button type="submit" class="btn btn-primary">SignUp</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
