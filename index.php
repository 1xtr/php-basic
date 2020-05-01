<?php
$imageDir = "img/";
$imageThumbDir = $imageDir . 'thumbnails/'; // путь до папки с прьвьюшками
$img_files_array = glob( "{$imageDir}*.{jpg,png,jpeg}", GLOB_BRACE); // массив изображений
//var_dump($img_files_array);
createThumbnails($imageDir, $imageThumbDir);

$thumb_files_array  = glob( "{$imageThumbDir}*.{jpg,png,jpeg}", GLOB_BRACE); // массив превью
//var_dump($thumb_files_array);

function thumbnailImage($image, $thumbPath) {
    $imgData = pathinfo($image); // dirname basename extension filename
    $imageHash = md5_file($image);
    $imgThumbFile = $thumbPath . $imageHash . '.' .$imgData['extension'];
    $imagick = new Imagick($image);
    $imagick->thumbnailImage(300, 300, true);
    $imagick->writeImage($imgThumbFile);
    $imagick->destroy();
}

function isDirExist($path) {
    if (!is_dir($path)) {
        mkdir($path);
        return false;
    }
    return true;
}

function createThumbnails($imagesArr, $thumbPath) {
    if (!isDirExist($thumbPath)) { // проверяем существовала ли папка, если нет, то создаем её и вернем false
        foreach ($imagesArr as $image) {
            thumbnailImage($image, $thumbPath); // т.к. папки с превью не существовало, то делаем превью для всех файлов
        }
    } else { // иначе, если папка была то делаем хеш и сверяем по именам файлов. превью имеют имя в виде хеша md5 файла оригинала
        $thumb_files_array = scandir($thumbPath); //сканим папку
        foreach ($imagesArr as $image) {
            $hash = md5_file($image); // создаем хеш
            if (count(preg_grep("/$hash/", $thumb_files_array)) == 0) { // ищем в массиве найденных файлов по хэшу, если не нашли то создаем превью
                thumbnailImage($image, $thumbPath);
            };
        }
    }
}


