<?php include('../config/constrants.php'); ?>


<html>
    <head>
        <title>Login - Food ordering Website</title>
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>
        <section>
        <div class="form-container">
            <h1 class="text-center">Login</h1>
            <br>
            <?php
                if(isset($_SESSION['login']))
                {
                  echo $_SESSION['login'];
                  unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                  echo $_SESSION['no-login-message'];
                  unset($_SESSION['no-login-message']);
                }
            ?>
           <br>
            <form action="" method="post" class="text-center">
                <div class="control">
                     <label>Username:</label>
                    <input type="text" name="username" placeholder="Enter Username">
                </div>
                <div class="control">
                    <label>Password:</label> 
                    <input type="password" name="password" placeholder="Enter password">
                </div>
                <br>
                <div class="control">
               <input type="submit" name="submit" value="Login">
               </div>
                <br><br><br>

            </form>

                <div class="link">
                    Created By - <a href="#">Twilight
                 </div>
        </div>
        </section>
    </body>
</html>

<?php 
    //check whether submit is clicked
    if(isset($_POST['submit']))
    {
        //1.get data from form
         $username = $_POST['username'];
         $password =md5($_POST['password']);
         //2.check whether username and password exists or not
         $sql = "SELECT * FROM tbl_admin WHERE username ='$username' AND password ='$password'";
        $res = mysqli_query($conn, $sql);

         $count = mysqli_num_rows($res);
        if($count==1)
        {
             $_SESSION['login'] = "<div class='success'>Login Successful</div>";
             $_SESSION['user'] = $username; //checks whether the user logged in or noy

             header('location:' . SITEURL . 'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match</div>";
            header('location:' . SITEURL . 'admin/login.php');
        }


    }
 

?>

