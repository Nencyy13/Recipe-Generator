<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "howdoimake";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    ingredients TEXT NOT NULL,
    instructions TEXT NOT NULL
)";


if ($conn->query($sql) === TRUE) {
    echo "Table 'recipes' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
