<?php
include "../config/database.php";
include "../repository/userRepository.php";

if(!empty($_POST)){
        $password = $_POST["password"];
        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        $name = $_POST["name"];
        $email = $_POST["email"];
        
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        createUser($_POST["email"], $_POST["name"], $passwordHash);
            
        $_SESSION["user"] = $_POST["name"];
        header("Location: ./game.php");
        exit;
}


$template = "register";
include "../layout.phtml";