<?php

function render(string $template, array $params = [], $useLayout = true){
    $content = renderTemplate($template, $params);
    if($useLayout) {
        $content = renderTemplate('layout', ['content' => $content]);
    }
    return $content;
}

function renderTemplate(string $template, array $params = [])
{
    ob_start();
    extract($params);
    include VIEWS_DIR . "{$template}.php";
    return ob_get_clean();
}