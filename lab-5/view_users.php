<?php
$connection = new mysqli("localhost", "root", "", "user_db");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$result = $connection->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>SL No.</th><th>Name</th><th>Email</th><th>Username</th><th>Actions</th>
        </tr>
        <?php 
        $sl = 1;
        while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $sl++ ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td>
                <a class="action" href="update_form.php?id=<?= $row['id'] ?>">Update</a>
                <a class="action" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure to delete it?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a class="vu_link" href="register.html">Back to Register</a>
</body>
</html>

<?php $connection->close(); ?>
