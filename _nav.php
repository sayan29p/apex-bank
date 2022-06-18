<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/apexbank">
      <img src="logo.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
      APEX BANK
    </a>
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/apexbank/welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>';

      if(!$loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="/apexbank/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/apexbank/signup.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/apexbank/admin.php">Admin</a>
      </li>';
      }
      if($loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="/apexbank/logout_cus.php">Logout</a>
      </li>';
    }
       
      
    echo '</ul>
    
    </form>
  </div>
</nav>';
?>