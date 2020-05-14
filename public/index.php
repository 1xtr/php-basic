<?php
require_once __DIR__ . '/../config/config.php';
require_once ENGINE_DIR . "main_tools.php"; // функции работы с папками (на самом деле там пока одна ф-я)
require_once ENGINE_DIR . "thumbnails.php"; //
require_once ENGINE_DIR . 'upload_file.php';


require_once VIEWS_DIR . "header.inc"; // Вставляем html, открываем <body>
/*
for ($i = 0; $i < count($img_files_array); $i++) {
    echo "<a data-fancybox=\"gallery\" href=\"$img_files_array[$i]\">";
    echo "<img src=\"$thumb_files_array[$i]\" class=\"img-thumbnail mx-auto\" alt=\'image\'></a>";
}*/
require_once VIEWS_DIR . 'gallery.php';
require_once VIEWS_DIR . "upload_form.php";
//var_dump($_FILES);

//var_dump(getFileList(IMAGE_DIR));
//$targetImage = getFileList(IMAGE_DIR);
//var_dump($targetImage);
//echo "<img src=\"$targetImage\">";
//checkImage($targetImage[0]);


require_once VIEWS_DIR . "footer.inc"; // закрыли </body>
