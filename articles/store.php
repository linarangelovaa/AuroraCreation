<?php
require_once "../autoload.php";
authOnly();


$sql = "INSERT INTO articles (category_id,title,description,status) VALUES (:category_id,:title, :description, :status)";
$stmt = $pdo->prepare($sql);


if ($stmt->execute([
    'category_id' => decrypt(urldecode($_POST['category_id'])),
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'status' => $_POST['status']
])) {
    header("Location: ../index.php");
    die();
}


    header ("Location: add.php");
    die();
?>