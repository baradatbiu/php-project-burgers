<?php

$host = $config['host'];
$port = $config['port'];
$dbName = $config['dbName'];
$userName = $config['userName'];
$password = $config['password'];

$pdo = new PDO("mysql:host=$host:$port;dbname=$dbName", "$userName", "$password");
