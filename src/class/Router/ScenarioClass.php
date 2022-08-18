<?php

namespace Keemia\Router;

include_once __DIR__ . "/../../../vendor/autoload.php";


class ScenarioClass extends RouterClass
{
    public function Start()
    {
        $_SESSION["startParcours"] = true;
        $_SESSION["endParcours"] = $_SESSION["endQuiz"] = $_SESSION["endForm"] = $_SESSION["prompts"] = false;
    }

    public function End()
    {
        $_SESSION["startParcours"] = false;
        $_SESSION["endParcours"] = $_SESSION["endQuiz"] = true;
    }

    public function Reset()
    {
        unset($_SESSION["wzo"]["conInfo"]["session_id"]);
        unset($_SESSION["prompts"]);
        $this->Start();
    }

    public function ParcoursGetState()
    {
        return [
            "session_id" => isset($_SESSION["wzo"]["conInfo"]["session_id"]),
            "endParcours" =>  $_SESSION["endParcours"] ?? false,
            "endQuiz" =>  $_SESSION["endQuiz"] ?? false,
            "endForm" => $_SESSION["endForm"] ?? false
        ];
    }
}
