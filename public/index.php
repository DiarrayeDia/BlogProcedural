<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

ob_start();
try {
    if ($page === 'post.home') {
        require dirname(__DIR__) . '/model/postRepository.php';
        $posts = findAll();

        require dirname(__DIR__) . 'post/home.php';
    } elseif ($page === 'post.show') {

        require dirname(__DIR__) . 'model/postRepository.php';
        $post = findpostID($_GET['id']);

        require dirname(__DIR__) . 'post/show.php';
    } elseif ($page === 'user.connect') {
        require dirname(__DIR__) . 'user/connectionForm.php';
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    require dirname(__DIR__) . 'view/error/error404.php';
}
$content = ob_get_clean();

require dirname(__DIR__) . 'base.php';
