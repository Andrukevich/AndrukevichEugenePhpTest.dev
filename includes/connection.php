<?php

//Соединение с БД
require_once("data.php");

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$pdo = new PDO($dsn, $user, $pass, $opt);