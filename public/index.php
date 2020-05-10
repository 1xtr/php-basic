<?php
require_once __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . "main_tools.php"; // функции работы с папками (на самом деле там пока одна ф-я)
require_once ENGINE_DIR . "thumbnails.php"; //
$imageDir = "img/";
//$thumbWidth = 300;
//$thumbHeight = 300;
$imageThumbDir = $imageDir . 'thumbnails/'; // путь до папки с прьвьюшками

$img_files_array = glob( "{$imageDir}*.{jpg,png,jpeg}", GLOB_BRACE); // массив изображений
//var_dump($img_files_array);
createThumbnails($img_files_array, $imageThumbDir);

$thumb_files_array  = glob( "{$imageThumbDir}*.{jpg,png,jpeg}", GLOB_BRACE); // массив превью
//var_dump($thumb_files_array);

require_once VIEWS_DIR . "header.inc"; // Вставляем html, открываем <body>

for ($i = 0; $i < count($img_files_array); $i++) {
    echo "<a data-fancybox=\"gallery\" href=\"$img_files_array[$i]\">";
    echo "<img src=\"$thumb_files_array[$i]\" class=\"img-thumbnail mx-auto\" alt=\'image\'></a>";
}
//require_once VIEWS_DIR . "upload_form.php";
require_once VIEWS_DIR . "body.inc"; // закрыли </body>
