
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "SELECT * FROM formations WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute([":id" => $id]);

$formation = $statement->fetch(PDO::FETCH_ASSOC);

if (!$formation) {
    die("Formation introuvable.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $duree = $_POST["duree"];

    $sql = "UPDATE formations
            SET nom = :nom,
                description = :description,
                duree = :duree
            WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ":nom" => $nom,
        ":description" => $description,
        ":duree" => $duree,
        ":id" => $id
    ]);

    header("Location: index.php");
    exit;
}

$base = '../';
$activePage = 'formations';
$pageTitle = 'Modifier une formation';

include '../includes/header.php';
?>

<div class="page-header">
    <h2>Modifier une formation</h2>
    <p>Modifier les informations de cette formation.</p>
</div>

<div class="bg-white p-4 rounded border">

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control"
                   value="<?= htmlspecialchars($formation['nom']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($formation['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Durée (mois)</label>
            <input type="number" name="duree" class="form-control" min="1"
                   value="<?= $formation['duree'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-check"></i> Enregistrer
        </button>

        <a href="index.php" class="btn btn-outline-secondary">
            Annuler
        </a>

    </form>

</div>

</body>
</html>
