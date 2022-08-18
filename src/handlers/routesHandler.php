<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Keemia\Router\RouterClass;
use Keemia\Router\ScenarioClass;

$routerInit = new RouterClass;
$router = new ScenarioClass;

RoutesHandler($router);
function RoutesHandler($router)
{
    if ($router->IsDevMode()) return;

    if ($router->CurrentPage() != "prompts") {
        if ($router->IsStarted(CONFIG["routing"]["startOP"])) return exit(header("Location: ./prompts?opt=startOPPage"));
        if ($router->IsEnded(CONFIG["routing"]["endOP"])) return exit(header("Location: ./prompts?opt=endOPPage"));
        if ($router->IsNotCompatible()) return exit(header("Location: ./prompts?opt=navigateur"));
    }

    if ($router->CurrentPage() != "home" && $router->CurrentPage() != "prompts") {
        if ($router->ParcoursGetState()["endParcours"]) return exit(header("Location: ./"));
        if (!$router->IsSessionIdSet()) return exit(header("Location: ./"));
    }
}
