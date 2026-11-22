
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "SELECT * FROM modules WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute([":id" => $id]);
$module = $statement->fetch(PDO::FETCH_ASSOC);

if (!$module) {
    die("Module introuvable.");
}

$sql = "SELECT * FROM formations";
$statement = $pdo->query($sql);
$formations = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST["nom"];
    $coefficient = $_POST["coefficient"];
    $formation_id = $_POST["formation_id"];

    $sql = "UPDATE modules
            SET nom = :nom,
                coefficient = :coefficient,
                formation_id = :formation_id
            WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ":nom" => $nom,
        ":coefficient" => $coefficient,
        ":formation_id" => $formation_id,
        ":id" => $id
    ]);

    header("Location: index.php");
    exit;
}

$base = '../';
$activePage = 'modules';
$pageTitle = 'Modifier un module';

include '../includes/header.php';
?>

<div class="page-header">
    <h2>Modifier un module</h2>
    <p>Modifier les informations de ce module.</p>
</div>

<div class="bg-white p-4 rounded border">

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nom du module</label>
            <input type="text" name="nom" class="form-control"
                   value="<?= htmlspecialchars($module['nom']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Coefficient</label>
            <input type="number" name="coefficient" class="form-control"
                   min="1" value="<?= $module['coefficient'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Formation</label>

            <select name="formation_id" class="form-select" required>
                <?php foreach ($formations as $formation): ?>
                    <option value="<?= $formation['id'] ?>"
                        <?= $formation['id'] == $module['formation_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($formation['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
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
