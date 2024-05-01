<?php include('partial/menu.php');?>

<html>
    <head>
        <title>Food Order Website - Home Page</title>
    
        <link rel= "stylesheet" href="../css/admin.css">

    </head>

    <body>

        <!-- Main Content Section Starts -->
        <div class="main-content">
             <div class="wrapper">
                 <h1>DASHOARD</h1>
                 <br> <br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset ($_SESSION['login']);
                    }
                ?>
                    <br> <br>
                    
                 <div class="col-4 text-center">
                    <h1>5</h1>
                    <br />
                    Categories
                 </div>
                 <div class="col-4 text-center">
                    <h1>5</h1>
                    <br />
                    Categories
                 </div>
                 <div class="col-4 text-center">
                    <h1>5</h1>
                    <br />
                    Categories
                 </div>
                 <div class="col-4 text-center">
                    <h1>5</h1>
                    <br />
                    Categories
                 </div>

                 <div class="clearfix"></div>
             </div>
        </div>
        <!-- Main Content Section Ends --> 
        
<?php include('partial/footer.php');?>