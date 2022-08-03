<?php

require_once __DIR__."/consts.php";

function encrypt($text)
{
    return openssl_encrypt($text, "AES-128-ECB", ENCRYPTION_PASSWORD);
}

function decrypt($text)
{
    return openssl_decrypt($text, "AES-128-ECB", ENCRYPTION_PASSWORD);
}

function authOnly()
{
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        die();
    }
}    
function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
  }  
?>