<?php
function error404()
{
    ob_start();
    require dirname(__DIR__) . '/view/error/error404.php';
    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
