<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = post('login');
    $password = getHash(post('password'));
    $email = validateEmail(post('email'));

    if(validateString($login) && $email){
        createUser($login, $email, $password);
        echo 'Вы успешно зарегистрировались с именем пользователя: ' . $login . ' и почтой: ' . $email;
        redirectAfterTime('/', 5);
    } else {
        echo "Неверно введен логин или почта";
    }
    exit;
} else {
    echo render('reg_form');
}


