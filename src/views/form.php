<?php

$currentPage = "form";
$levelName = "enterForm";

if ($router->ParcoursGetState()["endParcours"]) exit(header('Location: ./'));
if ($router->ParcoursGetState()["endForm"]) exit(header('Location: ./quiz'));

sendLevel($levelName);

if (TEMPLATES["illustration"][$currentPage]["active"]) include "./src/components/illustration/illustration.php";
if (TEMPLATES["form"]["active"]) include "./src/components/form/form.php";

$logs->add($currentPage, "NAV");
