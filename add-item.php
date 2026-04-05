<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $quantity = (int) $_POST['quantity'];

    if (empty($title) || empty($author) || $quantity < 1) {
        die("Invalid input. <a href='library.php'>Go back</a>");
    }

    $sql = "INSERT INTO inventory (title, author, quantity) VALUES (?, ?, ?)";
    $params = [$title, $author, $quantity];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    header("Location: library.php");
    exit();
}
?>