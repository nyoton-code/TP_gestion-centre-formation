
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM etudiants WHERE id = :id";

$statement = $pdo->prepare($sql);

$statement->execute([
    ":id" => $id
]);

header("Location: index.php");
exit;
?>
