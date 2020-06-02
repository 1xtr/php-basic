<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';
$cart = [];
$cartTotal = NULL;
if (!empty($_SESSION['cart'])) {
    $cart = getCartTable($_SESSION['cart']);
    $cartTotal += array_sum(array_column($cart, 'subtotal'));
    echo render('cart', ['cart' => $cart, 'cartTotal' => $cartTotal]);
} else {
    echo render('cart');
}
