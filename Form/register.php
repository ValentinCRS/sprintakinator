<?php
include "../config/database.php";
include "../repository/userRepository.php";

if(!empty($_POST)){
        $password = $_POST["password"];
        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    try {
        if(preg_match($regex, $password)){

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            createUser($_POST["email"], $_POST["name"], $passwordHash);
            
            $_SESSION["user"] = $_POST["name"];
            
            //redirection vers la page d'accueil
            header("Location: ../accueil.php");
            exit;

        } 
        else {
            throw new Exception('le message dois contenir au moins 12caracter, 1 minuscul, 1majuscul, 1caract spe');
        }
    } 
    catch (Exception $e) {
       $error_message = $e->getMessage();
    }
}
    else{
        echo "erreur";
}

$template = 'register';
include "layout.phtml";