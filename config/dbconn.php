<?php
/** Имя базы данных для WordPress */
define('DB_NAME', 'gb_php-gallery');

/** Имя пользователя MySQL */
define('DB_USER', 'gb_php_user');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'LvyuP6g3LwBdW3B');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4_unicode_ci');

$DB_CONNECT = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);