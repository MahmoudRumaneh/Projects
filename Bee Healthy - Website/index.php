
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
$select = 'select * from product where id in (1,2,3,4,5,6,7,8)';
$query = mysqli_query($conn, $select);
?>
<DOCTYPE html>
    <html>
        <head>
            
            <link href="index-style.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Home Page | BeeHealthy</title>
         </head>
         <body>
             <?php

             require 'header-sign-in-register.php';
             ?>   
        
             <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
             <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
             <section class="cont">
                 <div class="best-selling-text"><h3>Home-BestSelling</h3></div>
                 <div class="best-selling-photos-container">
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    $data = '';
                    $data .= '<form method="GET" class="card"> <img class="photo" src="' . $row['image'] . '" alt="">';
                    $data .= ' <span class="photo-description">
                    <h4>' . $row['name'] . '<br><br>
                    <a href="register-sign-in-page.php" name="addProductToCart" value="' . $row['id'] . '" class="btn"><i class="fa fa-cart-plus"></i> ' . $row['price'] . '
                    $</h4></a><br>
                </span>
                </form>';
                    echo $data;
                }
                ?>
                <!--
                    <img class ="photo" src="pictures/1.jpeg" alt="">
                    <span class="photo-description" ><h4>Custard Powder Free-Sugar<br><br>
                    <a href="register-sign-in-page.php" class="btn" style="width: 100px;text-decoration: none;padding: 4px 27px;"><i class="fa fa-cart-plus"></i> 12$</h4></a>
                    </span>
                    <img class="photo" src="pictures/2.jpeg" alt="">
                    <span class="photo-description" ><h4>Whole Wheat Spiral Pasta<br><br>
                    <a href="register-sign-in-page.php" class="btn" style="width: 100px;text-decoration: none;padding: 4px 27px;"><i class="fa fa-cart-plus"></i> 6$</h4></a>
                    </span>
                    <img class="photo" src="pictures/3.jpeg" alt="">
                    <span class="photo-description" ><h4>Organic Sesame Oil<br><br>
                    <a href="register-sign-in-page.php" class="btn" style="width: 100px;text-decoration: none;padding: 4px 27px;"><i class="fa fa-cart-plus"></i> 10$</h4></a>
                    </span>
                    <img class="photo" src="pictures/4.jpeg" alt="">
                    <span class="photo-description" ><h4>Organic Yhyme Leaves<br><br>
                    <a href="register-sign-in-page.php" class="btn" style="width: 100px;text-decoration: none;padding: 4px 27px;"><i class="fa fa-cart-plus"></i> 5$</h4></a>
                    </span>

                    <img class="photo" src="pictures/5.jpeg" alt="">
                    <span class="photo-description"><h4>Buckwheat Fusilli Pasta<br><br>
                    <a href="register-sign-in-page.php" class="btn" style="width: 100px;text-decoration: none;padding: 4px 27px;"><i class="fa fa-cart-plus"></i> 7$</h4></a>
                    </span>
                    <img class="photo" src="pictures/6.jpeg" alt="">
                    <span class="photo-description"><h4>Organic Chickpeas<br><br>
                    <a href="register-sign-in-page.php" class="btn" style="width: 100px;text-decoration: none;padding: 4px 27px;"><i class="fa fa-cart-plus"></i> 11$</h4></a>
                    </span>
                    <img class="photo" src="pictures/7.jpeg" alt="">
                    <span class="photo-description"><h4>Cinnamon Sticks<br><br>
                    <a href="register-sign-in-page.php" class="btn" style="width: 100px;text-decoration: none;padding: 4px 27px;"><i class="fa fa-cart-plus"></i> 8$</h4></a>
                    </span>
                    <img class="photo" src="pictures/8.jpeg" alt="">
                    <span class="photo-description"><h4>Pea Protein Powder<br><br>
                    <a href="register-sign-in-page.php" class="btn" style="width: 100px;text-decoration: none;padding: 4px 27px;"><i class="fa fa-cart-plus"></i> 6$</h4></a>
                    </span>
                       
                </div>
             </section>-->

             <section class="customer-container">
                <div class="customer-feedback-text"><h3>Customer Feedback</h3></div>
                <div class="customer-feedback-photos-container">
                    <img class ="picture" src="pictures/1.png" alt="">
                    <img class="picture" src="pictures/2.png" alt="">
                    <img class="picture" src="pictures/3.png" alt="">
                </div>
             </section>
            <?php require "footer.php"?> 
         </body>  
    </html>