<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

// подключаем эту строку на тех страницах где надо авторизовать пользователя
require_once PUBLIC_DIR . 'auth/index.php';

$user = getUserByID($_SESSION['user_id']);

echo render('profile', ['user' => $user]);
