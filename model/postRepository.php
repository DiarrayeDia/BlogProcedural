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
