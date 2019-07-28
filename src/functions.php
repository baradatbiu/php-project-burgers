<?php

require_once 'connect.php';

function searchUser($email)
{
  $pdo = getConnection();
  $ret = $pdo->prepare('SELECT id FROM users WHERE email = :email');
  $ret->bindParam(':email', $email);
  $ret->execute();
  $ret = $ret->fetchAll(PDO::FETCH_ASSOC)[0];
  return $ret['id'];
}

function addNewUser($name, $email, $phone)
{
  $pdo = getConnection();
  $ret = $pdo->prepare('INSERT INTO users (name, phone, email) VALUES (:name, :phone, :email)');
  $ret->bindParam(':name', $name);
  $ret->bindParam(':email', $email);
  $ret->bindParam(':phone', $phone);
  $ret->execute();
  return $ret;
}

function allUsers()
{
  $pdo = getConnection();
  $ret = $pdo->prepare('SELECT * FROM users');
  $ret->execute();
  $ret = $ret->fetchAll(PDO::FETCH_ASSOC);
  return $ret;
}

function addNewOrder($userId, $street, $home, $part, $appt, $floor, $comment, $payment, $callback)
{
  $pdo = getConnection();
  $query = "INSERT INTO 
    orders (user_id, street, home, part, appt, floor, comment, callback, payment) 
    VALUES 
    (:userId, :street, :home, :part, :appt, :floor, :comment, :callback, :payment);";

  $ret = $pdo->prepare($query);
  $ret->bindParam(':userId', $userId);
  $ret->bindParam(':street', $street);
  $ret->bindParam(':home', $home);
  $ret->bindParam(':part', $part);
  $ret->bindParam(':appt', $appt);
  $ret->bindParam(':floor', $floor);
  $ret->bindParam(':comment', $comment);
  $ret->bindParam(':callback', $callback);
  $ret->bindParam(':payment', $payment);
  $ret->execute();
  return $pdo->lastInsertId();
}

function allOrders()
{
  $pdo = getConnection();
  $ret = $pdo->prepare('SELECT * FROM orders');
  $ret->execute();
  $ret = $ret->fetchAll(PDO::FETCH_ASSOC);
  return $ret;
}

function getAllUserOrders($userId)
{
  $pdo = getConnection();
  $ret = $pdo->prepare('SELECT COUNT(*) as total FROM orders WHERE user_id = :userId');
  $ret->bindParam(':userId', $userId);
  $ret->execute();
  $orderSum = $ret->fetchAll(PDO::FETCH_ASSOC);
  return $orderSum[0]['total'];
}

function getMessage($orderId, $address, $countOrders)
{
  $output = "заказ №{$orderId}" . PHP_EOL;
  $output .= "Ваш заказ будет доставлен по адресу: {$address}" . PHP_EOL;
  $output .= "DarkBeefBurger за 500 рублей, 1 шт" . PHP_EOL;
  if ($countOrders > 1) {
    $output .= "Спасибо! Это уже {$countOrders} заказ" . PHP_EOL;
  } else {
    $output .= "Спасибо - это ваш первый заказ" . PHP_EOL;
  }

  return $output;
}
