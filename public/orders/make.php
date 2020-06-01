<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $userID = $_SESSION['user_id'];
    //$orderNum = makeOrder($cart, $userID);
}

echo render('make_order');