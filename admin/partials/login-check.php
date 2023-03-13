<?php 
  //authorisation - access control
  //check whether the user logged in or not
  if(!isset($_SESSION['user'])) //not set
  {
    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin panel</div>";
    header('location:' . SITEURL . 'admin/login.php');
  }
?>