<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php
            //1.Get the id of selected admin
        $id = $_GET['id'];

            //2.create sql query to get details
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        //3.Check that query is executed or not
        if($res==true)
        {
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //get details
               // echo 'Admin Available';
                $row = mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $username = $row['username'];
            }
            else
            {
                //redirect to manage admin page
                header('location:' . SITEURL .' admin/manage-admin.php');
            }
        }
        
        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>

                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Userame:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">

                    </td>
                </tr>
                
                
            </table>

        </form>
    </div>
</div>

<?php
    //onclicking submit then update
    if(isset($_POST['submit']))
    {
    //echo "Button clicked";
    //get all the value from form to update
     $id = $_POST['id'];
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];

     //Create a sql query to update admin
     $sql = "UPDATE tbl_admin SET full_name = '$full_name', username='$username' WHERE id='$id' ";
     $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully </div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error' Admin cannot be updated Please Try Again </div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }

    }
?>


<?php include('partials/footer.php');?>