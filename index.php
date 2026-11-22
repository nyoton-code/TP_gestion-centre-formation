
<?php
$base = '';
$activePage = 'home';
$pageTitle = 'Tableau de bord';
include 'includes/header.php';
?>

<div class="page-header">
    <h2>Tableau de bord</h2>
    <p>Bienvenue dans votre espace de gestion.</p>
</div>

<div class="row g-4">

    <div class="col-md-4">
        <div class="dashboard-card">
            <i class="fa-solid fa-book fa-2x"></i>
            <h4>Formations</h4>
            <p>Gérer les formations du centre.</p>
            <a href="formations/index.php" class="btn btn-primary">Voir les formations</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="dashboard-card">
            <i class="fa-solid fa-users fa-2x"></i>
            <h4>Étudiants</h4>
            <p>Gérer les étudiants inscrits.</p>
            <a href="etudiants/index.php" class="btn btn-primary">Voir les étudiants</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="dashboard-card">
            <i class="fa-solid fa-book-open fa-2x"></i>
            <h4>Modules</h4>
            <p>Gérer les modules des formations.</p>
            <a href="modules/index.php" class="btn btn-primary">Voir les modules</a>
        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>
