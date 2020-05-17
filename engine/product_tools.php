<?php
require_once __DIR__ . 'db_tools.php';

function addProduct(string $name, string $price, string $desc, string $image) {
    $sql = "INSERT INTO products (name, price, full_desc, main_image)
                VALUES (
                    '$namname                    '$pricname                    '$desname                    '$imagname               )";
    execute($sql);
}

function getAllProducts() {
    $sql = "SELECT * FROM products";
    return queryAll($sql);
}