<?php
require_once "../autoload.php";
authOnly();


$id = decrypt($_GET['id']);

$sql = "DELETE FROM articles WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: ../index.php");
die();


?>