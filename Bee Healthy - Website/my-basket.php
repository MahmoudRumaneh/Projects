<?php
require 'connection.php';
session_start();
$remove = isset($_GET['remove']) ? $_GET['remove'] : '';
$plus = isset($_GET['plus']) ? $_GET['plus'] : '';
$minus = isset($_GET['minus']) ? $_GET['minus'] : '';
$cartData = isset($_SESSION['cartData']) ? $_SESSION['cartData'] : array();
if (!empty($remove)) {
    $_SESSION['total'] -= ($cartData[$remove]['price'] * $cartData[$remove]['qty']);
    unset($cartData[$remove]);
}
if (!empty($plus)) {
    $cartData[$plus]['qty']++;
    $_SESSION['total'] += $cartData[$plus]['price'];
}
if (!empty($minus)) {
    $_SESSION['total'] -= $cartData[$minus]['price'];
    if ($cartData[$minus]['qty'] - 1 < 1) {
        unset($cartData[$minus]);
    } else {
        $cartData[$minus]['qty']--;
    }
}
$_SESSION['cartData'] = $cartData;
if (isset($_GET['checkOut']) && !empty($_SESSION['cartData'])) {
    $select = 'insert into `order`(customer_id) values(' . $_SESSION['id'] . ')';
    $query = mysqli_query($conn, $select);

    $select = 'select id from `order` order by id desc limit 1';
    $query = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($query);
    $group_id = $data['id'];
    foreach ($_SESSION['cartData'] as $key => $value) {
        $select = 'insert into `order-item`(`order-id`,`product-id`,`quantity`) values(' . $group_id . ',' . $value['id'] . ',' . $value['qty'] . ')';
        $query = mysqli_query($conn, $select);
    }
    unset($_SESSION['cartData']);
    unset($_SESSION['total']);
}
?>
<DOCTYPE html>
    <html>

    <head>
        <style>
            html,
            body,
            div,
            span,
            applet,
            object,
            iframe,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p,
            blockquote,
            pre,
            a,
            abbr,
            acronym,
            address,
            big,
            cite,
            code,
            del,
            dfn,
            em,
            img,
            ins,
            kbd,
            q,
            s,
            samp,
            small,
            strike,
            strong,
            sub,
            sup,
            tt,
            var,
            b,
            u,
            i,
            center,
            dl,
            dt,
            dd,
            ol,
            ul,
            li,
            fieldset,
            form,
            label,
            legend,
            table,
            caption,
            tbody,
            tfoot,
            thead,
            tr,
            th,
            td,
            article,
            aside,
            canvas,
            details,
            embed,
            figure,
            figcaption,
            footer,
            header,
            hgroup,
            menu,
            nav,
            output,
            ruby,
            section,
            summary,
            time,
            mark,
            audio,
            video {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
                font: inherit;
                vertical-align: baseline;
            }

            .sticky {
                top: 0;
            }

            .grid-cont {
                Background-image: url(pictures/10.jpg);
                position: relative;
            }

            .logo {
                width: 200px;
                margin-left: 61%;
                margin-top: 1.5%;
            }

            .logout {
                position: absolute;
                top: 53%;
                left: 0.9%;
            }

            #logout {
                padding: 5px 15px;
                background-color: rgba(189, 124, 42, 0.7);
                text-decoration: none;
                color: black;
                border-radius: 6px;
                margin-right: 10px;
            }

            #logout:hover {
                transition: 0.5s;
                background-color: #ce6c01;
                border-radius: 18px;
            }

            .header-section {
                display: grid;
            }

            .header-section ul {
                display: flex;
                list-style: none;
                background-color: white;
                padding: 0px;
                justify-content: space-around;
                background: #d1a369eb;
            }

            .list {
                display: flex;
                flex-direction: column;
            }

            .list .links {
                text-decoration: none;
                color: black;
                display: flex;
                font-size: 15pt;
            }

            .links {
                padding: 15px;
            }

            .txt {
                font-size: 14px;
                font-family: 'Indie Flower', cursive;
                text-align: center;
            }

            .txt:hover {
                transition: 0.5s;
                background-color: #ce6c01;
                border-radius: 18px;
            }

            @media (min-width:1024px) and (max-width: 1280px) {
                .header-section {
                    display: inherit;
                }

                .logo {
                    width: 200px;
                    margin-left: 70%;
                    margin-top: 1.5%;
                }
            }

            .cont {
                margin: 10px 25px;
            }

            h1 {
                display: block;
                font-family: 'Varela Round', sans-serif;
                font-size: 22;
                color: #bd7c2a;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .container>h1 {
                padding: 20px 0px;
            }

            .cart {
                display: flex;
            }

            .products {
                flex: 0.75;
            }

            .product {
                display: flex;
                width: 100%;
                height: 270px;
                overflow: hidden;
                border: 1px solid silver;
                margin-bottom: 20px;
            }

            .product:hover {
                border: none;
                box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
                transform: scale(1.01);
            }

            .product>img {
                width: 300px;
                height: 200px;
                object-fit: cover;
            }

            .product>img:hover {
                transform: scale(1.04);
            }

            .product-info {
                padding: 20px;
                width: 100%;
                position: relative;
            }

            .product-name,
            .product-price,
            .product-offer {
                margin-bottom: 20px;
                font-family: 'Indie Flower', cursive;
            }

            .product-remove {
                position: absolute;
                bottom: 20px;
                right: 20px;
                padding: 10px 25px;
                background-color: #bd7c2a;
                cursor: pointer;
                color: white;
                border-radius: 5px;
                font-family: 'Indie Flower', cursive;
            }

            .product-remove:hover {
                transition: 0.5s;
                background-color: #ce6c01;
                border-radius: 18px;
            }

            .product-quantity>input {
                width: 40px;
                padding: 5px;
                text-align: center;
                font-family: 'Indie Flower', cursive;
            }

            .product-quantity>label {
                font-family: 'Indie Flower', cursive;
            }

            .fa {
                margin: 5px;
            }

            .cart-total {
                flex: 0.25;
                margin-left: 20px;
                padding: 20px;
                height: 160px;
                border: 1px solid silver;
                border-radius: 8px;
            }

            .cart-total p {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
                margin-bottom: 30px;
                font-size: 20px;
                font-family: 'Indie Flower', cursive;
            }

            .cart-total a {
                display: block;
                text-align: center;
                height: 40px;
                line-height: 40px;
                background-color: #bd7c2a;
                color: white;
                text-decoration: none;
                font-family: 'Indie Flower', cursive;
            }

            .cart-total a:hover {
                transition: 0.5s;
                background-color: #ce6c01;
                border-radius: 18px;
            }
        </style>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Basket Page | BeeHealthy</title>
    </head>

    <body>
        <header class="sticky">

            <div class="grid-cont">
                <img src="pictures/logo.png" class="logo">

                <div class="logout">
                    <form action="">
                        <a href="log-out-session.php" id="logout">logout</a>
                    </form>
                </div>

            </div>

            <div class="header-section">
                <ul>
                    <li class="list">
                        <a href="home-page.php" class="links txt">Home</a>
                    </li>

                    <li class="list">
                        <a href="breakfast.php" class="links txt">Breakfast</a>
                    </li>

                    <li class="list">
                        <a href="main-meal.php" class="links txt">Main meal</a>
                    </li>

                    <li class="list">
                        <a href="snack.php" class="links txt">Sanck</a>
                    </li>

                    <li class="list">
                        <a href="ketogenic.php" class="links txt">Ketogenic</a>
                    </li>

                    <li class="list">
                        <a href="vegetarian.php" class="links txt">Vegetarian</a>
                    </li>
                    <li class="list">
                        <a href="offers.php" class="links txt">Offers</a>
                    </li>

                    <li class="list">
                        <a href="my-basket.php" class="links txt">My basket</a>
                    </li>

                    <li class="list">
                        <a href="#" class="links txt">Profile</a>
                    </li>

                </ul>
            </div>
        </header>
        <div class=" container">
            <h1>Home-My Basket</h1>
            <div class="cart">
                <div class="products">
                    <?php
                    $cartData = isset($_SESSION['cartData']) ? $_SESSION['cartData'] : array();
                    foreach ($cartData as $key => $value) {
                        echo '
                        <form method="GET" class="product">
                        <img src="' . $value['image'] . '" alt="">
                        <div class="product-info">
                            <h3 class="product-name">
                                <p>Product info: <br> ' . $value['name'] . ' <br><br>
                                    Fiber Free Fat Free No Added Sugar Sweetened <br> With Stevia No Preservatives Contains
                                    Natural <br> Caffeine From Green Coffee Beans.</p>
                            </h3>
                            <h2 class="product-price">Price: ' . $value['price'] . '$</h2>
                            <p class="product-quantity"><label for="quantity">Quantity</label>
                            <Button name="minus" type="submit" value="' . $key . '">
                            -
                            </Button>
' . $value['qty'] . '
<Button name="plus" type="submit" value="' . $key . '">
                            +
                            </Button>
                            <Button name="remove" type="submit" class="product-remove" value="' . $key . '">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                <span class="remove">Remove</span>
                            </Button>
                        </div>
                    </form>
                        ';
                    }
                    ?>
                </div>
                <div class="cart-total">
                    <p>
                        <span>Total Price:</span>
                        <span><?php
                                echo isset($_SESSION['total']) ? $_SESSION['total'] : 0;
                                ?>$</span>
                    </p>
                    <p>
                        <span>Number of items:</span>
                        <span><?php echo isset($_SESSION['cartData']) ? count($_SESSION['cartData']) : 0; ?></span>
                    </p>
                    <form method="GET">
                        <Button type="submit" name="checkOut">Proceed to Checkout</Button>
                    </form>
                </div>
            </div>
        </div>
        <?php require "footer.php" ?>
    </body>

    </html>