
<?php
$base = $base ?? '';
$activePage = $activePage ?? '';
$pageTitle = $pageTitle ?? 'Tableau de bord';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="<?= $base ?>assets/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body>

<div class="app">

    <aside class="sidebar">
        <h5><i class="fa-solid fa-graduation-cap"></i> Gestion Centre</h5>

        <p class="menu-title">MENU</p>

        <a href="<?= $base ?>index.php" class="<?= $activePage == 'home' ? 'active' : '' ?>">
            <i class="fa-solid fa-house"></i> Tableau de bord
        </a>

        <a href="<?= $base ?>formations/index.php" class="<?= $activePage == 'formations' ? 'active' : '' ?>">
            <i class="fa-solid fa-book"></i> Formations
        </a>

        <a href="<?= $base ?>etudiants/index.php" class="<?= $activePage == 'etudiants' ? 'active' : '' ?>">
            <i class="fa-solid fa-users"></i> Étudiants
        </a>

        <a href="<?= $base ?>modules/index.php" class="<?= $activePage == 'modules' ? 'active' : '' ?>">
            <i class="fa-solid fa-book-open"></i> Modules
        </a>
    </aside>

    <div class="main">
        <header class="topbar">
            <h5><?= $pageTitle ?></h5>
        </header>

<main class="content">
