<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: admin.php");
    exit;
}

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    // $CUS_ID = $_POST["CUS_ID"];
    $ACC_NO = $_POST["ACC_NO"];
    $CR_AMT = $_POST["CR_AMT"];
    $TRANS_DETAILS = $_POST["TRANS_DETAILS"];
    
    $sql1="select ACC_NO from customers where ACC_NO='$ACC_NO'";
    $result1 = mysqli_query($conn, $sql1);
    $rows1 = mysqli_fetch_assoc($result1);
    $R= $rows1['ACC_NO'];
    IF($ACC_NO==$R)
    {
    $sql="INSERT INTO `trantab` (`TRAN_DATE`, `ACC_NO`,`TO_ACC`,`CR_AMT`, `DB_AMT`,  `TRANS_DETAILS`) VALUES (current_timestamp(), '$ACC_NO','$ACC_NO' ,'$CR_AMT', '0', '$TRANS_DETAILS')";     
    
    $result = mysqli_query($conn, $sql);
    
    if($result)
    {
        $showAlert=true;
    }
    else
    {
        $showError = "Record not Insert,Some Problem";
    }
    
}   
else {
    echo '<script type="text/javascript">';
        echo ' alert("Oops! This account does not match with database. Please re-check your account no you have entered")';  // showing an alert box.
        echo '</script>';
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

    <title>DEPOSIT</title>
  </head>
  <body>
      
  <?php require '_nav1.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Record Insert
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
     <h1 class="text-center">DEPOSIT</h1>
     <form action="/apexbank/admin_deposit.php" method="post">
       
        <div class="form-group">
            <label for="text">ACCOUNT NO</label>
            <input type="text" class="form-control" id="ACC_NO" name="ACC_NO">
        </div>

        <div class="form-group">
            <label for="cpassword">AMOUNT</label>
            <input type="text" class="form-control" id="CR_AMT" name="CR_AMT">
        </div>

        <div class="form-floating">
        <label for="floatingTextarea2">ACCOUNT DETAILS</label>
        <input type="text" class="form-control"  id="TRANS_DETAILS" name="TRANS_DETAILS"></textarea>
         
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
