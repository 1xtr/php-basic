<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

$content = getAllProductsWithImages();

echo render('catalog', ['content' => $content]);