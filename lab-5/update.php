<?php
$connection = new mysqli("localhost", "root", "", "user_db");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];

$sql = "UPDATE users SET name='$name', email='$email', username='$username' WHERE id=$id";

if ($connection->query($sql) === TRUE) {
    echo "User updated successfully! <a href='view_users.php'>Back to Users</a>";
} else {
    echo "Error updating user: " . $connection->error;
}

$connection->close();
?>
