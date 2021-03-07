<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <!-- Google font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans&family=Lexend+Deca&family=Livvic&display=swap');
    </style>
    <link rel="stylesheet" href="./assets/css/shop.css">
    <title>Shop</title>


</head>

<body>
    <!-- Navigation Start -->
    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray">Shop</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <div class="nav-item">
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="./Blog">Blog</a>
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



    <div>
        <div>
            <div class="col-md-12 p-5">
                <h1>Banner</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>Elecrtronics</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>Fashion</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>Special Offer</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>Books</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>Daily Products</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>Office And School Supply</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>Sketch on Demand</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>You Might Also Like</h1>
            </div>


            <div class="col-md-12 p-5">
                <h1>Beuty And Health</h1>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
            <input class="search_input" type="text" name="" placeholder="Search...">
            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
    </div>

    <script src="./Blog/js/Jquery3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/46c4a96ca4.js" crossorigin="anonymous"></script>
    <script>
        $NAV = $('.nav');
        $ICON = $('.toggle-icons i');

        $ICON.click(function () {
            $NAV.toggleClass('collapse')
        })
    </script>
</body>

</html>