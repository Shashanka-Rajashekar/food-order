<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter your Name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>


<?php include('partials/footer.php');?>

<?php 
  //Process the value from form and save it into database
  //Check wherher the button is clicked
  if(isset($_POST['submit']))
  {
    // Button Clicked
    //1.Get data from the form
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];
     $password = md5($_POST['password']);   //md5=Password Encryption 

     //2.SQL query to Save data from database
    $sql = "INSERT INTO tbl_admin SET 
    full_name='$full_name',
    username='$username',
    password='$password'
    ";
   
     //3.Execute Query and save database
     $res = mysqli_query($conn,$sql) or die(mysqli_error());

     //4.Check whether the Query is executed or not and display appropriate message
      if($res==TRUE)
    {
     //Data inserted
        //echo "Data Inserted";
        //create a session variable to display message
        $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
        //redirect page
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to insert data
       // echo "Failed to insert the data";
       //create a session variable to display message
       $_SESSION['add'] = "<div class='error'>failed to add admin</div>";
       //redirect page
       header("location:".SITEURL.'admin/add-admin.php');
    }

  }
  else
  {
     //Button not clicked
     
  }
?>