<?php
$connection = new mysqli("localhost", "root", "", "user_db");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";

if ($connection->query($sql) === TRUE) {
    echo "Registration successful! <a href='view_users.php'>View Users</a>";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>
