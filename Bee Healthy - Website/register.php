<?php 
session_start();
  require 'connection.php'; 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
$sql = "INSERT INTO customer (name, phone, country, streetname, email, password) values (:name, :phone , :country , :streetname , :email , :password)";


$statement = $pdo->prepare($sql);
$statement -> bindParam(':name' , $_POST['name'] , PDO:: PARAM_STR);
$statement -> bindParam(':phone' , $_POST['phone'] , PDO:: PARAM_STR);
$statement -> bindParam(':country' , $_POST['country'] , PDO:: PARAM_STR);
$statement -> bindParam(':streetname' , $_POST['streetname'] , PDO:: PARAM_STR);
$statement -> bindParam(':email' , $_POST['email'] , PDO:: PARAM_STR);
$statement -> bindParam(':password' , $_POST['password'] , PDO:: PARAM_STR);
$statement = $statement->execute();


$_SESSION['id'] = $data ['id'];
    header('location: home-page.php');
}
?>


<DOCTYPE html>
    <html>
        <head> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Registeration form | BeeHealthy</title>
            <link href="register-style.css" rel="stylesheet">
            <link rel="icon" href="pictures/bee.png">
        </head>
        <body>
        <form action="register.php"   method="post">
            <section class="sign">
                <div class="registeration">
                    <div class="cont">
                        <h3>Registeration  <img src="pictures/logo.png" alt="" class="logo"></h3>    
                    </div>
                        <div class="user">
                            <div class="section">Full Name: </div>
                            <input type="text" name="name" placeholder="Fname Lname" required>
                            
                            <div class="section">Phone: </div>
                            <input type="text" name="phone" placeholder="Enter your phone" required>
                            
                            <div class="section">Country: </div>
                            <input type="text" name="country" placeholder="Enter your country" required>

                            <div class="section">Street Name: </div>
                            <input type="text" name="streetname" placeholder="Enter your street name" required>

                            <div class="section">Email: </div>
                            <input type="text" name="email" placeholder="example@gmail.com" required>
                            
                            <div class="section">Password: </div>
                            <input type="password" name="password" placeholder="Enter your password" required>
                            
                            <br>
                            <button type="submit">Create</button>
                          
                        </div>
                    </div>
            </section>
            <footer>
                <?php require "footer.php" ?> 
            </footer>
        </form>       
        </body>         
    </html>

    
           