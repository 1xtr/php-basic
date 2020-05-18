<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'db_tools.php';
require_once ENGINE_DIR . 'main_tools.php';

require_once PUBLIC_DIR . 'auth/index.php';

$user = getUserByID($_SESSION['user_id']);

render('profile', ['user' => $user]);
