<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'db_tools.php';
require_once ENGINE_DIR . 'main_tools.php';
require_once ENGINE_DIR . 'product_tools.php';
require_once ENGINE_DIR . 'gallery.php';

$id = get('id');
$product = getProductById($id);
addViewForImage($id);
render('product', ['product' => $product]);

