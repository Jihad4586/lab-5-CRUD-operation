<?php
$connection = new mysqli("localhost", "root", "", "user_db");

$id = $_GET['id'];
$result = $connection->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Update User Info</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php $connection->close(); ?>
