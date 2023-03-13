<?php
 include('../config/constrants.php'); 
    //1.Destroy the session
    session_destroy();
    //2.redirect to login page
    header('location:' . SITEURL . 'admin/login.php');
?>