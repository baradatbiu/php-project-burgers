<?php
if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['street']) && isset($_GET['home']) && isset($_GET['part']) && isset($_GET['appt']) && isset($_GET['floor']) && isset($_GET['comment'])) {
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
} else {
  return null;
}

require_once 'config.php';
require_once 'connect.php';
require_once 'functions.php';

$userId = searchUser($config, $email);

if (empty($userId)) {
  addNewUser($config, $name, $email, $phone);
  $userId = searchUser($config, $email);
}

$orderId = addNewOrder($config, $userId, $street, $home, $part, $appt, $floor, $comment, $payment, $callback);

$countOrders = getAllUserOrders($config, $userId);
$address = 'улица: ' . $street . ', дом: ' . $home . ', корпус: ' . $part . ', квартира: ' . $appt . ', этаж: ' . $floor;
$subject = "заказ №{$orderId}";

mail($email, $subject, getMessage($orderId, $address, $countOrders));
