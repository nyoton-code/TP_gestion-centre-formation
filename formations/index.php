
<?php
require_once "../database/connexion.php";

$sql = "SELECT * FROM formations";
$statement = $pdo->query($sql);
$formations = $statement->fetchAll(PDO::FETCH_ASSOC);

$base = '../';
$activePage = 'formations';
$pageTitle = 'Formations';

include '../includes/header.php';
?>

<div class="page-header">
    <h2>Liste des formations</h2>
    <p>Consulter et gérer les formations du centre.</p>
</div>

<div class="bg-white p-4 rounded border">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Toutes les formations</h5>

        <a href="create.php" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Ajouter
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Durée</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($formations as $formation): ?>
                <tr>
                    <td><?= $formation['id'] ?></td>
                    <td><?= htmlspecialchars($formation['nom']) ?></td>
                    <td><?= htmlspecialchars($formation['description']) ?></td>
                    <td><?= $formation['duree'] ?> mois</td>

                    <td>
                        <a href="edit.php?id=<?= $formation['id'] ?>" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <a href="delete.php?id=<?= $formation['id'] ?>"
                           class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('Voulez-vous supprimer cette formation ?')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php if (empty($formations)): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Aucune formation disponible.
                    </td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>
