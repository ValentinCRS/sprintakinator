<?php

function getFirstQuestion(){
    $pdo = getConnection();
    $rodry = $pdo->query("SELECT * FROM question WHERE id = 1");
    $rodry = execute();
    return $rodry->fetch();
}


function getNextQuestion(int $answerId) {
    $pdo = getConnection();
    $query = $pdo->prepare("SELECT * FROM question WHERE id = (SELECT next_question FROM answer WHERE choix = ?)");
    $query->execute([$answerId]);
    return $query->fetch();
}


function getReponseId(int $questionId){
    $pdo = getConnection();
    $rodry = $pdo->query("SELECT * FROM answer WHERE id_question = ?");
    $rodry = execute([$questionId]);
    return $rodry->fetchAll();
}