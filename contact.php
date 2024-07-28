<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "portfoliodb";

// connect to db
$con = mysqli_connect($host, $username, $password, $database);


//check if connected
if ($conn->connect_error){
    die("Connection failed:  " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
// get user data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$message = $conn->real_escape_string($_POST['message']);


// insert to db

$sql = "INSERT INTO tb_dataf (name, email, message) VALUES ('$name', '$email', '$message')";
if ($conn->query($sql) === TRUE){
    echo "Form submitted Successfully";
}
else{
    echo "Error: ". $sql . "<br>" . $conn->error;
}
} else {
    echo "Invalid request method.";
}

$conn->close();

?>