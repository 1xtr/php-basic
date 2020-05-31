<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';
$cart = [];

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
    echo render('cart', ['cart' => $cart]);
} else {
    echo render('cart');
}

//if (isset($_GET['action']) && $_GET['action'] == "addtocart") {
//    $product = getProductById(get('product_id'));
//    $cart = getCartBySessionID(session_id());
//    //var_dump($product);
//    render('cart', $product);
//} else {
//    render('cart');
//}



/*function getCartBySessionID($sessionID) {
    $sql = "SELECT * FROM cart WHERE user_session_id = {$sessionID}";
    return queryOne($sql);
}*/