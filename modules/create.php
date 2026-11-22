
<?php
require_once "../database/connexion.php";

$sql = "SELECT * FROM formations";
$statement = $pdo->query($sql);
$formations = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST["nom"];
    $coefficient = $_POST["coefficient"];
    $formation_id = $_POST["formation_id"];

    $sql = "INSERT INTO modules (nom, coefficient, formation_id)
            VALUES (:nom, :coefficient, :formation_id)";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ":nom" => $nom,
        ":coefficient" => $coefficient,
        ":formation_id" => $formation_id
    ]);

    header("Location: index.php");
    exit;
}

$base = '../';
$activePage = 'modules';
$pageTitle = 'Ajouter un module';

include '../includes/header.php';
?>

<div class="page-header">
    <h2>Ajouter un module</h2>
    <p>Remplir les informations du nouveau module.</p>
</div>

<div class="bg-white p-4 rounded border">

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nom du module</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Coefficient</label>
            <input type="number" name="coefficient" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Formation</label>

            <select name="formation_id" class="form-select" required>
                <option value="">Choisir une formation</option>

                <?php foreach ($formations as $formation): ?>
                    <option value="<?= $formation['id'] ?>">
                        <?= htmlspecialchars($formation['nom']) ?>
                    </option>
                <?php endforeach; ?>

            </select>
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
