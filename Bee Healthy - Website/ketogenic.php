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
$select = 'select * from product where id in (57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72)';
$query = mysqli_query($conn, $select);
?>
<DOCTYPE html>
    <html>
        <head> 
            <link href="style.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Ketogenic Page | BeeHealthy</title>
         </head>
         <body>

         <?php require 'header-log-out.php'?>    
            <!--
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
             <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>-->
             <section class="cont">
                 <div class="product-text"><h3>Home-Diets-Ketogenic</h3></div>
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
                    <img class ="photo" src="pictures/57.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/58.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/59.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/60.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description" ><h4>Green Cola Cherry Soft Drink<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 12$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Coconut Milk Vegetable Cooking Cream<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Green cola orange soft drink<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 10$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Green Cola Mojito Soft Drink<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 5$</h4></button>
                    </span>

                    <img class="photo" src="pictures/61.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/62.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/63.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/64.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Organic MCT Coconut Oil Spray<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Peanut Cake Flavored Protein Balls<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Keto Organic Vegetable Ghee<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic keto rice<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    
                    <img class="photo" src="pictures/65.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/66.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/67.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/68.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Organic Keto Noodles<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Xylitol Powder<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Coconut Milk<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Coconut Oil<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>  

                    <img class="photo" src="pictures/69.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/70.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/71.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/72.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Organic extra virgin olive oil spray<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic avocado oil spray<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Chickpea bread<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic flax oil<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span> -->  
                </div>
             </section>

             <?php require "footer.php" ?>
         </body>  
    </html> 