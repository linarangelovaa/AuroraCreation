<?php

require_once "../autoload.php";


$sql = "SELECT * FROM users WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $_POST['username']]);

$user = $stmt->fetch();


if (password_verify($_POST['password'], $user['password'])) {
    $_SESSION['username'] = $user['username'];
    header("Location: ../index.php");
    die();
}
elseif (empty($_POST["password"])) {  
    $_SESSION['status'] = 'error';
    $_SESSION['reason'] = 'emptypassword';
    $_SESSION['empty'] = 'all';
    header("Location: index.php");
 } 
 elseif (empty($_POST["username"])) {  
    $_SESSION['status'] = 'error';
    $_SESSION['reason'] = 'emptusername';
    $_SESSION['empty'] = 'all';
    header("Location: index.php");
 } 

else{
    $_SESSION['status'] = 'error';
    $_SESSION['reason'] = 'notfound';
    header("Location: index.php");

}


?>