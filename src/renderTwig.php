<?php
require_once '../vendor/autoload.php';

function renderTwig($orderId, $address)
{
  $loader = new \Twig\Loader\ArrayLoader([
    'index' => 'Ваш заказ №{{ orderId }} будет доставлен по адресу: {{ address }}. DarkBeefBurger за 500 рублей, 1 шт',
  ]);
  $twig = new \Twig\Environment($loader);
  echo $twig->render('index', ['address' => $address, 'orderId' => $orderId]);
}
