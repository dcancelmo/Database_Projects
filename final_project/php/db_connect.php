<?php
$servername = "localhost";
$username = "dcancelm";
$password = "MtjPszvc";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
   //echo "Connection success! User: " . $username;
}
?>