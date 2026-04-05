<?php
$serverName = "derangedpanda\\MSSQLSERVER01";

$connectionOptions = [
    "Database" => "library_db",
    "TrustServerCertificate" => true
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>