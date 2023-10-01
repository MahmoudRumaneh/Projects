<?php
require 'connection.php';
session_start();
if (!isset($_SESSION['privilleged'])) {
    header("location:index.php");
}
$remove = isset($_GET['remove']) ? $_GET['remove'] : '';
$plus = isset($_GET['plus']) ? $_GET['plus'] : '';
$minus = isset($_GET['minus']) ? $_GET['minus'] : '';
$cartData = isset($_SESSION['cartData']) ? $_SESSION['cartData'] : array();

if (!empty($remove) && isset($cartData[$remove])) {
    $_SESSION['total'] -= ($cartData[$remove]['price'] * $cartData[$remove]['qty']);
    unset($cartData[$remove]);
}

if (!empty($plus) && isset($cartData[$plus])) {
    $cartData[$plus]['qty']++;
    $_SESSION['total'] += $cartData[$plus]['price'];
}

if (!empty($minus) && isset($cartData[$minus])) {
    $_SESSION['total'] -= $cartData[$minus]['price'];
    if ($cartData[$minus]['qty'] - 1 < 1) {
        unset($cartData[$minus]);
    } else {
        $cartData[$minus]['qty']--;
    }
}

$_SESSION['cartData'] = $cartData;

if (isset($_GET['checkOut']) && !empty($_SESSION['cartData'])) {
    $orderDate = date('Y-m-d H:i:s');
    $select = 'INSERT INTO `orders`(`user_id`, `order_date`, `total_amount`) VALUES(' . $_SESSION['id'] . ', \'' . $orderDate . '\', ' . $_SESSION['total'] . ')';
    $query = mysqli_query($conn, $select);

    if ($query) {
        $select = 'SELECT id FROM `orders` ORDER BY id DESC LIMIT 1';
        $query = mysqli_query($conn, $select);

        if ($query) {
            $data = mysqli_fetch_assoc($query);
            $group_id = $data['id'];

            foreach ($_SESSION['cartData'] as $key => $value) {

                $itemTotal = $value['price'] * $value['qty'];
                $select = 'INSERT INTO `order_items`(`orders_id`, `products_id`, `quantity`, `price`) VALUES(' . $group_id . ',' . $value['id'] . ',' . $value['qty'] . ', ' . $itemTotal . ')';
                $query = mysqli_query($conn, $select);

                // Add error handling here to check for database insert errors
                if (!$query) {
                    echo "Error inserting product: " . mysqli_error($conn);
                }
            }


            unset($_SESSION['cartData']);
            unset($_SESSION['total']);
        }
    }
}
?>


<DOCTYPE html>
    <html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopping Bag | FitMart</title>
        <link href="shopping-bag-css.css" rel="stylesheet">
        <link rel="icon" href="pictures/icon.png">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <header>
            <?php require 'header.php'; ?>
        </header>
        <div class="shopping">
            <div class="products">
                <?php
                $cartData = isset($_SESSION['cartData']) ? $_SESSION['cartData'] : array();
                foreach ($cartData as $key => $value) {
                    echo '
                    <form method="GET" class="product">
                        <div class="product-photo">
                            <img src="' . $value['image'] . '" alt="">
                        </div>
                        <div class="product-info">
                            <div class="product-name">
                                <h3>
                                    Product info: <br> <div class="full-name">' . $value['name'] . '</div> <br> ' . $value['description'] . '
                                </h3>
                            </div>
                            <div class="product-price">
                                <h3>Price: ' . $value['price'] . 'JOD</h3>
                            </div>
                            <div class="product-quantity">
                                <label for="quantity"><h3>Quantity: </h3></label>
                                <Button class="product-add" name="minus" type="submit" value="' . $key . '">
                                -
                                </Button>
                                    ' . $value['qty'] . '
                                <Button class="product-minus" name="plus" type="submit" value="' . $key . '">
                                +
                                </Button>
                                <Button name="remove" type="submit" class="product-remove" value="' . $key . '">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    <span class="remove">Remove</span>
                                </Button>
                            </div>
                        </div>
                    </form>
                        ';
                }
                ?>
            </div>
            <div class="cart-total">
                <h3>
                    <span>Total Price:</span>
                    <span><?php
                            echo isset($_SESSION['total']) ? $_SESSION['total'] : 0;
                            ?>JOD</span>
                </h3>
                <h3>
                    <span>Number of items:</span>
                    <span><?php
                            $totalItems = 0; // Initialize the total items count
                            if (isset($_SESSION['cartData'])) {
                                foreach ($_SESSION['cartData'] as $value) {
                                    $totalItems += isset($value['qty']) ? $value['qty'] : 0; // Add each product's quantity to the total
                                }
                            }
                            echo $totalItems; // Display the total number of items
                            ?>
                    </span>
                </h3>
                <form method="GET">
                    <Button type="submit" name="checkOut" class="checkout">Proceed to Checkout</Button>
                </form>
            </div>
        </div>
        <?php require "footer.php" ?>
    </body>

    </html>