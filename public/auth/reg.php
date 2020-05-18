<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'db_tools.php';
require_once ENGINE_DIR . 'main_tools.php';
require_once ENGINE_DIR . 'authorization.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = post('login');
    $password = getHash(post('password'));
    $email = validateEmail(post('email'));

    if(validateString($login) && $email){
        createUser($login, $email, $password);
        echo 'Вы успешно зарегистрировались с именем пользователя: ' . $login . ' и почтой: ' . $email;
    } else {
        echo "Неверно введен логин или почта";
    }
    exit;
} else {
    render('reg_form');
}


