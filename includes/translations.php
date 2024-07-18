<?php
$translations = [
    'fr' => [
        'login_title' => 'Connexion',
        'login_subtitle' => 'Coupe du Monde 2026',
        'email_placeholder' => 'Email',
        'login_button' => 'Connexion',
        'error_email_not_found' => 'Email non trouvé.',
        'welcome' => 'Bienvenue',
        'dashboard' => 'Tableau de bord',
        'error_title' => 'Erreur',
        'home' => 'Accueil'
    ],
    'id' => [
        'login_title' => 'Masuk',
        'login_subtitle' => 'Piala Dunia 2026',
        'email_placeholder' => 'Email',
        'login_button' => 'Masuk',
        'error_email_not_found' => 'Email tidak ditemukan.',
        'welcome' => 'Selamat datang',
        'dashboard' => 'Dasbor',
        'error_title' => 'Kesalahan',
        'home' => 'Beranda'
    ]
];

if (!function_exists('t')) {
    function t($key) {
        global $lang, $translations;
        return $translations[$lang][$key] ?? $key;
    }
}
?>
