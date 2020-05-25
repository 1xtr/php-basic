<?php

function autoload(){
    $files = array_diff(scandir(ENGINE_DIR), ['.','..', 'autoload.php']);
    foreach ($files as $file){
        if(substr($file, -4) == ".php"){
            include_once ENGINE_DIR . DIRECTORY_SEPARATOR . $file;
        }
    }
}
autoload();