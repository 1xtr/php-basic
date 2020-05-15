<?php
define("DOCUMENT_ROOT", __DIR__ . "/../");
define("CONFIG_DIR", DOCUMENT_ROOT . "config/");
define("ENGINE_DIR", DOCUMENT_ROOT . "engine/");
define("VIEWS_DIR", DOCUMENT_ROOT . "views/");
define("UPLOADS_DIR", DOCUMENT_ROOT . "uploads/");
define("PUBLIC_DIR", DOCUMENT_ROOT . "public/");
define("IMAGE_DIR", PUBLIC_DIR . "img/");
define("THUMBNAIL_DIR", IMAGE_DIR . "thumbnails/");

$inputFormFileName = "image-file"; // имя файла в форме загрузки файла
$thumbWidth = 300;
$thumbHeight = 300;