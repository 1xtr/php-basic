<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

if (isset($_GET['user_id']) && !empty($_GET['review'])) {
    $userID = (int)get('user_id');
    $productID = (int)get('product_id');
    $review = checkString(get('review'));
    addReview($review, $productID, $userID);
    redirect($_SERVER['HTTP_REFERER']);
    exit();
}

