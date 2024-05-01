<?php include('partial/menu.php');?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
             <div class="wrapper">
                 <h1>Manage Admin</h1>

                 <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset ($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['User_not_found']))
                    {
                        echo $_SESSION['User_not_found'];
                        unset($_SESSION['User_not_found']);
                    }

                    if(isset($_SESSION['pass_not_match']))
                    {
                        echo $_SESSION['pass_not_match'];
                        unset($_SESSION['pass_not_match']);
                    }

                    if(isset($_SESSION['change_pass']))
                    {
                        echo $_SESSION['change_pass'];
                        unset($_SESSION['change_pass']);
                    }

                    if(isset($_SESSION['Failed_pass']))
                    {
                        echo $_SESSION['Failed_pass'];
                        unset($_SESSION['Failed_pass']);
                    }
                   
                 ?>
                 <br />  <br />
                
                 <a href="add-admin.php" class="btn-primary">Add Admin</a>

                 <br /> <br /> <br />

                 <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>

                    </tr>

                    <?php
                        $sql ="SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);

                        if($res == TRUE)
                        {
                            $count = mysqli_num_rows($res);

                            $sn = 1;
                            
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    ?>
                                    
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>"class="btn-primary">Change Password"</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>"class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                            
                        }
                    ?>
                  
                 </table>

               
             </div>
        </div>
        <!-- Main Content Section Ends --> 
<?php include('partial/footer.php'); ?>