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
$select = 'select * from product where id in (25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40)';
$query = mysqli_query($conn, $select);
?>
<DOCTYPE html>
    <html>
        <head> 
            <link href="style.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Main Meal Page | BeeHealthy</title>
         </head>
         <body>
            <?php require 'header-log-out.php'?>      
            <!--
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
             <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>-->
             <section class="cont">
                 <div class="product-text"><h3>Home-Meal Type-Main meal</h3></div>
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
                    <img class ="photo" src="pictures/25.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/26.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/27.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/28.jpeg" alt="" style="width: 250px;">
                    <span class="photo-description" ><h4>Roasted oat flakes<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 12$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Gluten free brownie mix<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Ceylon cinnamon powder<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 10$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Coarse sea salt 1 kg<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 5$</h4></button>
                    </span>

                    <img class="photo" src="pictures/29.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/30.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/31.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/32.jpeg" alt="" style="width: 250px;">
                    <span class="photo-description"><h4>Organic mung bean<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic green lentils<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic black pepper powder<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic black lemon<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    
                    <img class="photo" src="pictures/33.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/34.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/35.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/36.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Organic ginger grit<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic hummus<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Balsamic Vinegar<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Brownie mix<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>  

                    <img class="photo" src="pictures/37.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/38.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/39.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/40.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Organic black rice<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic clove<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Wooden chopsticks<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic apple cider vinegar<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span> --> 
                </div>
             </section>
             <?php require "footer.php" ?>
         </body>  
    </html> 