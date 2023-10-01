<?php
session_start();
require 'connection.php';
$msgBox = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    // Check if email already exists
    $emailCheckQuery = "SELECT id FROM users WHERE email = :email";
    $emailCheckStatement = $pdo->prepare($emailCheckQuery);
    $emailCheckStatement->bindParam(':email', $email, PDO::PARAM_STR);
    $emailCheckStatement->execute();

    if ($emailCheckStatement->fetchColumn()) {
        $msgBox = "<script>alert('Your email is already used!');</script>";
    } else {
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msgBox = "<script>alert('Please enter a valid email address.');</script>";
        } else {
            // Validate password complexity
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
                $msgBox = "<script>alert('Password should be at least 8 characters long and contain at least one capital letter and one special symbol.');</script>";
            } else {
                // Check if passwords match
                if ($password !== $rpassword) {
                    $msgBox = "<script>alert('The passwords are not matching.');</script>";
                } else {
                    // All validations passed, insert user data into the database
                    $sql = "INSERT INTO users (full_name, email, password) VALUES (:full_name, :email, :password)";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':full_name', $full_name, PDO::PARAM_STR);
                    $statement->bindParam(':email', $email, PDO::PARAM_STR);
                    $statement->bindParam(':password', $password, PDO::PARAM_STR);
                    $result = $statement->execute();

                    if ($result) {
                        $_SESSION['id'] = $pdo->lastInsertId();
                        header('Location: index.php');
                        exit();
                    } else {
                        $msgBox = "<script>alert('An error occurred while registering.');</script>";
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-up form | FitMart</title>
    <link href="sign-up-css.css" rel="stylesheet">
    <link rel="icon" href="pictures/icon.png">
</head>

<body>
    <div class="class">
        <form action="" method="post">
            <div class="class">
                <div class="registeration">
                    <div class="cont">
                        <h2>CREATE AN ACCOUNT</h2>
                    </div>
                    <div class="user">
                        <div class="section"><input type='text' id='full_name' name='full_name' placeholder='Your Full Name' required autocomplete="off">
                            <input type='email' id='email' name='email' placeholder='Your Email' required autocomplete="off">
                            <input type='password' id='password' name='password' placeholder='Your Password' required autocomplete="off">
                            <div class="conditions"></div>
                            <input type='password' id='rpassword' name='rpassword' placeholder='Repeat your Password' required autocomplete="off">
                            <input type="checkbox" name="terms" id="terms" required><label for="terms" class="terms">I agree terms & conditions</label>
                            <br>
                            <button type="submit">REGISTER</button><?php echo $msgBox; ?>
                            <div class="switch">
                                <h3>Have already an account? <a href="index.php">Login here</a></h3>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>

    </div>
</body>

</html>