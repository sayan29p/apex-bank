<?php include '_dbconnection_adminprofile.php'?>

    <!-- Profile -->
    
          
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://placeimg.com/640/480/arch/any" alt="">
            <h3>Welcome-<?php echo $row['ADMIN_NAME'] ;
            ?>
            </h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">ADMIN ID:</strong><?php echo $row['ADMIN_ID'] ;
            ?></p>
            <p class="mb-0"><strong class="pr-1">EMAIL</strong><?php echo $row['ADMIN_EMAIL'] ;
           ?></p>
           
          </div>
        </div>
      </div>
     
      </div>
    </div>
  </div>
</div>