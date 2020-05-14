<?php
require_once __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . "main_tools.php"; // функции работы с папками (на самом деле там пока одна ф-я)
require_once ENGINE_DIR . 'gallery.php';

$id = get('id');
$image = getImage($id);
addViewForImage($id);
require_once VIEWS_DIR . 'photo.php';
