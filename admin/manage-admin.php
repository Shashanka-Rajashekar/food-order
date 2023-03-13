<?php include('partials/menu.php');?>
<link rel="stylesheet" href="../css/admin.css">
        <!-- Main Content Section starts-->
        <div class="main-content">
            <div class="wrapper">
             <h1>Manage Admin</h1>
             <br> <br> 


            <?php 
               if(isset($_SESSION['add']))
               {
                echo $_SESSION['add'];
                unset($_SESSION['add']); //removing session message
               }
               if(isset($_SESSION['delete']))
               {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']); //removing session message
               }
               if(isset($_SESSION['update']))
               {
                echo $_SESSION['update'];
                unset($_SESSION['update']); //removing session message
               }
               if(isset($_SESSION['user-not-found']))
               {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']); //removing session message
               }
               if(isset($_SESSION['password-matched']))
               {
                echo $_SESSION['password-matched'];
                unset($_SESSION['password-matched']); //removing session message
               }
              
            ?>
            <br><br>

        <!--Button to add admin-->
         <a href="add-admin.php" class="btn-primary">Add admin</a>
         <br> <br> <br>


        <table class="tbl-full">
         <tr>
            <th>Sl.No</th>
            <th>Full name</th>
            <th>Username</th>
            <th>Actions</th>
         </tr>

         <?php 
         //to display data from db in the page
         $sql = "SELECT * FROM tbl_admin";
         //execute the query
         $res = mysqli_query($conn, $sql);

         //check whether the query is executed or not
         if($res==true)
         {
            //count rows
             $count = mysqli_num_rows($res);

             $sn = 1;

             if($count>0)
             {
                while($rows=mysqli_fetch_assoc($res))
                {
                    //get individual data
                     $id = $rows['id'];
                     $full_name = $rows['full_name'];
                     $username = $rows['username'];
                    
                     //display the values in our table
                     ?>

                    <tr>
                         <td><?php echo $sn++; ?>.</td>
                         <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                     <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update admin </a>
                     
                     <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-tertiary">Delete admin </a>  
                        </td>
                     </tr>

                     <?php
                }
             }
             else
             {

             }
         }
         ?>


        </table>

            </div>
        </div>
        <!-- Main Content Section ends-->

<?php include('partials/footer.php');?>