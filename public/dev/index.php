<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'db_tools.php';
require_once ENGINE_DIR . 'main_tools.php';
require_once ENGINE_DIR . 'upload.php';
require_once ENGINE_DIR . 'product_tools.php';
require_once PUBLIC_DIR . 'auth/index.php';
//var_dump($_GET);
$products = getAllProductsWithImages();

render('dev', ['products' => $products]);

if (isset($_GET['action']) && $_GET['action'] == "remove") {
    removeProductByImageID(get('image_id'));
    redirect('/dev/');
    exit();
}