<?php
$connection = new mysqli("localhost", "root", "", "user_db");

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";

if ($connection->query($sql) === TRUE) {
    echo "User deleted successfully! <a href='view_users.php'>Back to Users</a>";
} else {
    echo "Error deleting user: " . $connection->error;
}

$connection->close();
?>
