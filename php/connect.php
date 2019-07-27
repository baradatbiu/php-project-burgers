<?php

function getConnection()
{
    try {
      $pdo = new PDO('mysql:host=127.0.0.1:3306; dbname=db_burgers;', 'root', '');
    } catch (PDOException $e) {
      echo('error: ' . $e->getMessage());
      die();
    }
  return $pdo;
}
