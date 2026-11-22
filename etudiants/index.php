
<?php
require_once "../database/connexion.php";

$sql = "SELECT etudiants.*, formations.nom AS formation_nom
        FROM etudiants
        INNER JOIN formations
        ON etudiants.formation_id = formations.id";

$statement = $pdo->query($sql);
$etudiants = $statement->fetchAll(PDO::FETCH_ASSOC);

$base = '../';
$activePage = 'etudiants';
$pageTitle = 'Étudiants';

include '../includes/header.php';
?>

<div class="page-header">
    <h2>Liste des étudiants</h2>
    <p>Consulter et gérer les étudiants inscrits.</p>
</div>

<div class="bg-white p-4 rounded border">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Tous les étudiants</h5>

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
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Formation</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?= $etudiant['id'] ?></td>
                    <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                    <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                    <td><?= htmlspecialchars($etudiant['email']) ?></td>
                    <td><?= htmlspecialchars($etudiant['formation_nom']) ?></td>

                    <td>
                        <a href="edit.php?id=<?= $etudiant['id'] ?>"
                           class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <a href="delete.php?id=<?= $etudiant['id'] ?>"
                           class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('Voulez-vous supprimer cet étudiant ?')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php if (empty($etudiants)): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Aucun étudiant disponible.
                    </td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>
