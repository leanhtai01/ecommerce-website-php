<?php
$url = getenv("DB_URL");

$dbparts = parse_url($url);

$hostname = $dbparts["host"];
$username = $dbparts["user"];
$password = $dbparts["pass"];
$database = ltrim($dbparts["path"], '/');

$pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
