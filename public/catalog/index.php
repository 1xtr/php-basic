<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'db_tools.php';
require_once ENGINE_DIR . 'main_tools.php';
require_once ENGINE_DIR . 'product_tools.php';

$content = getAllProductsWithImages();

render('catalog', ['content' => $content]);