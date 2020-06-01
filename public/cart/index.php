<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';
$cart = [];
$cartTotal = NULL;
if (!empty($_SESSION['cart'])) {
    $cartItemsIds = implode(',',array_keys($_SESSION['cart']));
    $cartItems = getProductsByID($cartItemsIds);
    foreach ($cartItems as $item) {
        $cart[] = [
            'id' => $item['id'],
            'name' => $item['name'],
            'qtt' => (int) $_SESSION['cart'][$item['id']],
            'price' => $item['price'],
            'subtotal' => (int) $_SESSION['cart'][$item['id']] * $item['price'],
        ];

    }
    $cartTotal += array_sum(array_column($cart, 'subtotal'));
    echo render('cart', ['cart' => $cart, 'cartTotal' => $cartTotal]);
} else {
    echo render('cart');
}
