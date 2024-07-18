<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once '../includes/config.php';
include_once '../includes/translations.php';

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Rediriger vers la page d'accueil ou une autre page appropriée
    header('Location: ../index.php');
    exit();
}

$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr';

$error_message = '';
$noMenu = true; // Désactiver le menu sur la page de login

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error_message = t('error_email_not_found');
    }
}

include_once '../includes/header.php';
?>

<div class="login-container">
    <img src="../img/prono-icon.png" alt="Pronostics Icon" class="login-icon">
    <h2 class="login-title"><?= t('login_title') ?></h2>
    <h3 class="login-subtitle"><?= t('login_subtitle') ?></h3>
    <form method="POST" style="width: 100%; max-width: 400px;">
        <input type="email" name="email" class="login-input" placeholder="<?= t('email_placeholder') ?>" required>
        <button type="submit" class="login-button"><?= t('login_button') ?></button>
    </form>
    <div class="language-selector">
        <a href="?lang=fr"><img src="../img/france.png" alt="Français"> Français</a>
        <a href="?lang=id"><img src="../img/indonesia.png" alt="Indonésien"> Bahasa Indonesia</a>
    </div>
</div>

<?php if ($error_message): ?>
    <script src="../js/iziToast.min.js"></script>
    <script>
        iziToast.error({
            title: '<?= t('error_title')?>',
            message: '<?= $error_message ?>',
            position: 'topCenter'
        });
    </script>
<?php endif; ?>

<?php
include_once '../includes/footer.php';
?>
