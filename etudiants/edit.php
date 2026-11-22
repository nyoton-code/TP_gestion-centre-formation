
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "SELECT * FROM etudiants WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute([":id" => $id]);

$etudiant = $statement->fetch(PDO::FETCH_ASSOC);

if (!$etudiant) {
    die("Étudiant introuvable.");
}

$sql = "SELECT * FROM formations";
$statement = $pdo->query($sql);
$formations = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $formation_id = $_POST["formation_id"];

    $sql = "UPDATE etudiants
            SET nom = :nom,
                prenom = :prenom,
                email = :email,
                formation_id = :formation_id
            WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ":nom" => $nom,
        ":prenom" => $prenom,
        ":email" => $email,
        ":formation_id" => $formation_id,
        ":id" => $id
    ]);

    header("Location: index.php");
    exit;
}

$base = '../';
$activePage = 'etudiants';
$pageTitle = 'Modifier un étudiant';

include '../includes/header.php';
?>

<div class="page-header">
    <h2>Modifier un étudiant</h2>
    <p>Modifier les informations de cet étudiant.</p>
</div>

<div class="bg-white p-4 rounded border">

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control"
                   value="<?= htmlspecialchars($etudiant['nom']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control"
                   value="<?= htmlspecialchars($etudiant['prenom']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?= htmlspecialchars($etudiant['email']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Formation</label>

            <select name="formation_id" class="form-select" required>
                <?php foreach ($formations as $formation): ?>
                    <option value="<?= $formation['id'] ?>"
                        <?= $formation['id'] == $etudiant['formation_id'] ? 'selected' : '' ?>>
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
