<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require ('database/Product.php');

// require Cart Class
require ('database/Cart.php');

//require Ad Class
require ('database/Ads.php');

//require Blog Class
require ('database/Blog.php');

//require User Class
require ('database/User.php');

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();


//ad object
$ads = new ad($db);
$ads_shuffle = $ads->getData();

//blog object
$blog = new blog($db);
$blog_shuffle = $blog->getData();

// Cart object
$Cart = new Cart($db );
