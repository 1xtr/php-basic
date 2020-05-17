<?php
require_once ENGINE_DIR . 'db_actions.php';

function saveImage(string $name, string $md5hash, string $pathToOrigin, string $thumb, int $size, string $upload_date = 'NOW()') {
    $sql = "INSERT INTO images (name, md5hash, `path`, thumbnail, upload_date, `size`)
                VALUES  (   '{$name}',
                            '{$md5hash}',
                            '{$pathToOrigin}',
                            '{$thumb}',
                            {$upload_date},
                            {$size}
                            )";
    return execute($sql);
}

function getAllImages(string $field = "name", string $direction = "ASC") {
    $sql = "SELECT * FROM images ORDER BY {$field} {$direction}";
    return queryAll($sql);
}

function getImage($id) {
    $sql = "SELECT * FROM images WHERE id = {$id}";
    return queryOne($sql);
}

function addViewForImage($id) {
    $sql = "UPDATE images SET views_count = views_count + 1 WHERE id = {$id}";
    return execute($sql);
}

function parseSelect(string $string) {
    return $string = explode(":", $string);
}