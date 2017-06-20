<?php
define('INI_FILE', 'configs/db.ini');
define('LOCAL_PATH', 'homestead.app/pwcs/bibliotheque/');

$navItems = [
    'home' => ['label' => 'Accueil', 'url' => 'index.php'] ,
    'register' => ['label' => 'S’inscrire', 'url' => 'index.php?resource=Page&action=getRegistration'],
    'login' => ['label' => 'Se connecter', 'url' => 'index.php?resource=Page&action=getLogin'],
    'search' => ['label' => 'Recherche', 'url' => 'index.php?resource=Page&action=advancedSearch'],
    'logout' => ['label' => 'Se déconnecter', 'url' => 'index.php?resource=Auth&action=getLogout'],
    'about' => ['label' => 'À propos', 'url' => 'index.php?resource=Page&action=about'],
    'admin' => ['label' => 'Panneau d\'administration', 'url' => 'index.php?resource=Page&action=getAdmin']
];

$navSlugs = ['basic' => ['home', 'search', 'logout'],
            'loggedOut' => ['home',  'search', 'login'],
            'admin' => ['home', 'search', 'admin', 'logout']];
