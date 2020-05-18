<?php
require_once ENGINE_DIR . 'gallery.php';

/**
 * @param string $destination
 * @param string $file
 * @return bool
 */
function uploadFile(string $destination, array $file) {
    if (isset($file)) {
        return move_uploaded_file(
            $file['tmp_name'],
            $destination
        );
    }
    return false;
}

