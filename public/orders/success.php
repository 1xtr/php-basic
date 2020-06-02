<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';

echo render('order_success', ['orderNumber' => get('order_id')]);