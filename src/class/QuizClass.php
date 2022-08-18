<?php

namespace Keemia;

require_once __DIR__ . "/../../vendor/autoload.php";

class QuizClass
{

    public array $QUIZ;

    public function __construct($pConfigFilePath = null)
    {
        if (!defined("QUIZ")) include $pConfigFilePath ?? __DIR__ . "/../config/config-quiz.php";
        $this->QUIZ = QUIZ;
    }

    public function CreateView()
    {
    }

    public function CheckCorrectAnswers()
    {
    }

    public function CountCorrectAnswers()
    {
    }
}
