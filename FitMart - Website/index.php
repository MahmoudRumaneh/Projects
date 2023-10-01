<?php
require 'connection.php';
session_start();
$msgBox = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if email and password are not empty
    if (empty($email) || empty($password)) {
        $msgBox = "<script>alert('Please enter both email and password.');</script>";
    } else {

        $sql = "SELECT * FROM users WHERE email=:email AND password=:password";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetch();
        $pdo = null;
        $count = $statement->rowCount();
        if (!$data) {
            $msgBox = "<script>alert('The email or password isn\'t correct');</script>";
        }
        if ($count == 1) {
            $_SESSION['id'] = $data["id"];
            $_SESSION['privilleged'] = $email;
            header("Location: home.php?email=$email");
            exit();
        }
    }
}

if (isset($_SESSION['id'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-in form | FitMart</title>
    <link href="login-css.css" rel="stylesheet">
    <link rel="icon" href="pictures/icon.png">
</head>

<body>
    <div class="class">
        <form action="" method="post" id="login">
            <div class="registeration">
                <div class="cont">
                    <h2>LOGIN</h2>
                </div>
                <div class="user">
                    <div class="section"><input type='email' id='email' name='email' placeholder='Your Email'>
                        <input type='password' id='password' name='password' placeholder='Your Password'>
                        <br>
                        <button type="submit">LOGIN</button><?php echo $msgBox; ?>
                        <div class="switch">
                            <h3>Don't have an account? <a href="sign-up.php">Sign up here</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>