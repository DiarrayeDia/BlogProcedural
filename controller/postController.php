<?php
function home()
{
    require dirname(__DIR__) . '/model/postRepository.php';
    $posts = findAll();
    render('home', compact('posts'));
}

function show()

{
    require dirname(__DIR__) . '/model/postRepository.php';
    $id = htmlspecialchars($_GET['id']);

    $post = findOnebyID($id);
    render('show', compact('post'));

    // compact prend la variable post et crée un tableau {["post"] => {["id"] ["title"] ["content"]}}
}

function render($view, $data)
{
    extract($data);

    ob_start();
    require dirname(__DIR__) . '/view/post/' . $view . '.php';
    $content = ob_get_clean();
    require dirname(__DIR__) . '/view/base.php';
}
