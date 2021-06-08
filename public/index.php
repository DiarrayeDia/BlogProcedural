<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

try {
    if ($page === 'post.home') {
        require dirname(__DIR__) . '/controller/postController.php';
        home();
    } elseif ($page === 'post.show') {

        require dirname(__DIR__) . '/model/postRepository.php';
        $post = findOnebyID($_GET['id']);

        require dirname(__DIR__) . '/view/post/show.php';
    } elseif ($page === 'user.connect') {
        require dirname(__DIR__) . '/controller/userController.php';
        userConnect();
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    require dirname(__DIR__) . '/controller/errorController.php';
    error404();
}
