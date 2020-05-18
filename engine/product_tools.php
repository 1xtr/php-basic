<?php

function addProduct(string $name, string $price, string $desc, int $imageID) {
    $sql = "INSERT INTO products (name, price, full_desc, image_id)
                VALUES (
                    '{$name}',
                    '{$price}',
                    '{$desc}',
                    {$imageID}
                )";
    return execute($sql);
}

function addProductImage(string $tmpImage) {
    //сначала чекаем картинку на предмет картинковости, если все ок картинка вернет путь к ней
    //делаем превью
    // загружаем в папку
    //пишем в базу инфу

}

function getAllProducts() {
    $sql = "SELECT * FROM products";
    return queryAll($sql);
}

function getAllProductsWithImages() {
    $sql = "SELECT ITEM.*, IMAGES.preview_name, IMAGES.original_name FROM product_image AS IMAGES
                INNER JOIN products AS ITEM WHERE ITEM.image_id = IMAGES.id";
    return queryAll($sql);
}

function getProductById(int $id) {
    $sql = "SELECT ITEM.*, IMAGES.preview_name, IMAGES.original_name FROM product_image AS IMAGES
                INNER JOIN products AS ITEM WHERE ITEM.image_id = IMAGES.id AND ITEM.id = {$id}";
    return queryOne($sql);
}

function addReview($review, $productID, $userID) {
    $sql = "INSERT INTO product_review VALUES (DEFAULT, '$review', NOW(), '$productID', '$userID')";
    return execute($sql);
}

function getAllReviews($id) {
    $sql = "SELECT REVIEWS.*, AUTHOR.login FROM product_review as REVIEWS INNER JOIN users as AUTHOR 
                WHERE REVIEWS.author = AUTHOR.id AND REVIEWS.product_id = {$id}";
    return queryAll($sql);
}