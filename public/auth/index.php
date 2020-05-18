<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'db_tools.php';
require_once ENGINE_DIR . 'main_tools.php';
require_once ENGINE_DIR . 'authorization.php';

if (isset($_COOKIE['user_token']) && !empty($_COOKIE['user_token'])) {
    $user_id = getUserByToken(remote_ip(), $_COOKIE['user_token']);
    if ($user_id) {
        authorize($user_id['user_id']);
    }
}
if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = post('login');
    $password = post('password');
    $rememberMe = post('rememberMe');
    $user = getUserByLogin($login);

    if($user && $user['password'] == getHash($password)) {
        authorize($user['id'], $rememberMe, $user['is_admin']);
        redirect($_SERVER['REQUEST_URI']);
        exit();
    } else {
        echo "Неверно указаны логин или пароль.";
    }
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == "logout") {
    deleteAuthorizationToken();
    session_destroy();
    setcookie("user_token", "", time() - 3600);
    redirect('/');
    exit();
}

if (!isset($_SESSION['authorized'])) {
    render('login');
    exit();
}
