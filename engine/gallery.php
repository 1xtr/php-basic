<?php
require_once ENGINE_DIR . 'db_tools.php';

function saveImage(string $name, string $md5hash, string $thumb) {
    $sql = "INSERT INTO product_image (original_name, origin_md5, preview_name)
                VALUES  ('{$name}', '{$md5hash}', '{$thumb}')";
    return executeID($sql);
}

function getAllImages(string $field = "name", string $direction = "ASC") {
    $sql = "SELECT * FROM product_image ORDER BY {$field} {$direction}";
    return queryAll($sql);
}

function getImage($id) {
    $sql = "SELECT * FROM product_image WHERE id = {$id}";
    return queryOne($sql);
}

function addViewForImage($id) {
    $sql = "UPDATE products SET views_count = views_count + 1 WHERE id = {$id}";
    return execute($sql);
}

function parseSelect(string $string) {
    return $string = explode(":", $string);
}

function thumbnailImage(string $image, string $thumbPath, int $width = 300, int $height = 300) {
    $imgData = pathinfo($image); // dirname basename extension filename
    $imageHash = md5_file($image);
    $thumbName = $imgData['filename'] . '_' . $imageHash . '.' .$imgData['extension'];
    $imgThumbFile = $thumbPath . $thumbName;
    $imagick = new Imagick($image);
    $imagick->thumbnailImage($width, $height, true);
    $imagick->writeImage($imgThumbFile);
    $imagick->destroy();
    return [
        'name' => $imgData['basename'],
        'md5hash' => $imageHash,
        'thumbnail' => $thumbName,
        //'path' => 'img/' . $imgData['basename'],
        //'upload_date' => date('Y-m-d H:i:s:v', time()),
        //'size' => filesize($image),
    ];
}