<?php

  [$host, $port, $dbName, $userName, $password] = $config;

  $pdo = new PDO('mysql:host=' . $host . ':' . $port . ';dbname=' . $dbName, $userName, $password);
