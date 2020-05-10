<?php
// ф-я проверяет существует ли каталог, и в случае отсутствия создает
function createDir(string $path) {
    if (!is_dir($path)) {
        mkdir($path);
    }
}

// ф-я проверяет существует ли файл, и в случае отсутствия возвращает false
function isFileExist($file) {
    return file_exists($file);
}
