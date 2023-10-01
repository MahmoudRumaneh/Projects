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
$select = 'select * from product where id in (73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88)';
$query = mysqli_query($conn, $select);
?>
<DOCTYPE html>
    <html>
        <head> 
            <link href="style.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Vegetarian Page | BeeHealthy</title>
         </head>
         <body>
         <?php require 'header-log-out.php'?>   
         <!--
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
             <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
             <section class="cont">-->
                 <div class="product-text"><h3>Home-Diets-Vegetarain</h3></div>
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
                    <img class ="photo" src="pictures/73.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/74.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/75.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/76.jpeg" alt="" style="width: 250px;">
                    <span class="photo-description" ><h4>Gluten Free Organic Instant Yeast<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 12$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Organic Fruit Candy Vegan<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Organic mint candy vegan<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 10$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Black truffle oil light concentrate<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 5$</h4></button>
                    </span>

                    <img class="photo" src="pictures/77.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/78.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/79.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/80.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>White Truffle Oil Light Concentrate<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Jelly agar agar<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Vegan golden milk<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Vegetarian Labneh<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    
                    <img class="photo" src="pictures/81.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/82.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/83.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/84.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Vegetable gardenra stacked<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Vegan baked beans<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Vegetarian Labneh With Tomato<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Calcium Almond Drink<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>  

                    <img class="photo" src="pictures/85.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/86.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/87.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/88.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Vegetable jelly with mango flavor<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>75% Vegan organic chocolate<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Vegan cashew cheese<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic veggie burger<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>  -->
                </div>
             </section>
             <?php require "footer.php" ?>
         </body>  
    </html> 