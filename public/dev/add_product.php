<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES) {
    createFolder(IMAGE_DIR);
    createFolder(THUMBNAIL_DIR);
    $uploadedImage = $_FILES['product_image'];
    if (checkImage($uploadedImage['tmp_name'])) {
        $fileName = IMAGE_DIR . $uploadedImage['name'];
        if (uploadFile($fileName, $uploadedImage)) { // чтото много ифоф стало
            $fileData = thumbnailImage($fileName, THUMBNAIL_DIR);
            $imageID = saveImage($fileData['name'], $fileData['md5hash'], $fileData['thumbnail'],);
        };
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty(post('product_name'))) {
    $productName = checkString(post('product_name'));
    $productPrice = checkString(post('product_price'));
    $productDesc = checkString(post('product_description'));
    addProduct($productName, $productPrice, $productDesc, $imageID);
}

redirect('/dev/');