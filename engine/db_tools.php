<?php
function getConnect() {
    $connParams = require_once CONFIG_DIR . 'db.php';
    static $DB_CONNECT = NULL;
    if (is_null($DB_CONNECT)) {
        $DB_CONNECT = mysqli_connect(   $connParams['host'],
                                        $connParams['db_user'],
                                        $connParams['db_password'],
                                        $connParams['db_name']
                                    );
    }
    return $DB_CONNECT;
}

function execute(string $sql) {
    if (!$result = mysqli_query(getConnect(), $sql)) {
        var_dump(mysqli_error(getConnect()));
    }
    return $result;
}

function queryAll(string $sql) {
    return mysqli_fetch_all(execute($sql),1);
}

function queryOne(string $sql) {
    return queryAll($sql)[0];
}

function closeConnect() {
    return mysqli_close(getConnect());
}