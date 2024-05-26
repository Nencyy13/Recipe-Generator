<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "howdoimake";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$customerMessage=array();

$name = $_POST['customerName'];
$email = $_POST['customerEmail'];
$phone = $_POST['customerPhone'];
$message = $_POST['customerNote'];


$sql = "INSERT INTO contacts(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Thank you! Your message has been submitted.<h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
