<?php
require_once __DIR__ . '/../../config/config.php';
require_once ENGINE_DIR . 'autoload.php';
require_once PUBLIC_DIR . 'auth/index.php';

$orders = getAllOrders($_SESSION['user_id']);
$orderIDs = array_column($orders,'id');
$ordersItems = getAllOrdersItems(implode(',', $orderIDs));
//var_dump($orders,$ordersItems);
foreach ($orders as $order) {
    foreach ($ordersItems as $item) {
        if ($item['order_id'] == $order['id']) {
            echo  $item['name'] . '<br/>';
            echo  $item['quantity'] . '<br/>';
            echo  (int) $item['price'] . '<br/>';
        }
    }
}
echo render('orders', ['orders' => $orders, 'orderItems' => $ordersItems]);