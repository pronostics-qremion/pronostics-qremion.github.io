<?php
$devel = false; // false for production

if ($devel) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "pronostics";
} else {
    $host = "sql307.infinityfree.com";
    $user = "if0_36891744";
    $password = "tFofe90x5twHgT";
    $dbname = "if0_36891744_pronostics";
}

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
