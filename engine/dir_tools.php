<?php
function isDirExist($path) {
    if (!is_dir($path)) {
        mkdir($path);
        return false;
    }
    return true;
}