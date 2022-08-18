<?php

use Keemia\Router\ScenarioClass;
use Keemia\Weezio\WeezioClass;



if (!defined("CONFIG")) require __DIR__ . "/../../loader.php";


$levelName = "quizSubmit";
$rteError = "../../../prompts?opt=formErrorPage";
$rteParticipation = "../../../prompts?opt=participationErrorPage";
$rteNext = "../../../prompts?opt=";

lvlFormSubmit($rteError, $rteParticipation, $rteNext, $levelName, $logs);
function lvlFormSubmit($rteError, $rteParticipation, $rteNext, $levelName, $logs)
{
    $wzo = new WeezioClass([
        "api_key" => CONFIG["weezio"]["weezioParam"]["api_key"],
        "interface_id" => CONFIG["weezio"]["weezioParam"]["interface_id"],
        "task_id" => CONFIG["weezio"]["weezioParam"]["task_id"],
        "level_id" => CONFIG["weezio"]["level_id"][$levelName]
    ]);


    // QUIZ
    $quizAnswers = $_POST;
    $quizScore = 0;

    if ($quizAnswers["debug"] == 1) {
        $wzo->toSend["BonneReponse1"] = "on";
        ++$quizScore;
    }
    if ($quizAnswers["radio-1"] == "Viognier, Marsanne, Roussanne, Grenache Blanc, et Clairette") {
        $wzo->toSend["BonneReponse2"] = "on";
        ++$quizScore;
    }
    if ($quizAnswers["radio-2"] == "Cépages Rouges") {
        $wzo->toSend["BonneReponse3"] = "on";
        ++$quizScore;
    }
    if ($quizAnswers["radio-3"] == "Moyen") {
        $wzo->toSend["BonneReponse4"] = "on";
        ++$quizScore;
    }
    if ($quizAnswers["radio-4"] == "12%") {
        $wzo->toSend["BonneReponse5"] = "on";
        ++$quizScore;
    }
    $wzo->toSend["ResultatQuizz"] = $_SESSION["quiz"]["quizScore"] = $quizScore;

    if (isset(CONFIG["weezio"]["level_id"][$levelName]) && CONFIG["weezio"]["postForm"]) $wzo->Post();
    $logs->add("$levelName", "LEVEL");

    $scn = new ScenarioClass();
    $scn->End();
    $logs->add("$levelName", "END");

    $opt = $_SESSION["prompts"] = $quizScore == 5 ? "PRl1t" : "PRlse";
    return header("Location: $rteNext$opt");
}
