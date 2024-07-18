<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM matches";
$matches = $conn->query($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $match_id = $_POST['match_id'];
    $prediction_team1 = $_POST['prediction_team1'];
    $prediction_team2 = $_POST['prediction_team2'];

    $query = "INSERT INTO predictions (user_id, match_id, prediction_team1, prediction_team2) VALUES ($user_id, $match_id, $prediction_team1, $prediction_team2)";
    $conn->query($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<h1>Welcome</h1>
<form method="POST">
    <select name="match_id">
        <?php while ($match = $matches->fetch_assoc()) { ?>
            <option value="<?= $match['id'] ?>"><?= $match['team1'] ?> vs <?= $match['team2'] ?></option>
        <?php } ?>
    </select>
    <input type="number" name="prediction_team1" placeholder="Score team 1" required>
    <input type="number" name="prediction_team2" placeholder="Score team 2" required>
    <button type="submit">Submit Prediction</button>
</form>
</body>
</html>
