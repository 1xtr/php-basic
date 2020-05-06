<?php
// задание 1
echo "задание 1.<br/>С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.", "<br/>";
$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0) {
        echo $i++, ",";
    } else {
        $i++;
    }
}
echo '<br/><br/>';
// задание 2
echo "задание 2.<br/>С помощью цикла do…while написать функцию для вывода чисел от 0 до 10", "<br/>";
$i = 0;
do {
    if ($i == 0) {
        echo $i . ' - это ноль', "<br/>";
        $i++;
    } elseif ($i % 2 == 0) {
        echo $i . ' - четное число', "<br/>";
        $i++;
    } else {
        echo $i . ' - нечётное число', "<br/>";
        $i++;
    }
} while ($i <= 10);
echo '<br/><br/>';

// задание 3
echo "задание 3.<br/>Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области.", "<br/><br/>";
$areas = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Республика Татарстан" => ["Казань", "Набережные Челны", "Альметьевск", "Нижнекамск", "Чистополь"]
];
foreach ($areas as $key => $area) {
    echo $key, ":<br/>";
    foreach ($area as $city) {
        echo $city;
        if (!next($area)) {
            echo ".";
        } else {
            echo ", ";
        }

    }
    echo "<br/><br/>";
}

// задание 4, нашел потом функцию mb_eregi_replace()
echo "задание 4.<br/>Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские 
буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк.";
echo '<br/><br/>';
unset($string);
$string = 'Текст для транслитерации ляля тополя';
$alphabet = [
    'а' => 'a',
    'б' => 'b',
    'в' => 'v',
    'г' => 'g',
    'д' => 'd',
    'е' => 'e',
    'ё' => 'yo',
    'ж' => 'zh',
    'з' => 'z',
    'и' => 'i',
    'й' => 'y',
    'к' => 'k',
    'л' => 'l',
    'м' => 'm',
    'н' => 'n',
    'о' => 'o',
    'п' => 'p',
    'р' => 'r',
    'с' => 's',
    'т' => 't',
    'у' => 'u',
    'ф' => 'f',
    'х' => 'kh',
    'ц' => 'ts',
    'ч' => 'ch',
    'ш' => 'sh',
    'щ' => 'sch',
    'ъ' => '',
    'ы' => 'y',
    'ь' => '',
    'э' => 'e',
    'ю' => 'yu',
    'я' => 'ya',
    ' ' => '_',
];

function transliteration($str, $arr)
{
    // приведем исходную строку к нижнему регистру
    $string = mb_strtolower($str);
    // разобъем строку на массив из символов
    $stringArray = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
    //var_dump($stringArray);
    // для каждого символа из строки делаем сравнение, в случае совпадения добавляем символ в новую строку
    foreach ($stringArray as $let) {
        foreach ($arr as $key => $value) {
            if ($let == $key) {
                $translit .= $value;
            }
        }
    }
    return $translit;
}
echo "Исходная строка: " . $string . "<br/>";
echo "Транслит: " . transliteration($string, $alphabet);

/// задание 5
$stringWithSpaces = "Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку la la la";
echo '<br/><br/>';
echo "задание 5.<br/>" . $stringWithSpaces;
echo '<br/>';
function spaceReplace($str)
{
    return mb_eregi_replace("\s", "_", trim($str));
}
echo "Строка с замененными пробелами: " . spaceReplace($stringWithSpaces);
echo '<br/><br/>';
// задание 6

// В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP.
// Необходимо представить пункты меню как элементы массива и вывести их циклом.
// Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.

$menu = [
    "Главная",
    "Каталог" => ["Поршневые", "Реактивные", "Турбопроп"],
    "Контакты",
];
echo "<ul>";
foreach ($menu as $menuUL => $menuLI) {
    //var_dump($menuUL);
    //var_dump($menuLI);
    if (!is_array($menuLI)) {
        echo "<li>$menuLI</li>";
    } else {
        echo "<li>$menuUL<ul>";
        foreach ($menuLI as $menuItem) {
            echo "<li>$menuItem</li>";
        }
        echo "</ul></li>";
    }
}
echo "</ul>";
//
// задание 7
// *Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. Выглядеть это должно так:
// for(…){// здесь пусто}
//unset($i, $value, $let);
//for ($i = 0; $i < 10; print $i, $i++)
//
// задание 8
// Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».
echo '<br/><br/>';
foreach ($areas as $key => $area) {
    echo $key, ":<br/>";
    foreach ($area as $city) {
        //var_dump(mb_substr($city, 0, 1));
        $firstLetter = mb_strtolower(mb_substr($city, 0, 1));
        if ($firstLetter == 'к') {
            echo $city, ", ";
        }
    }
    echo "<br/><br/>";
}
//
// задание 9
// Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
// производит транслитерацию и замену пробелов на подчеркивания
// (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах)

echo "Для решения 9 задания этого задания добавил в массив alphabet значение для замены пробела на андерлаин ' ' => '_' ";