<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr';

include_once '../includes/translations.php';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t('home') ?></title>
    <!-- Local Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Local Font Awesome CSS -->
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <!-- Local iziToast CSS -->
    <link rel="stylesheet" href="../css/iziToast.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body class="<?php echo isset($noMenu) && $noMenu ? 'login-bg' : ''; ?>">
<?php if (!isset($noMenu) || !$noMenu): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Pronostics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php"><?= t('home') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../users/dashboard.php"><?= t('dashboard') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../users/login.php"><?= t('login_title') ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../img/<?= $lang == 'fr' ? 'france' : 'indonesia' ?>.png" alt="Langue">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="langDropdown">
                        <a class="dropdown-item" href="?lang=fr"><img src="../img/france.png" alt="Français"> Français</a>
                        <a class="dropdown-item" href="?lang=id"><img src="../img/indonesia.png" alt="Indonésien"> Bahasa Indonesia</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<?php endif; ?>
