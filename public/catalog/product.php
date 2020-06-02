<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

$productID = get('id');
$product = getProductById($productID);
$reviews = getAllReviews($productID);
addViewForImage($productID);
echo render('product', ['product' => $product, 'reviews' => $reviews]);

