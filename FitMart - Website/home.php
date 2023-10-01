<?php
require 'connection.php';
session_start();
if (!isset($_SESSION['privilleged'])) {
    header("location:index.php");
}
$productId = isset($_GET['addProductToCart']) ? $_GET['addProductToCart'] : '';
if (!empty($productId)) {
    $cartData = isset($_SESSION['cartData']) ? $_SESSION['cartData'] : array();
    if (!empty($cartData[$productId])) {
        $cartData[$productId]['qty']++;
    } else {
        $select = 'select * from products where id=' . $productId . '';
        $query = mysqli_query($conn, $select);
        $data = mysqli_fetch_assoc($query);
        $cartData[$productId] = $data;
        $cartData[$productId]['qty'] = 1;
    }
    $_SESSION['cartData'] = $cartData;
    $_SESSION['total'] = isset($_SESSION['total']) ? $_SESSION['total'] : 0;
    $_SESSION['total'] += ($cartData[$productId]['price']);
}
//print_r($_SESSION);
$select = 'select * from products';
$query = mysqli_query($conn, $select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | FitMart</title>
    <link href="home-css.css" rel="stylesheet">
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

    <div class="product-photos-container">
        <?php
        while ($row = mysqli_fetch_assoc($query)) {
            $data = '';
            $data .= '<div class="card"><form method="GET" class="product"> <img class="photo" src="' . $row['image'] . '" alt="" style="width: 200px;">';
            $data .= ' <span class="info">
                        <h3>' . $row['name'] . '</h3>
                        <h4>Price: ' . $row['price'] . 'JOD</h4><button type="submit" name="addProductToCart" value="' . $row['id'] . '" class="btn"">ADD TO CART</button>
                    </span>
                    </form></div>';
            echo $data;
        }
        ?>

    </div>
    <footer>
        <?php require "footer.php" ?>
    </footer>
</body>

</html>