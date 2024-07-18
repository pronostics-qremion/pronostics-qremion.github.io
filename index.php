<?php
include 'includes/config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: users/dashboard.php');
    exit();
}

header('Location: users/login.php');
exit();
?>
