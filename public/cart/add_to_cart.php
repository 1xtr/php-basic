<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['product_id'])) {
    $productID = (int) post('product_id');
    //$productMaxQtt = (int) array_pop(getProductQttByID($productID));
    $productMaxQtt = getProductQttByID($productID);
    $productMaxQtt = (int) array_pop($productMaxQtt);
    if (!isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] = 1;
        redirect($_SERVER['HTTP_REFERER']);
    } else if ($_SESSION['cart'][$productID] < $productMaxQtt) {
        $_SESSION['cart'][$productID] += 1;
        redirect($_SERVER['HTTP_REFERER']);
    } else {
        redirect($_SERVER['HTTP_REFERER']);
    }

}