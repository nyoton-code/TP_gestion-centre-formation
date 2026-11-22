
<?php
require_once "../database/connexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $duree = $_POST["duree"];

    $sql = "INSERT INTO formations (nom, description, duree)
            VALUES (:nom, :description, :duree)";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ":nom" => $nom,
        ":description" => $description,
        ":duree" => $duree
    ]);

    header("Location: index.php");
    exit;
}

$base = '../';
$activePage = 'formations';
$pageTitle = 'Ajouter une formation';

include '../includes/header.php';
?>

<div class="page-header">
    <h2>Ajouter une formation</h2>
    <p>Remplir les informations de la nouvelle formation.</p>
</div>

<div class="bg-white p-4 rounded border">

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Durée (mois)</label>
            <input type="number" name="duree" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Ajouter
        </button>

        <a href="index.php" class="btn btn-outline-secondary">
            Annuler
        </a>

    </form>

</div>

</body>
</html>
