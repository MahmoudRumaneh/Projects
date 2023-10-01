<?php

    require 'connection.php';

	session_start();
	$msgBox = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		require "connection.php";

		$sql = "SELECT * FROM customer WHERE email=:email AND password=:password";

		$email = $_POST["email"];
		$password = $_POST["password"];	

		$statement = $pdo->prepare($sql);
		$statement->bindParam(':email', $email, PDO::PARAM_STR);
		$statement->bindParam(':password', $password, PDO::PARAM_STR);
		$statement->execute();
		$data = $statement->fetch();
		$pdo = null;

		if(!$data){
			$msgBox = "<div id='msg'>The email or password isn't correct</div>";
		}else{
			$_SESSION['id'] = $data["id"];
		}
	}
    if(isset($_SESSION['id'])){
		header("Location: home-page.php");
		exit();
	}
?>    
<!DOCTYPE html>
    <html>
        <head> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Sign-in form | BeeHealthy</title>
            <link href="sign-in-style.css" rel="stylesheet">
            <link rel="icon" href="pictures/bee.png">
        </head>
        <body>
                <div class="registeration">
                    <div class="cont">
                        <h3>Sign-in  <img src="pictures/logo.png" alt="" class="logo"></h3>    
                    </div>
                    <form action='sign-in.php' method='post' id="login">
                        <div class="user">
                            <div class="section">Email: </div><input type="text" name="email" placeholder="example@gmail.com">
                            <div class="section">Password: </div><input type="password" name="password" placeholder="Enter your password">
                            <br>
                            <button type="submit">Log-in</button>
                            <?php echo $msgBox; ?>
                        </div>
                    </form>
                </div>    
	 
            </div>
            <?php require "footer.php" ?>
        </body>         
    </html>      