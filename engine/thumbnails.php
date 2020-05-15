<?php

function thumbnailImage(string $image, string $thumbPath, int $width = 300, int $height = 300) {
    $imgData = pathinfo($image); // dirname basename extension filename
    $imageHash = md5_file($image);
    $imgThumbFile = $thumbPath . $imgData['filename'] . '_' . $imageHash . '.' .$imgData['extension'];
    $imagick = new Imagick($image);
    $imagick->thumbnailImage($width, $height, true);
    $imagick->writeImage($imgThumbFile);
    $imagick->destroy();
    return [
        'name' => $imgData['basename'],
        'md5hash' => $imageHash,
        'path' => 'img/' . $imgData['basename'],
        'thumbnail' => 'img/thumbnails/' . $imgData['filename'] . '_' . $imageHash . '.' .$imgData['extension'],
        //'upload_date' => date('Y-m-d H:i:s:v', time()),
        'size' => filesize($image),
    ];
}