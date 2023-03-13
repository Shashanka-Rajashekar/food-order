<?php include('partials-front/menu.php') ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- Transition starts from here-->
    
  <section class="st">
    <div class="slideshow-container" id="home">
        <br><br><br>
            <div class="mySlides fade">
                <img src="images/st-1.png" width="100%" >
            </div>
        
            <div class="mySlides fade">
                <img src="images/st-3.png" style="width:100%"  >
            </div>
        
            <div class="mySlides fade">
                <img src="images/st-2final.png" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="images/st-4final.png" style="width:100%; height: 50%;">
            </div>
            <div class="mySlides fade">
                <img src="images/st-6final.png" style="width:100%; height: 40%;">
            </div>
        
        
        </div>
        
        <br><br><br>
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <br><br><br>
</section>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 4000);
    }
    </script>
    
    
  
    
    <!-- Transition ends here-->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
                //create sql to display category from db
            $sql = "SELECT * FROM tbl_category WHERE active='yes' AND featured='yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    <a href="category-foods.php">
                         <div class="box-3 float-container">
                            <?php
                                if($image_name=="")
                                {
                                echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    ?>
                                      <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                                    <?php

                                }
                            ?>
                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                        </div>
                     </a>

                    <?php
                }
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
                $sql2 = "SELECT * FROM tbl_food WHERE active='yes' AND featured='yes' LIMIT 6";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
                if($count2>0)
                {
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description=$row['description'];
                        $image_name=$row['image_name'];
                         ?>
                           <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_name=="")
                                    {
                                        echo "</div class='error'>Image not available</div>";

                                    }
                                    else
                                    {
                                        ?>
                                         <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price">₹<?php echo $price;?></p>
                                <p class="food-detail">
                                    <?php echo $description;?>
                                </p>
                                <br>

                                <a href="order.php" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php

                    }
                }
                else
                {
                    echo "<div class='error'>Food Not Available</div>";
                }
            ?>
         
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php') ?>