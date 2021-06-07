<?php
function getDBConnexion()
{
    $user = "root";
    $pass = "root";
    $dbname = "blog";
    $host = "localhost";
    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

        $options = array(

            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        $db = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {

        print " Oops ... Erreur de connexion: " . $e->getMessage() . "<br/>";
        die();
    }

    return $db;
}


function findAll(): array
{
    $db = getDBConnexion();
    $request = $db->query('SELECT id, title, LEFT(content, 100) as content, user, date FROM post');
    $request->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $request->fetchAll();
    $request->closeCursor();
    return $posts;
}

function findpostID($id)
{
    $db = getDBConnexion();

    $request = $db->prepare('SELECT * FROM post WHERE id=?');
    $request->execute([$_GET['id']]);
    $request->setFetchMode(PDO::FETCH_ASSOC);
    $post = $request->fetch();
    $request->closeCursor();
    return $post;
}
