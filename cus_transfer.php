<?php
$showAlert = false;
$showError = false;

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $user_check=$_SESSION['CUS_ID'];
        $ACC = $_POST["ACC_NO"];
        $CR_AMT = $_POST["CR_AMT"];
        $details=$_POST["TRANS_DETAILS"];
        $sql = "SELECT * FROM  `customers` where CUS_ID=$user_check";
                $query = mysqli_query($conn,$sql);
                $rows = mysqli_fetch_array($query); 
                
                $r=$rows['ACC_NO'];
                //    echo $r;
                $sql1= "SELECT (sum(CR_AMT)-sum(DB_AMT)) as BALANCE FROM trantab where ACC_NO='$ACC'";
                $query = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($query);
                $amt=$row1['BALANCE'];
                // echo $amt;
                if (($CR_AMT)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($CR_AMT > $row1['BALANCE']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($CR_AMT == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }
        else
        {
        $sql="INSERT INTO `trantab` (`TRAN_DATE`, `ACC_NO`, `TO_ACC`, `CR_AMT`, `DB_AMT`, `TRANS_DETAILS`) VALUES ( current_timestamp(), '$r', '$ACC', '0', '$CR_AMT', '$details')";
        $result = mysqli_query($conn, $sql);
        $sql2="INSERT INTO `trantab` (`TRAN_DATE`, `ACC_NO`, `TO_ACC`, `CR_AMT`, `DB_AMT`, `TRANS_DETAILS`) VALUES ( current_timestamp(), '$ACC', '$r', '$CR_AMT', '0', 'CREDIT')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result and $result2){
            $showAlert = true;
        }
    
    else{
        $showError = "ERROR!!";
        }
   }
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
	<link rel="stylesheet" type="text/css" href="style.css"/>
    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:lightblue;
		}

    </style>
</head>
<body style="background-color : lightyellow;">

<?php require '_nav.php' ?>   
<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully!</strong>Submitted
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

    
    
	<div id="secondhistory">
<body style="background-color : skyblue;">
 


	<div class="container">
        <h2 class="text-center pt-4" style="color : black;">Transfer History</h2>
            <?php
                include '_dbconnect.php';
                $user_check=$_SESSION['CUS_ID'];
                
                $sql = "SELECT * FROM  `customers` where CUS_ID=$user_check";
                $query = mysqli_query($conn,$sql);
                $rows = mysqli_fetch_array($query); 
                
                $r=$rows['ACC_NO'];
                   
                $sql1= "SELECT (sum(CR_AMT)-sum(DB_AMT)) as BALANCE FROM trantab where ACC_NO='$r'";
                $query = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($query);
                // ECHO $row1['BALANCE'];

                // if(!$result)
                // {
                //     echo "Error : ".$sql."<br>".mysql_error($conn);
                // }
                // $rows=mysqli_fetch_assoc($result);
                

            ?>
            <form  class="tabletext"action="/apexbank/cus_transfer.php" method="post" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered" >
                <tr style="color : black;">
                    <th class="text-center" style="background-color:yellow">Customer Id</th>
                    <th class="text-center" style="background-color:yellow">Account no</th>
                    <th class="text-center" style="background-color:yellow">Name</th>
                    <th class="text-center" style="background-color:yellow">Email</th>
                    <th class="text-center" style="background-color:yellow">Balance</th>
                    
                </tr>
                <tr style="color : black;">
                    <td class="py-2"><?php echo $rows['CUS_ID'] ?></td>
                    <td class="py-2"><?php echo $rows['ACC_NO'] ?></td>
                    <td class="py-2"><?php echo $rows['CUS_NAME'] ?></td>
                    <td class="py-2"><?php echo $rows['CUS_EMAIL'] ?></td>
                    <td class="py-2"><?php  echo $row1['BALANCE'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="ACC_NO" required></br>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $user_check=$_SESSION['CUS_ID'];
                $sql = "SELECT * FROM `customers` where CUS_ID!=$user_check";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['ACC_NO'];?>" >
                
                    <?php echo $rows['ACC_NO'] ;?>
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="CR_AMT" required>   
            <br><br>

            <label style="color : black;"><b>Purpose:</b></label>                   
            <select name="TRANS_DETAILS" required></br>
            <option value="" disabled selected>Select Purpose</option>
            <option value="Payment towards loan" class="table">Payment towards loan</option>
            <option value="Rent" class="table">Rent</option>
            <option value="Gift to relatives/Friends"class="table" >Gift to relatives/Friends </option>
            <option value="Donation" class="table">Donation</option>
            
            <option value="Others" class="table">Others</option>
            </select>
            
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" style="background-color:green">Transfer</button>
            </div>
        </form>
    </div>
   
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>