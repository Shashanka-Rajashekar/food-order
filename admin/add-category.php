<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
            <?php 
               if(isset($_SESSION['add']))
               {
                echo $_SESSION['add'];
                unset($_SESSION['add']); //removing session message
               }
               if(isset($_SESSION['upload']))
               {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']); //removing session message
               }
            ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>

                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No
                    </td>    
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                    <input type="radio" name="active" value="yes">Yes
                    <input type="radio" name="active" value="no">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-tertiary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
        if(isset($_POST['submit']))
        {
            $title = $_POST['title'];
            //for radio we need to check whether the button is selected or not
            if(isset($_POST['featured']))
            {
                //get value from form
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "no";
            }
            if(isset($_POST['active']))
            {
                $active = $_POST['active'];

            }
            else
            {
                $active = "no";
            }
            //check if image is selected or not and set value for image name
            //print_r($_FILES['image']); //print_r is to display array 

            //die();
            if(isset($_FILES['image']['name']))
            {
                //upload image
                //to upload image we need image name ,source path and destination path
                $image_name = $_FILES['image']['name'];
                if($image_name!="")
                {
                    //auto renaming image
                    //get extension of our image
                    $ext = end(explode('.',$image_name));
                    //rename image
                    $image_name = "Food_Category_".rand(000,999).'.'.$ext;


                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/".$image_name;

                    //finally upload image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether image is uploaded or not
                    //and if not uploaded then we will stop the process and redirect with error message

                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                        header('location:' . SITEURL . 'admin/add-category.php');
                        die();
                    }
                }
               
            }
            else
            {
                //don't upload image and set the image name value as blank
                $image_name = "";
            }

            //sql query
            $sql = "INSERT INTO tbl_category SET title='$title',image_name='$image_name',featured='$featured',active='$active'";
            $res = mysqli_query($conn, $sql);
            if($res==true)
            {
                $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
                

            }
            else
            {
                $_SESSION['add'] = "<div class='error'>Failed to add Category</div>";
                header('location:' . SITEURL . 'admin/add-category.php');

            }
        }
        ?>
    </div>
</div>




<?php include('partials/footer.php');?>