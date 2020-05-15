<?php
$data = $_GET;
//var_dump($data);

if (!(($data['operation'] == 'div') && ($data['num2'] == 0))) {
    $result = $data['operation']($data['num1'], $data['num2']);
} else {
    $result = 'Cannot divide by ZERO';
}

function sum(int $num1, int $num2) {
    return $num1 + $num2;
}
function div(int $num1, int $num2) {
    return $num1 / $num2;
}
function multi(int $num1, int $num2) {
    return $num1 * $num2;
}
function sub(int $num1, int $num2) {
    return $num1 - $num2;
}