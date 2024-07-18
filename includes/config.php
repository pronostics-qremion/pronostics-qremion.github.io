<?php
$host = "sql307.infinityfree.com";
$user = "if0_36891744";
$password = "tFofe90x5twHgT";
$dbname = "if0_36891744_XXX";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
