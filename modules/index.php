
<?php
require_once "../database/connexion.php";

$sql = "SELECT modules.*, formations.nom AS formation_nom
        FROM modules
        INNER JOIN formations
        ON modules.formation_id = formations.id";

$statement = $pdo->query($sql);
$modules = $statement->fetchAll(PDO::FETCH_ASSOC);

$base = '../';
$activePage = 'modules';
$pageTitle = 'Modules';

include '../includes/header.php';
?>

<div class="page-header">
    <h2>Liste des modules</h2>
    <p>Consulter et gérer les modules des formations.</p>
</div>

<div class="bg-white p-4 rounded border">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Tous les modules</h5>

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
                    <th>Coefficient</th>
                    <th>Formation</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($modules as $module): ?>
                <tr>
                    <td><?= $module['id'] ?></td>
                    <td><?= htmlspecialchars($module['nom']) ?></td>
                    <td><?= $module['coefficient'] ?></td>
                    <td><?= htmlspecialchars($module['formation_nom']) ?></td>

                    <td>
                        <a href="edit.php?id=<?= $module['id'] ?>"
                           class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <a href="delete.php?id=<?= $module['id'] ?>"
                           class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('Voulez-vous supprimer ce module ?')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php if (empty($modules)): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Aucun module disponible.
                    </td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>
