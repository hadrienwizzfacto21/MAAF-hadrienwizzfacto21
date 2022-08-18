<?php

$currentPage = "prompts";
$levelName = "prompts";

echo "<div class='--full-grid-small'>";
include "./src/components/prompts/prompts.php";
echo "</div>";

$logs->add($currentPage, "NAV");
