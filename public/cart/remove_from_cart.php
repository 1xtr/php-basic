<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';
$target = (int) get('id');
removeFromCartByID($target);
redirect($_SERVER['HTTP_REFERER']);