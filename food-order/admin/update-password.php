<?php include('partial/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        
        <br><br>

        <?php

            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Old Password:</td>
                        <td><input type="password"  name="current_password" placeholder="current Password">
                        </td>
                    </tr>

                    <tr>
                        <td>New Password:</td>
                        <td>
                            <input type="password" name="new_password" placeholder="New Password">

                        </td>
                    </tr>

                    <tr>
                        <td>Confirm Password:</td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan= "2">
                            <input type="hidden" name="id" value="<?php echo $id;?>"/>
                            <input type="submit" name="submit"  value="Change Passwod"class="btn-secondary">
                        </td>
                    </tr>
                </table>
        </form>
    </div>
</div>

<?php include('partial/footer.php');?>

<?php



            if(isset($_POST['submit']))
            {

                $id=$_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);

                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                $res = mysqli_query($conn, $sql);

                    if($res==true)
                    {
                        $count = mysqli_num_rows($res);

                        if($count==1)
                        {

                            if($new_password==$confirm_password)
                            {
                                $sql2="UPDATE tbl_admin SET
                                    password='$new_password'
                                    WHERE id=$id 
                                    ";

                                    $res2= mysqli_query($conn, $sql2);

                                    if($res2==true)
                                    {
                                        $_SESSION['change_pass'] = "<div class='success'>Password Changed Successfully.</div>";
                                        header("location:".SITEURL.'admin/manage-admin.php');
                                    }
                                    else
                                    {
                                        $_SESSION['Failed_pass'] = "<div class='error'>Failed to Changed Password.</div>";
                                        header("location:".SITEURL.'admin/manage-admin.php');
                                    }
                            }
                            else
                            {
                                $_SESSION['pass_not_match'] = "<div class='error'>Password Did Not Match.</div>";
                                header("location:".SITEURL.'admin/manage-admin.php');
                            }
                        }
                        else
                        {
                            $_SESSION['User_not_found'] ="<div class='error'>User Not Found.</div>";
                            header("location:".SITEURL.'admin/manage-admin.php');
                        }
                    }


            }
?>