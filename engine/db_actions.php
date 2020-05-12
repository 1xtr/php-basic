<?php

function insertRow(array $array) {
    $DB_CONNECT = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    $sql = "INSERT INTO images (name, md5hash, `path`, thumbnail, upload_date, `size`)
                VALUES  (   \"{$array[name]}\",
                            \"{$array[md5hash]}\",
                            \"{$array[path]}\",
                            \"{$array[thumbnail]}\",
                            NOW(),
                            \"{$array[size]}\"
                            )";
    var_dump($sql);
    if (!$res = mysqli_query($DB_CONNECT, $sql)) {
        var_dump(mysqli_error($DB_CONNECT));
    }
    mysqli_close($DB_CONNECT);
}