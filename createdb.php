<?php
error_reporting( E_ERROR );
require_once("includes/data.php");

file_exists(__DIR__ . "\\{$uploaddir}") ? null : mkdir(__DIR__ . "\\{$uploaddir}");

$opt = array(
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

//Подключение к БД
$dsn = "mysql:host=$host;charset=$charset";
try {
	$pdo = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
	require_once("errors/connectiondb.php");
	die();
}

//Создание таблиц в БД
$pdo->exec("CREATE DATABASE IF NOT EXISTS {$dbname}");
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$pdo = new PDO($dsn, $user, $pass, $opt);

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
name_user VARCHAR(80) NOT NULL,
email VARCHAR(60) NOT NULL,
password VARCHAR(70) NOT NULL,
UNIQUE (email)
);";

$pdo->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS files (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) NOT NULL,
full_path TEXT NOT NULL,
path TEXT NOT NULL,
name_file TEXT NOT NULL,
type_file VARCHAR(10) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);";

$pdo->exec($sql);

$pdo = null;

//Перенаправление  на страницу с регистрацией
header("Location: /register.php");











