<?php
include "../config/database.php";
include "../repository/userRepository.php";

session_start();

if(!empty($_POST)){
    
    $user = getUserByUsername($_POST["name"]);
    
    if($user){
        if(password_verify($_POST['password'], $user["password"])){
            
            //création d'une session
            $_SESSION["user"] = $user["name"];
            
            //redirection vers la page top secrète
            header("Location: ../accueil.php");
            exit;
        }
        else{
            $error = "Identifiant ou mot de passe incorrect";
        }
    }
    else{
         $error = "Identifiant ou mot de passe incorrect";
    }
}

$template = 'signin';
include "layout.phtml";