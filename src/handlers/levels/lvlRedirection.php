<?php

use Keemia\Weezio\WeezioClass;
use Keemia\Router\ScenarioClass;

require __DIR__ . "/../../../vendor/autoload.php";
if (!defined("CONFIG")) require __DIR__ . "/../logs/logsHandler.php";
if (!defined("CONFIG")) require __DIR__ . "/../../config/config.php";


lvlScenarioEnd($rteNext = PROMPTS["clientRedir"], $levelName = "redirection", $logs);
function lvlScenarioEnd($rteNext, $levelName, $logs)
{
    $wzo = new WeezioClass([
        "api_key" => CONFIG["weezio"]["weezioParam"]["api_key"],
        "interface_id" => CONFIG["weezio"]["weezioParam"]["interface_id"],
        "task_id" => CONFIG["weezio"]["weezioParam"]["task_id"],
        "level_id" => CONFIG["weezio"]["level_id"]["$levelName"]
    ]);
    if (isset(CONFIG["weezio"]["level_id"]["$levelName"]) && CONFIG["weezio"]["postForm"]) $wzo->Post();

    $scn = new ScenarioClass();
    $scn->End();

    $logs->add("$levelName", "LEVEL");

    header('Location:' . $rteNext);
}
