<?php

//Проверка наличие БД
error_reporting( E_ERROR );
require_once("includes/data.php");

file_exists(__DIR__ . "\\{$uploaddir}") ? null : mkdir(__DIR__ . "\\{$uploaddir}");

$opt = array(
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
try {
	$pdo = new PDO($dsn, $user, $pass, $opt);
	header("Location: /register.php");
} catch (PDOException $e) {
	require_once("errors/checkdb.php");
	die();
}





