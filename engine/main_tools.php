<?php
//список файлов в текущей дериктории
function getFileList(string $directory) {
    return glob( "{$directory}*.*", GLOB_BRACE);
}

// ф-я проверяет существует ли каталог, и в случае отсутствия создает
function createDir(string $path) {
    if (!file_exists($path)) {
        mkdir($path);
    }
}

// ф-я проверяет существует ли файл, и в случае отсутствия возвращает false
function isFileExist($file) {

    return file_exists($file);
}

/**
 * @param string $object
 * @return bool Вернет true если файл gif, jpg, png
 */
function checkImage(string $object) {
    $regExpString = '/^((474946383[79]61)|(ffd8)|(89504e470d0a1a0a))/'; // строка поиска
    /*$trueImages = [
        '474946383961' => 'gif', // H12
        '474946383761' => 'gif', // H12
        'ffd8' => 'jpg', // H4
        '89504e470d0a1a0a' => 'png', // H16
       // '424d' => 'bmp', // H4
    ];*/
    $fileData = unpack('H16', getFirstBytes($object));
    $firstBytes = array_pop($fileData);
    if (preg_match($regExpString, $firstBytes)) {
        return true;
    }
    return false;
    /*
    if (!is_array($object)) {
        $fileData = getFirstBytes($object);
        $firstBytes = array_pop(unpack('H16', $fileData));
        return preg_match($regExpString, $firstBytes);
    } else {
        foreach ($object as $image) {
            unset($fileData);
            $fileData = getFirstBytes($image);
            //var_dump($fileData);
            $firstBytes = array_pop(unpack('H16', $fileData));
            //var_dump($firstBytes);
            var_dump(preg_match($regExpString, $firstBytes));

            //var_dump(preg_match('/^474946383[79]61/', array_pop(unpack('H12', $fileData))));
            //if (unpack('H12', $fileData).match == '474946383961')
            //var_dump(unpack("H12", $fileData));
        }
    }*/
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
    //var_dump(unpack('H16', $fileData));
    fclose($f);
    return $fileData;
}

function redirect(string $url) : void {
    header("Location: {$url}");
    exit;
}