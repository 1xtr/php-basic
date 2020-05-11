<?php

function checkFileType($file) {

}

function uploadFile(string $destination, string $fileName) {
    if (!isset($_FILES[$fileName])) { // проверяем существует ли файл,
        return move_uploaded_file(
            $_FILES[$fileName]['tmp_name'],
            $destination
        );
    }
    return false;
}