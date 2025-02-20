<?php

function getConnexion():object{
$pdo = new PDO('mysql:host=db.3wa.io;port=3306;dbname=valentincoriolles_sprint;charset=utf8', 'valentincoriolles', 'b4bb2b9fbe1d08d91c2e46f4b631cb00');

    return $pdo;
}