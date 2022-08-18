<?php

require_once __DIR__ . '/../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/handlers/logs/logsHandler.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . "/config/config.php";

require_once __DIR__ . "/handlers/routesHandler.php";
require_once __DIR__ . "/handlers/levels/levelsHandler.php";
