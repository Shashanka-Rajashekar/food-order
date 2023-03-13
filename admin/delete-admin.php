<?php
include('../config/constrants.php');
//1.id of admin required to be deleted
$id = $_GET['id'];

//2.create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn, $sql);
if($res==true)
{
   // echo "Admin Deleted";
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
    header('location:'. SITEURL.'admin/manage-admin.php');
}
else
{
   // echo "Unable to delete";
    $_SESSION['delete'] = "<div class='error'Unable to delete Please try again later</div>s";
    header('location:'. SITEURL.'admin/manage-admin.php');

}
//3.Redirect to manage admin with message 


?>