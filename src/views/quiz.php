<?php

$currentPage = "quiz";
$levelName = "";

if ($router->ParcoursGetState()["endParcours"] || !$router->ParcoursGetState()["endForm"]) exit(header('Location: ./'));

echo "<div class='--full-grid-large'>";
include "./src/handlers/quizHandler.php";
include "./src/components/quiz/quiz.php";
// include "./src/components/quiz-class/quiz.php";
echo "</div>";


$logs->add($currentPage, "NAV");
