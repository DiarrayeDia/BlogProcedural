<?php
function home()
{
    require dirname(__DIR__) . '/model/postRepository.php';
    $posts = findAll();
    require dirname(__DIR__) . '/view/post/home.php';
}
