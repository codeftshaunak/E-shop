<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans&family=Lexend+Deca&family=Livvic&display=swap');
    </style>
    <!-- Owl Carosal -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- Aws library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="./css/style.css">
    <?php
    // require functions.php file
    require ('../functions.php');
    ?>

    <title>Yash Blog</title>


</head>

<body>
    <!-- Navigation Start -->
    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray">Blog</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <div class="nav-item">
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="../">Shop</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Catagorty</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="social text-gray">
                <div class="sc">
                    <a href="#"> <i class="fab fa-facebook-f"></i></a>
                    <a href="#"> <i class="fab fa-instagram"></i></a>
                    <a href="#"> <i class="fab fa-twitter"></i></i></a>
                    <a href="#"> <i class="fab fa-youtube"></i></i></a>
                    <a href="#"> <i class="fab fa-linkedin-in"></i></a>

                </div>

            </div>
        </div>
    </nav>

    <!-- Navigation End -->


    <!-- Main start -->
    <main>

        <!-- Site Title -->
        <section class="site-title" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">>
            <div class="site-background">
                <h3>Tours & Travels</h3>
                <h1>Amazing Place On Earth</h1>
                <button class="btn">Let's Log In</button>
            </div>
        </section>
        <!-- Site Title end -->



        <!-- Blog Carosule -->
        <section>
            <div class="blog" data-aos="fade-right" data-aos-duration="500">
                <div class="container">
                    <div class="owl-carousel owl-theme blog-post">
                        <?php foreach ($blog_shuffle as $item) { ?>
                        <div class="blog-content" data-aos="flip-left" data-aos-duration="2000">
                            <img src="<?php echo './admin/assets/'.$item['image']; ?>" alt="product1"
                                class="img-fluid p-3">
                            <div class="blog-title">
                                <h3><?php echo $item['title'] ?></h3>
                                <button class="btn btn-blog"><?php echo $item['category'] ?></button>
                                <span><?php echo $item['date'] ?></span>
                            </div>
                        </div>
                        <?php } // closing foreach function ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Carosule End -->


        <!-- Site content -->


        <section class="container">
            <div class="site-content">
                <div class="post">
                    <?php foreach ($blog_shuffle as $item) { ?>
                    <div class="post-content">
                        <div class="post-image" data-aos="zoom-in-left" data-aos-anchor-placement="center-bottom"
                            data-aos-duration="1000">
                            <div>
                                <img src="<?php echo './admin/assets/'.$item['image']; ?>" alt="product1"
                                    class="img-fluid p-3"> </div>
                            <div class="post-info">
                                <!-- <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span> -->
                                <span><i
                                        class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;<?php echo $item['date'] ?></span>
                                <!-- <span>2 Comments</span> -->
                            </div>
                        </div>
                        <div class="post-title" data-aos="flip-left" data-aos-anchor-placement="center-bottom"
                            data-aos-duration="2000">
                            <a href="#"> <?php echo $item['title'] ?> </a>
                            <div class="pg">
                                <p><?php echo $item['description'] ?></p>
                                <button class="btn post-btn">Read More &nbsp;<i class="fas fa-arrow-right"></i></button>
                            </div>


                        </div>
                    </div>
                    <hr>
                    <?php } // closing foreach function ?>

                    <div class="pagination flex-row" data-aos="zoom-in" data-aos-anchor-placement="center-bottom"
                        data-aos-duration="1000">
                        <a href="#"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="pages">1</a>
                        <a href="#" class="pages">2</a>
                        <a href="#" class="pages">3</a>
                        <a href="#"><i class="fas fa-chevron-right"></i></a>
                    </div>

                </div>
                <aside class="sidebar">
                    <div class="catagory">
                        <h2>Category</h2>
                        <ul class="category-list">
                            <?php foreach ($blog_shuffle as $item) { ?>
                            <li class="list-items" data-aos="fade-left" data-aos-duration="200">
                                <a href="#"><?php echo $item['category']; ?></a>
                                <!-- <span>(05)</span> -->
                            </li>
                            <?php } //closeing foreach function ?>
                        </ul>
                    </div>

                    <div class="popular-post">
                        <h2>Popular Post</h2>
                        <?php foreach ($blog_shuffle as $item) { ?>
                        <div class="post-content" data-aos="flip-up" data-aos-duration="200">
                            <div class="post-image">
                                <div>
                                    <img src="<?php echo './admin/assets/'.$item['image']; ?>" alt="product1"
                                        class="img-fluid p-3">
                                </div>
                                <div class="post-info">
                                    <span><i
                                            class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;<?php echo $item['date']; ?></span>
                                    <!-- <span>2 Comments</span> -->
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#"><?php echo $item['title']; ?>
                                </a>
                            </div>
                        </div>
                        <?php } //closeing foreach function ?>



                        <div class="newsletter" data-aos="fade-up" data-aos-duration="300">
                            <h2>Newsletter</h2>
                            <div class="form-element">
                                <input type="text" placeholder="Email" class="input-element">
                                <button class="btn form-btn">Subscribe</button>
                            </div>
                        </div>



                        <div class="popular-tags">
                            <h2>Popular Tags</h2>
                            <div class="tags flex-row">
                                <span class="tag" data-aos="flip-up" data-aos-duration="400">
                                    Software
                                </span>
                                <span class="tag" data-aos="flip-up" data-aos-duration="500">
                                    Project
                                </span>
                                <span class="tag" data-aos="flip-up" data-aos-duration="600">
                                    Travels
                                </span>
                                <span class="tag" data-aos="flip-up" data-aos-duration="700">
                                    Technology
                                </span>
                                <span class="tag" data-aos="flip-up" data-aos-duration="800">
                                    Love
                                </span>
                                <span class="tag" data-aos="flip-up" data-aos-duration="900">
                                    Illution
                                </span>
                            </div>
                        </div>
                </aside>
            </div>
        </section>
        <!-- Site content End -->

    </main>
    <!-- Main End -->







    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-duration=" 900">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quas atque unde mollitia! Aspernatur
                    quibusdam quae reiciendis dicta placeat perferendis!</p>
            </div>

            <div class="newsletter" data-aos="fade-right" data-aos-duration="200">
                <h2>Newsletter</h2>
                <p>Stay Update with our letest</p>
                <div class="form-element">
                    <input placeholder="Email" type="text"><span><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>

            <div class="instagram" data-aos="fade-right" data-aos-duration="200">
                <h2>Instagram</h2>
                <div class="flex-row">
                    <img src="./assets/instagram/thumb-card3.png" alt="">
                    <img src="./assets/instagram/thumb-card4.png" alt="">
                    <img src="./assets/instagram/thumb-card5.png" alt="">
                </div>
                <div class="flex-row">
                    <img src="./assets/instagram/thumb-card6.png" alt="">
                    <img src="./assets/instagram/thumb-card7.png" alt="">
                    <img src="./assets/instagram/thumb-card8.png" alt="">
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-duration="200">
                <h2> Follow Us</h2>
                <p>Les us be social</p>
                <div>
                    <a href="#"> <i class="fab fa-facebook-f"></i></a>
                    <a href="#"> <i class="fab fa-instagram"></i></a>
                    <a href="#"> <i class="fab fa-twitter"></i></i></a>
                    <a href="#"> <i class="fab fa-youtube"></i></i></a>
                    <a href="#"> <i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="rights flex-row">
            <h4 class="text-gray">
                Copyright &#169;2020 All rights reserved | made by Yash Kd(Sagar)
            </h4>
        </div>

        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>

    <!-- Footer End -->





    <!-- Custom Javascript -->

    <!-- Jquary -->
    <script src="./js/Jquery3.5.1.min.js"></script>
    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/46c4a96ca4.js" crossorigin="anonymous"></script>

    <!-- Owl javascript -->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- Aws libray animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <!-- main js file -->
    <script src="./js/me.js"></script>

    <!-- Custom Javascript End -->

    <!--Istop fillter-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <script>
        $(".post-btn").on('click', function () {
            $(this).parent().toggleClass("pgg");

            var txt = $(this).parent().hasClass("pgg") ? "Read Less" : "Read More";
            $(this).text(txt);
        });
    </script>


</body>

</html>