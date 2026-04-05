<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="script.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Welcome</h2>
            <p>Hello, <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>

            <a href="library.php">
                <button type="button">Library Inventory</button>
            </a>

            <a href="logout.php">
                <button type="button">Logout</button>
            </a>
        </div>
    </div>
</body>
</html>