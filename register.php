<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        die("All fields are required.");
    }

    $checkSql = "SELECT id FROM users WHERE email = ?";
    $checkParams = [$email];
    $checkStmt = sqlsrv_query($conn, $checkSql, $checkParams);

    if ($checkStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC)) {
        die("Email already exists. <a href='register-page.php'>Go back</a>");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insertSql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $insertParams = [$email, $hashedPassword];
    $insertStmt = sqlsrv_query($conn, $insertSql, $insertParams);

    if ($insertStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Registration successful. <a href='index.php'>Login here</a>";
}
?>