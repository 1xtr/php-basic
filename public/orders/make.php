<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';
require_once PUBLIC_DIR . 'auth/index.php';

if (!empty($_SESSION['cart'])) {
    $cart = getCartTable($_SESSION['cart']);
    $cartTotal += array_sum(array_column($cart, 'subtotal'));
    $buyer = getUserByID($_SESSION['user_id']);
}
echo render('make_order', ['cart' => $cart,'buyer' => $buyer,'cartTotal' => $cartTotal]);