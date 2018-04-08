<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE DATABASE cse311_project";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$dbname = "cse311_project";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE login (
id INT(5) UNSIGNED AUTO_INCREMENT UNIQUE KEY, 
email VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
name VARCHAR(255) NOT NULL

)";

if ($conn->query($sql) === TRUE) {
    echo "Table login created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>