<?php

$currentPage = "quiz";
$levelName = "";

if ($router->currentPage() == $currentPage && $_SESSION["endParcours"]) exit(header('Location: ./'));

echo "<div class='--full-grid-large'>";
include "./src/handlers/quizHandler.php";
include "./src/components/quiz-class/quiz-class.php";
// include "./src/components/quiz-class/quiz.php";
echo "</div>";


$logs->add($currentPage, "NAV");
