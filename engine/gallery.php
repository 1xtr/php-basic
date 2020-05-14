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
//    var_dump($sql);
    return execute($sql);
}

function getAllImages() {
    $sql = "SELECT * FROM images ORDER BY views_count DESC";
    return queryAll($sql);
}

function getImage($id) {
    $sql = "SELECT * FROM images WHERE id = {$id}";
    return query($sql);
}

function addViewForImage($id) {
    $sql = "UPDATE images SET views_count = views_count + 1 WHERE id = {$id}";
    return execute($sql);
}