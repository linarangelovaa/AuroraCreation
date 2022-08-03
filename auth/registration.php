<?php

require_once "../autoload.php";

$username = "";
$pass = "";
$password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT);
$sql = "INSERT INTO users(username, password) VALUES (:username, :password)";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $_SESSION['status'] = 'error';
        $_SESSION['reason'] = 'emptyusername';
        $_SESSION['empty'] = 'all';
        header("Location: register.php");
    } elseif (empty($_POST["password"])) {
        $_SESSION['status'] = 'error';
        $_SESSION['reason'] = 'emptypassword';
        $_SESSION['old_pass'] = $_POST['password'];
        $_SESSION['old_usern'] = $_POST['username'];
        header("Location: register.php");
    } else {
        $username = input_data($_POST["username"]);
        $pass = input_data($_POST["password"]);
        $number = preg_match('@[0-9]@', $pass);
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $specialChars = preg_match('@[^\w]@', $pass);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $_SESSION['status'] = 'error';
            $_SESSION['reason'] = 'username';
            $_SESSION['old_pass'] = $_POST['password'];
            $_SESSION['old_usern'] = $_POST['username'];
            header("Location: register.php");
            die();
        } elseif (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            $_SESSION['status'] = 'error';
            $_SESSION['reason'] = 'password';
            $_SESSION['old_pass'] = $_POST['password'];
            $_SESSION['old_usern'] = $_POST['username'];
            header("Location: register.php");
            die();
        }
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute(['username' => $_POST['username'], 'password' => $password])) {
            $_SESSION['status'] = 'success';
            header("Location: index.php");
            die();
        }
    }
}


?>









?>
