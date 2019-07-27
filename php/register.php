<?php

require_once 'connect.php';
require_once 'functions.php';

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$street = $_GET['street'];
$home = $_GET['home'];
$part = $_GET['part'];
$appt = $_GET['appt'];
$floor = $_GET['floor'];
$comment = $_GET['comment'];
$payment = $_GET['payment'];
$callback = $_GET['callback'];

$userId = searchUser($email);

if (empty($userId)) {
  addNewUser($name, $email, $phone);
  $userId = searchUser($email);
}

$orderId = addNewOrder($userId, $street, $home, $part, $appt, $floor, $comment, $payment, $callback);

$countOrders = getAllUserOrders($userId);
$address = 'улица: ' . $street . ', дом: ' . $home . ', корпус: ' . $part . ', квартира: ' . $appt . ', этаж: ' . $floor;

$infoOrder = 'Информация о заказе: DarkBeefBurger за 500 рублей, 1 шт';
$getTotalUserOrder = 'Спасибо! Это уже ' . $getTotalUserOrder . ' заказ' . PHP_EOL;
$subject = "заказ №{$orderId}";

mail($email, $subject, getMessage($orderId, $address, $countOrders));
