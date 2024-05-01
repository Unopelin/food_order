<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Food</h2>
        <?php
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 2";

                $res = mysqli_query($conn, $sql);
                $count =  mysqli_num_rows($res);

                if ($count > 0)
                {
                    while ($row = mysqli_fetch_assoc($res)) 
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                            <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container"> 

                                    <?php 
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>Image Not Available.</div>";

                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                                
                                            <?php
                                        }
                                    ?>


                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                   
                                </div>
                            </a> 
                        
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Category Not Added</div>";
                }         
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if ($count2>0)
                {
                    while ($row=mysqli_fetch_assoc($res2))
                    {

                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];

                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_name=="")
                                    {
                                        echo "<div class='error>Image NOT Available.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src= "<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"alt="" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>

                                 </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price"><?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="order-food1.html" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>


                        <?php
                    }

                }
                else 
                {
                    echo "<div class='error'>Food Not Available.</div>";
                }
            ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="category-foods.html">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- Drinks MEnu Section Starts Here -->
<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Drinks</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-mocha.jpg" alt="Mocha" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Mocha</h4>
                    <p class="food-price">₱60</p>
                    <p class="food-detail">
                        A combination of earthy and grassy notes.
                    </p>
                    <br>

                    <a href="order-drink1.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-cookies.jpg" alt="Cookies & Cream" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Cookies & Cream</h4>
                    <p class="food-price">₱60</p>
                    <p class="food-detail">
                        Smooth with a crunchy experience.
                    </p>
                    <br>

                    <a href="order-drink2.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-strawberry.jpg" alt="Strawberry" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Strawberry</h4>
                    <p class="food-price">₱60</p>
                    <p class="food-detail">
                        Sweet, natural taste of fresh strawberries.
                    </p>
                    <br>

                    <a href="order-drink3.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-wintermelon.jpg" alt="Wintermelon" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Wintermelon</h4>
                    <p class="food-price">₱60</p>
                    <p class="food-detail">
                        Sweet and a little vegetal.
                    </p>
                    <br>

                    <a href="order-drink4.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="category-drinks.html">See All Drinks</a>
        </p>
    </section>
    <!-- Drinks Menu Section Ends Here -->
    

<?php include('partials-front/footer.php'); ?>