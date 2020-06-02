<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';
require_once PUBLIC_DIR . 'auth/index.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' AND !empty($_SESSION['cart'])){
    $orderNum = makeOrder($_SESSION['cart'], $_SESSION['user_id']);
    unset($_SESSION['cart']);
    redirect("/orders/success.php?order_id={$orderNum}");
}
