<?php
//Домашка 2.1
echo "Домашка 2.1<br>";
function getRandomNumber($a, $b) {
    return random_int($a, $b);
}
$a = getRandomNumber(-100, 100);
$b = getRandomNumber(-100, 100);

echo "a= $a <br> b= $b <br>";

function compareInt ($x, $y) {
    if ($x >= 0 && $y >= 0) {
        return $x-$y;
    } elseif ($x < 0 && $y < 0) {
        return $x*$y;
    } else {
        return $x+$y;
    }
}
echo "result = " . compareInt($a, $b);
echo "<br><br><br>";

//Домашка 2.2
echo "Домашка 2.2<br>";
$a = getRandomNumber(0, 15);
echo "a=$a<br>";
switch ($a) {
    case 0:
        echo "0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15";
        break;
    default:
        for ($i = $a; $i <= 15; $i++) {
            $str .= $i . ',';
        }
        echo $str;
}
//Домашка 2.3
echo "<br><br><br>Домашка 2.3<br><br><br>";
function multiplication($x, $y) {
    return $x * $y;
}

function division($x, $y) {
    return $x / $y;
}

function addiction($x, $y) {
    return $x + $y;
}

function deduction($x, $y) {
    return $x - $y;
}


//Домашка 2.4
echo "Домашка 2.4<br>";
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "multiplication":
            return multiplication($arg1, $arg2);
        case "division":
            return division($arg1, $arg2);
        case "addiction":
            return addiction($arg1, $arg2);
        case "deduction":
            return deduction($arg1, $arg2);
    }
}
echo  mathOperation($a,$b, "multiplication") . "<br><br><br>";

//Домашка 2.5
echo "Домашка 2.5<br>";
echo "Today is " . date('Y') . " year";

//Домашка 2.6
echo "<br><br><br>Домашка 2.6<br>";
function power($val, $pow) {
    if ($pow === 1) {
        return $val;
    } else {
        return $val * power($val, $pow - 1);
    }
}
echo power(3,9);

//Домашка 2.7
echo "<br><br><br>Домашка 2.7<br>";
echo "Now " . date('H:i');
echo "<br>";
function getTime() {
    $hour = +date('H');
    $minutes = +date('i');
    //сначала получил текст для часов
    switch ($hour) {
        case 1:
        case 21:
            $hourText = " час";
            break;
        case 2:
        case 3:
        case 4:
        case 22:
        case 23:
            $hourText = " часа";
            break;
        default:
            $hourText = " часов";
    }
    // если минуты в диапазоне от 11 до 14 то сразу пишем "минут" иначе идем дальше
    if ($minutes >= 11 & $minutes <= 14) {
        $minutesText = " минут";
    } else {
        // для все остальных минут делим на 10 и по остатку смотрим какое будет окончание
        $minutesNew = $minutes % 10;
        switch ($minutesNew) {
            case 1:
                $minutesText = " минута";
                break;
            case 2:
            case 3:
            case 4:
                $minutesText = " минуты";
                break;
            default:
                $minutesText = " минут";
        }
    }
    // добавим лидирующие нули к часам и минутам
    $hour = str_pad($hour, 2, "0", STR_PAD_LEFT);
    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
    echo "Сейчас $hour $hourText $minutes $minutesText";
}
getTime();

/*
Часть функций взял из курса по js который был ранее, чуть подправил синтаксис для php
полностью переделал  последнее задание с часами минутами, т.к. на js задача была на рубли,рубля,рубль, на бабло вообщем прописью

 */