<?php include '_dbconnection_acc.php'?>

    <?php
                include '_dbconnect.php';
                $user_check=$_SESSION['CUS_ID'];
                
                $sql1 = "SELECT * FROM  `customers` where CUS_ID=$user_check";
                $query1 = mysqli_query($conn,$sql1);
                $rows1 = mysqli_fetch_array($query1); 
                
                $r=$rows1['ACC_NO'];
                   
                $sql2= "SELECT (sum(CR_AMT)-sum(DB_AMT)) as BALANCE FROM trantab where ACC_NO='$r'";
                $query2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_array($query2);
                // ECHO $row1['BALANCE'];

                
                

            ?>   
    <!-- Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://placeimg.com/640/480/arch/any" alt="">
            <h3>Welcome-<?php echo $row['CUS_NAME'] ;
            ?>
            </h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">CUSTOMER ID:</strong><?php echo $row['CUS_ID'] ;
            ?></p>
            <p class="mb-0"><strong class="pr-1">MOBILE NO</strong><?php echo $row['CUS_MOBILE'] ;
           ?></p>
            <p class="mb-0"><strong class="pr-1">ACCOUNT NO:</strong><?php echo $row['ACC_NO'] ;
            ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Account Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">ACCOUNT NO</th>
                <td width="2%">:</td>
                <td><?php echo $row['ACC_NO'] ;
            ?></td>
              </tr>
              <tr>
                <th width="30%">ACCOUNT TYPE</th>
                <td width="2%">:</td>
                <td><?php echo $row['ACC_TYPE'] ;
            ?></td>
              </tr>
              <tr>
                
              </tr>
              <tr>
                <th width="30%">ACCOUNT BALANCE</th>
                <td width="2%">:</td>
                <td><?php echo $row2['BALANCE'] ;
            ?></td>
              </tr>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>