<?php

function getConnection()
{
  $pdo = new PDO('mysql:host=127.0.0.1:3306; dbname=db_burgers;', 'root', '');
  return $pdo;
}
