<?php include("partial/menu.php") ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /> <br />
        <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset ($_SESSION['add']);
                }
        ?>

        <form action=""method="POST">

            <table class="tbl-30">
                <tr>
                    <td>fullname:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Your username"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="password" name="password" placeholder="Your password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="Submit" value="add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>



<?php include("partial/footer.php") ?>


<?php 
    if(isset($_POST['Submit'])) {
         $full_name = $_POST['full_name'];
         $username = $_POST['username'];
         $password = md5($_POST['password']);

         $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
         ";

         $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
         if ($res == TRUE)
         {
            //echo("Data Inserted");
            $_SESSION['add'] = "added successfully";
            header("Location:".SITEURL.'admin/manage-admin.php');
         }

         else
         {
            //echo("failed to insert data");
            $_SESSION['add'] = "failed to add";
            header("Location:".SITEURL.'admin/add-admin.php');
        }
    }
    

?>