<?php

include 'questionRepository.php';

if (!isset($_SESSION['user_name'])) {
    header("Location: game.phtml");
    exit;
}

$firstQuestion = getFirstQuestion();

if ($firstQuestion) {
    $questionText = htmlspecialchars($firstQuestion['name']);
} else {
    $questionText = "Aucune question disponible.";  // Si aucune question n'est trouvée
}


include 'game.phtml';