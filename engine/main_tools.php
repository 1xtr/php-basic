<?php

function addSessionField(string $name, string $text) {
    $_SESSION[$name] = $text;
}

function remote_ip() {
    return $_SERVER['REMOTE_ADDR'];
}

function get(string $name) {
    return $_GET[$name];
}

function post(string $name) {
    return $_POST[$name];
}

function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}

function getHash(string $string) {
    return md5($string . "a5n29s13a17");
}

/**
 * @param string $object
 * @return bool Вернет true если файл gif, jpg, png
 */
function checkImage(string $object) {
    $regExpString = '/^((474946383[79]61)|(ffd8)|(89504e470d0a1a0a))/'; // строка поиска
    $fileData = unpack('H16', getFirstBytes($object));
    $firstBytes = array_pop($fileData);
    if (preg_match($regExpString, $firstBytes)) {
        return true;
    }
    return false;
}

/**
 * @param string $file
 * @param int $bytes
 * @return bool|false|string
 */
function getFirstBytes(string $file, int $bytes = 16) {
    unset($fileData);
    if (!$f = fopen($file, 'rb')) {
        return false;
    }
    $fileData = fread($f, $bytes);
    fclose($f);
    return $fileData;
}

function render(string $template, array $params = []) {
    ob_start();
    extract($params);
    include VIEWS_DIR . "{$template}.php";
    $content = ob_get_contents();
    ob_get_clean();
    return require_once VIEWS_DIR . 'layout.php';
}

/** Проверка строки логина на спец символы, разрешены только англ буквы, цифры, тире и знак подчеркивания
 * @param string $string
 * @return bool
 */
function validateString(string $string) : bool {
    $approvedSymbols = '[^A-Za-z0-9_-]';
    return !mb_eregi($approvedSymbols, $string);
}
function validateEmail(string $email) { //FILTER_VALIDATE_EMAIL
    return filter_var($email, 274);
}

function checkString (string $string) : string {
    $string = trim(strip_tags($string));
    $string = htmlspecialchars($string);
    return $string;
}

function createFolder(string $path) {
    if (!file_exists($path)) {
        mkdir($path, 0755);
    }

}

function getUserByID($id) {
    $sql = "SELECT * FROM users WHERE id = {$id}";
    return queryOne($sql);
}

function removeProductByID($id) {
    $sql = "DELETE FROM products WHERE id = {$id}";
    return execute($sql);
}

function removeProductByImageID($id) {
    $sql = "DELETE FROM product_image WHERE id = {$id}";
    return execute($sql);
}