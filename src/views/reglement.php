<?php

$currentPage = "reglement";
$levelName = "";

$reglement = CONFIG["legals"]["reglementUrl"];
header("Location: $reglement");

$logs->add($currentPage, "NAV");
