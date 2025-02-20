<?php

function createUser(string $email, string $name, string $password){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("INSERT INTO user (name, email, password) VALUES (?,?,?)");
    
    $query->execute([$name, $email, $password]);
}

function getUserByUsername(string $name){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT * FROM user WHERE name = ?");
    
    $query->execute([$name]);
    
    return $query->fetch();
}

