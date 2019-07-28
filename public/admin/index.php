<?php
require_once '../../src/functions.php';
?>

<!doctype html>
<html lang="ru">
<head>
  <title>Админ-панель</title>
</head>
<body>
<h3>Таблица пользователй</h3>
<table>
  <tr>
    <th>id</th>
    <th>Имя</th>
    <th>Почта</th>
    <th>Телефон</th>
  </tr>

  <?php
  $users = allUsers();
  foreach ($users as $user) {
    echo "<tr>";
    foreach ($user as $item) {
      echo "<td>{$item}</td>";
    }
    echo "</tr>";
  }
  ?>

</table>

<h3>Таблица заказов</h3>
<table>
  <tr>
    <th>id</th>
    <th>user id</th>
    <th>Улица</th>
    <th>Дом</th>
    <th>Корпус</th>
    <th>Квартира</th>
    <th>Этаж</th>
    <th>Сообщение</th>
    <th>Оплата</th>
    <th>Перезвонить</th>
  </tr>

  <?php
  $orders = allOrders();
  foreach ($orders as $order) {
    echo "<tr>";
    foreach ($order as $item) {
      echo "<td>{$item}</td>";
    }
    echo "</tr>";
  }
  ?>
</table>

</body>
</html>