<?php
session_start();

require_once __DIR__."/consts.php";

try
{  
	$pdo = new PDO ("mysql:host=localhost;dbname=".DBNAME, DBUSER, DBPASS);
}
catch (PDOException $e)
{
    header("Location: ../index.php");
    die();
}