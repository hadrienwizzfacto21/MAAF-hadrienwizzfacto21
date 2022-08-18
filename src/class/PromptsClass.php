<?php

namespace Keemia;

class PromptsClass
{
    public $default;
    public $activePrompt;
    public $activeTarget;

    public function __construct()
    {


        $this->default = [

            "commonWording" => [
                ""
            ],

            "startOPPage" => [ //teasing page
                "restricted" => false,
                "wording" => [
                    "<h1>Le site n'est pas <br> encore disponible !</h1><hr>",
                    "<h2>Revenez ici un peu plus tard.</h2>"
                ]
            ],

            "endOPPage" => [ //end of the op wording
                "restricted" => false,
                "wording" => [
                    "<h1>Le site n'est plus <br> accessible !</h1><hr>",
                    "<h2>Merci d'avoir participé</h2>"
                ]
            ],

            "formErrorPage" => [ //form error wording
                "restricted" => false,
                "wording" => [
                    "<h1>Vérifiez le formulaire !</h1><hr>",
                    "<h2>Il y a eu un problème ...</h2>"
                ]
            ],

            "participationErrorPage" => [ //already participated wording
                "restricted" => false,
                "wording" => [
                    "<h1>Vous avez<br>déjà participé !</h1><hr>",
                    "<h2>Vous ne pouvez participer qu'une seule fois.</h2>"
                ]
            ],

            "defaultErrorPage" => [ //for any other or unknown errors wording
                "restricted" => false,
                "wording" => [
                    "<h1>Il y a eu un problème !</h1><hr>",
                    "<h2>Merci de réessayer plus tard.</h2>"
                ]
            ],

            "PRl1t" => [ //prize 1 wording
                "restricted" => true,
                "wording" => [
                    "<h1>Merci d’avoir joué !</h1><hr>",
                    "<h2>Vous allez recevoir<br>un mail de confirmation</h2>",
                    "<p>Surveillez votre boîte mail.</p>"
                ]
            ],

            "PRlse" => [ //lost wording
                "restricted" => true,
                "wording" => [
                    "<h1>Oh non ...<br>dommage !</h1><hr>",
                    "<h2>Vous n'avez pas gagné.</h2>"
                ]
            ],

            "navigateur" => [
                "restricted" => false,
                "wording" => [
                    "<h1>Votre navigateur n'est pas compatible ...</h1><hr>",
                    "<h2>Vous pouvez utiliser les dernières versions de Google Chrome, Mozila Firefox, Safari ou Microsoft Edge.</h2>"
                ]
            ]
        ];


        $this->activePrompt = $this->setActivePrompt();
    }

    /**
     * setActivePrompt
     *
     * @param  mixed $pToLoad
     * @return array
     */
    public function setActivePrompt(?string $pToLoad = null): array
    {
        $this->activeTarget = $pToLoad ?? $this->getTarget();

        if (isset(PROMPTS[$this->activeTarget])) return $this->activePrompt = PROMPTS[$this->activeTarget];
        if (isset($this->default[$this->activeTarget])) return $this->activePrompt = $this->default[$this->activeTarget];

        return $this->default["defaultErrorPage"];
    }

    /**
     * getTarget
     *
     * @return string
     */
    private function getTarget(): string
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        return $_GET['opt'] ?? $_SESSION["prompts"] ?? "defaultErrorPage";
    }

    /**
     * getWording
     *
     * @return string
     */
    public function getWording(): string
    {
        return implode("<br>", $this->activePrompt["wording"]) ?? null;
    }

    /**
     * getCommon
     *
     * @return string
     */
    public function getCommon(): ?string
    {
        return defined("PROMPTS") ? implode("<br>", PROMPTS["commonWording"]) : null;
    }

    /**
     * getImage
     *
     * @return array
     */
    public function getImage(): ?array
    {
        return $this->activePrompt["image"] ?? null;
    }

    /**
     * isRestricted
     *
     * @return bool
     */
    public function isRestricted(): bool
    {
        return $this->activePrompt["restricted"];
    }
}
