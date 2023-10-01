<?php


$servername = "localhost";
$username = "Staff";
$password = "12345";
$dbname = "dental_clinics";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// open the connection to the database
include './openConn.php';



if ($query = mysqli_query($conn, "INSERT INTO staff(first_name, last_name, type_of_work, email, company_name) VALUES ('$_POST[fname]','$_POST[lname]' ,'$_POST[type_of_work]', '$_POST[email]','$_POST[companyN]')") or die(mysqli_error($conn))) {
    $row = mysqli_affected_rows($conn) or die(mysqli_error($conn) . "<script>   alert('An error occurred');
																				window.location.href='./addstaff.html';
																	</script>");
    if (!empty($row)) {
         echo "<script>
               alert('a new employee is added successfully');
               window.location.href='.addstaff.html';
            </script>";
    }
}


// close the connection
include 'closeConn.php';
?>