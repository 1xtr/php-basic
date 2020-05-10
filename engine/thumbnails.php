<?php
//$thumbWidth = 300;
//$thumbHeight = 300;
function thumbnailImage($image, $thumbPath) {
    $imgData = pathinfo($image); // dirname basename extension filename
    $imageHash = md5_file($image);
    $imgThumbFile = $thumbPath . $imgData['filename'] . '_' . $imageHash . '.' .$imgData['extension'];
    $imagick = new Imagick($image);
    $imagick->thumbnailImage(300, 300, true);
    $imagick->writeImage($imgThumbFile);
    $imagick->destroy();
}

function createThumbnails($imagesArr, $thumbPath) {
    if (!createDir($thumbPath) || count(scandir($thumbPath)) == 2) {
        // проверяем существовала/пустая ли папка, если нет, то создаем её и вернем false,
        //если файлов в ней нет значит к черту проверки делаем превью для всех
        foreach ($imagesArr as $image) {
            thumbnailImage($image, $thumbPath);
        }
    } else { // иначе какие то файлы были уже, делаем хеш и сверяем по именам файлов. превью имеют имя в виде хеша md5 файла оригинала
        $thumb_files_array = scandir($thumbPath); //сканим папку
        foreach ($imagesArr as $image) {
            $hash = md5_file($image); // создаем хеш
            if (count(preg_grep("/$hash/", $thumb_files_array)) == 0) { // ищем в массиве найденных файлов по хэшу, если не нашли то создаем превью
                thumbnailImage($image, $thumbPath);
            }
        }
    }
}