<?php  include('../config/constrants.php')?>
<?php

    //1.check whether id and image exists or not
    if(isset($_GET['id'])&& isset($_GET['image_name']))
    {
        //get the value and delete
        echo "Get value and delete";
        $id = $_GET['id'];
         $image_name = $_GET['image_name'];
         //remove physical image file is available
         if($image_name!="")
         {
             $path = "../images/category/".$image_name;
             $remove = unlink($path);
             if($remove==false)
             {
               $_SESSION['remove'] = "<div class='error'>Unable to delete image</div>";
               header('location:' . SITEURL . 'admin/manage-category.php');
                die();
             }
         }

         //delete data from db
     $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'> Category Deleted Successfully</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');

    }
    else 
    {
        $_SESSION['delete'] = "<div class='error'> Failed to delete Category </div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
        
    }
         //redirect to manage-category page

    }
    else
    {
        //redirect  to manage category page 

      header('location:' . SITEURL . 'admin/manage-category.php');
    }
     


?>