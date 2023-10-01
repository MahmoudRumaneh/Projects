<?php
require 'connection.php';
session_start();
// unset($_SESSION['cartData']);
// unset($_SESSION['total']);
$productId = isset($_GET['addProductToCart']) ? $_GET['addProductToCart'] : '';
if (!empty($productId)) {
    $cartData = isset($_SESSION['cartData']) ? $_SESSION['cartData'] : array();
    if (!empty($cartData[$productId])) {
        $cartData[$productId]['qty']++;
    } else {
        $select = 'select * from product where id=' . $productId . '';
        $query = mysqli_query($conn, $select);
        $data = mysqli_fetch_assoc($query);
        $cartData[$productId] = $data;
        $cartData[$productId]['qty'] = 1;
    }
    $_SESSION['cartData'] = $cartData;
    $_SESSION['total'] = isset($_SESSION['total']) ? $_SESSION['total'] : 0;
    $_SESSION['total'] += ($cartData[$productId]['price']);
}
// print_r($_SESSION);
$select = 'select * from product where id in (121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136)';
$query = mysqli_query($conn, $select);
?>
<DOCTYPE html>
    <html>
        <head> 
            <link href="offers-style.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Offers Page | BeeHealthy</title>
         </head>
         <body>
         <?php require 'header-log-out.php'?>   
            <!--<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
             <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>-->
             <section class="cont">
                 <div class="product-text"><h3>Home-Offers</h3></div>
                <div class="product-photos-container">
                    <?php
                        while ($row = mysqli_fetch_assoc($query)) {
                            $data = '';
                            $data .= '<form method="GET" class="card"> <img class="photo" src="' . $row['image'] . '" alt="" style="width: 250px;">';
                            $data .= ' <span class="photo-description">
                            <h4>' . $row['name'] . '<br>
                                <button type="submit" name="addProductToCart" value="' . $row['id'] . '" class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> ' . $row['price'] . '
                            $</h4></button>
                        </span>
                        </form>';
                            echo $data;
                        }
                        ?>
                        <!--
                    <img class ="photo" src="pictures/121.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/122.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/123.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/124.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description" ><h4>Sunblast organic orange juice<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 2.5$<h4 class="offer"> 5$</div></h4></button>
                    </span>
                    <span class="photo-description" ><h4>Kinder Chocolate Protein Donut<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 5.5$<h4 class="offer"> 11$</h4></div></h4></button>
                    </span>
                    <span class="photo-description" ><h4>Coffee latte 2 in 1<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 5.5$<h4 class="offer"> 11$</h4></div></h4></button>
                    </span>
                    <span class="photo-description" ><h4>Cashew butter<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 5.5$<h4 class="offer"> 11$</h4></div></h4></button>
                    </span>

                    <img class="photo" src="pictures/125.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/126.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/127.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/128.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Natural cranberry syrup<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 3$<h4 class="offer"> 6$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic sage leaf<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 3$<h4 class="offer"> 6$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Smoked barbeque<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 3.5$<h4 class="offer"> 7$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Honey-coated corn rings<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 3.5$<h4 class="offer"> 7$</h4></div></h4></button>
                    </span>
                    
                    <img class="photo" src="pictures/129.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/130.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/131.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/132.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Hot organic ketchup<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 4$<h4 class="offer"> 8$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Baking soda<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 3$<h4 class="offer"> 6$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Black truffle oil light concentrate<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 2.5$<h4 class="offer"> 5$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Vegetarian Labneh<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 3$<h4 class="offer"> 6$</h4></div></h4></button>
                    </span>  

                    <img class="photo" src="pictures/133.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/134.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/135.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/136.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Vegetarian Labneh With Tomato<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 4$<h4 class="offer"> 8$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Green Cola Mojito Soft Drink<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 2.5$<h4 class="offer"> 5$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic keto rice<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 3$<h4 class="offer"> 6$</h4></div></h4></button>
                    </span>
                    <span class="photo-description"><h4>Chickpea bread<br>
                    <button class="btn" style="width: 220px;"><i class="fa fa-cart-plus"></i>
                        <div class="dis"> 4$<h4 class="offer"> 8$</h4></div></h4></button>
                    </span>  
                </div>-->
             </section>
             <?php require "footer.php" ?>
         </body>  
    </html> 