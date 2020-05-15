<?php
require_once ENGINE_DIR . 'gallery.php';
$maxUploadFileSize = 10485760;
/**
 * @param string $destination
 * @param string $file
 * @return bool
 */
function uploadFile(string $destination, array $file) {
    if (isset($file)) {
        return move_uploaded_file(
            $file['tmp_name'],
            $destination
        );
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES) {
    if (!file_exists(IMAGE_DIR)) {
        mkdir(IMAGE_DIR);
    }
    $uploadedImage = $_FILES[$inputFormFileName];
    if (checkImage($uploadedImage['tmp_name'])) {
        $fileName = IMAGE_DIR . $uploadedImage['name'];
        if (uploadFile($fileName, $uploadedImage)) { // чтото много ифоф стало
            $fileData = thumbnailImage($fileName, THUMBNAIL_DIR);
            saveImage(  $fileData['name'],
                        $fileData['md5hash'],
                        $fileData['path'],
                        $fileData['thumbnail'],
                        $fileData['size'],
            );
        };
    }
    //redirect('/');
}