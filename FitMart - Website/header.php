<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="header.css" rel="stylesheet">
    <link rel="icon" href="pictures/icon.png">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="container">
        <div class="logout"><a href="log-out-session.php" style="text-decoration: none; color:white"><i class="fa fa-sign-out"></i></a></div>
        <div class="logo"><img src="pictures/logo.png" alt="A logo should appear"></div>
        <div class="home"><a href="home.php" style="text-decoration: none; color:white;">
                <h2>Home</h2>
            </a>
        </div>
        <div class="cart">
            <a href="shopping-bag.php" style="text-decoration: none; color:white;">
                <h2>Shopping Bag (<?php
                                    $totalItems = 0;
                                    if (isset($_SESSION['cartData'])) {
                                        foreach ($_SESSION['cartData'] as $value) {
                                            $totalItems += isset($value['qty']) ? $value['qty'] : 0;
                                        }
                                    }
                                    echo $totalItems;
                                    ?>)</h2>
            </a>
        </div>
    </header>
</body>

</html>