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
$select = 'select * from product where id in (9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)';
$query = mysqli_query($conn, $select);
?>
<DOCTYPE html>
    <html>
        <head> 
            <link href="style.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Breakfast Page | BeeHealthy</title>
         </head>
         <body>
            <?php
                    require 'header-log-out.php';
              ?>
             <section class="cont">
                 <div class="product-text"><h3>Home-Meal Type-Breakfast</h3></div>
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
                    <img class ="photo" src="pictures/9.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/10.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/11.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/12.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description" ><h4>Hazelnut cream with chocolate<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 12$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Hazelnut cream with carob<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Organic Chocolate Granola<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 10$</h4></button>
                    </span>
                    <span class="photo-description" ><h4>Organic Quinoa Chips<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 5$</h4></button>
                    </span>

                    <img class="photo" src="pictures/13.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/14.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/15.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/16.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Clearspring organic blackberry jam<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Clearspring Sugar Free Organic Strawberry Jam<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Assorted nut butter<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Gluten free oat flakes<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>
                    
                    <img class="photo" src="pictures/17.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/18.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/19.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/20.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Organic marmalade<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Vegan cheese cubes<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Chocolate Corn Rice Balls<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic cocoa rice chips<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>  

                    <img class="photo" src="pictures/21.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/22.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/23.jpeg" alt="" style="width: 250px;">
                    <img class="photo" src="pictures/24.jpeg" alt="" style="width: 250px;">
                    
                    <span class="photo-description"><h4>Organic kiwi jam<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 7$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic apricot jam<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 11$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Coconut Cream<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 8$</h4></button>
                    </span>
                    <span class="photo-description"><h4>Organic Nut Butter<br>
                    <button class="btn" style="width: 100px;"><i class="fa fa-cart-plus"></i> 6$</h4></button>
                    </span>  
                -->
                </div>
             </section>
             <?php require "footer.php" ?>
         </body>  
    </html> 