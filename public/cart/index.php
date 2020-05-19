<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'db_tools.php';
require_once ENGINE_DIR . 'main_tools.php';
require_once ENGINE_DIR . 'product_tools.php';

if (isset($_GET['action']) && $_GET['action'] == "addtocart") {
    $product = getProductById(get('product_id'));
    //var_dump($product);
    render('cart', $product);
} else {
    render('cart');
}