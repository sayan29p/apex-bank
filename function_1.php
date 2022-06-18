<?php include '_dbconnectionprofile.php'?>

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
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">NAME</th>
                <td width="2%">:</td>
                <td><?php echo $row['CUS_NAME'] ;
            ?></td>
              </tr>
              <tr>
                <th width="30%">EMAIL	</th>
                <td width="2%">:</td>
                <td><?php echo $row['CUS_EMAIL'] ;
            ?></td>
              </tr>
              <tr>
                <th width="30%">ACCOUNT NO:</th>
                <td width="2%">:</td>
                <td><?php echo $row['ACC_NO'] ;
            ?></td>
              </tr>
              <tr>
                <th width="30%">ADDRESS</th>
                <td width="2%">:</td>
                <td><?php echo $row['CUS_ADD'] ;
            ?></td>
              </tr>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>