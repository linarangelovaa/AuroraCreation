<?php
require_once "../autoload.php";
authOnly();



$sql = "UPDATE articles 
        SET `category_id` = :category_id, 
            `title` = :title, 
            `description` = :description, 
            `status` = :status 
        WHERE `id` = :id";

$stmt = $pdo->prepare($sql);
if ($stmt->execute([
    'category_id' => decrypt(urldecode($_POST['category_id'])),
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'status' => $_POST['status'],
    'id' => decrypt(urldecode($_POST['id']))
]));

header("Location: ../index.php");
die();


?>