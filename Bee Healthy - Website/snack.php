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
$select = 'select * from product where id in (41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56)';
$query = mysqli_query($conn, $select);
?>
<DOCTYPE html>
    <html>
        <head> 
            <link href="style.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Snack Page | BeeHealthy</title>
         </head>
         <body>
         <?php require 'header-log-out.php'?>   

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
             <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
             <section class="cont">
                 <div class="product-text"><h3>Home-Meal Type-Sanck</h3></div>
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
                    <img class ="photo" src="pictures/41.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/42.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/43.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/44.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description" ><h4>Snack bar with almonds<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 12$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Cocoa and maca balls<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Special Mix Pancake<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 10$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Cake with cocoa cream and hazelnut<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 5$</h4></button>
                    </span>

                    <img class="photo" src="pictures/45.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/46.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/47.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/48.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Gluten Free Rosemary Crackers<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Prepared sweet chili potato chips<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Vegan white chocolate wafer<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Pistachio protein donut<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    
                    <img class="photo" src="pictures/49.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/50.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/51.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/52.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Fine raw cocoa with hazelnut<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Wheat Cake<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Farrow Cake<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Muffin with cocoa<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>  

                    <img class="photo" src="pictures/53.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/54.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/55.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/56.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Organic Fruit Candy Vegan<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic mint candy vegan<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Snack bar with pomegranate<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Unroasted Cashews<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>  -->
                </div>
             </section>
                 <?php require "footer.php" ?>
         </body>  
    </html> 