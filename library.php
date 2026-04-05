<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM inventory ORDER BY id DESC";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Inventory</title>
    <link rel="stylesheet" href="script.css">
    <style>
        .page-box {
            width: 100%;
            max-width: 900px;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #7494ec;
            color: white;
        }

        .action-link {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }

        .top-buttons {
            margin-top: 15px;
        }

        .top-buttons a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-box">
            <h2>Library Inventory</h2>

            <form action="add-item.php" method="POST">
                <input type="text" name="title" placeholder="Book Title" required>
                <input type="text" name="author" placeholder="Author" required>
                <input type="number" name="quantity" placeholder="Quantity" min="1" required>
                <button type="submit">Add Item</button>
            </form>

            <div class="top-buttons">
                <a href="dashboard.php"><button type="button">Back to Main Page</button></a>
                <a href="logout.php"><button type="button">Logout</button></a>
            </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['author']); ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>
                            <a class="action-link"
                               href="delete-item.php?id=<?php echo $row['id']; ?>"
                               onclick="return confirm('Delete this item?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>