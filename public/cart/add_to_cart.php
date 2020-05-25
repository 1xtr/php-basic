<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

if (isset($_GET) && !empty($_GET['product_id'])) {
    $product = getProductById(get('product_id'));
    var_dump($product);
    //redirect($_SERVER['HTTP_REFERER']);
}