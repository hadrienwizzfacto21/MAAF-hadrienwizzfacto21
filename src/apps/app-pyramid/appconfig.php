<?php
header('Access-Control-Allow-Origin: *');

$appConfig = [

    "global" => [
        "id" => "mj_scratch",
        "iwPath" => "../../../levels/lvlIW.php?reqmode=run",
        "assetsPath" => "",
        "redirPath" => "",
        "gameHeight" => "",
        "gameWidth" => ""
    ],

    "assets" => [
        "scratchSurface" => "../assets/placeholder.png",
        "scratchParticules" => null
    ],

    "commonPopUp" => [
        "active" => true,
        "particles" => true,
        "image" => "../assets/prizewin.jpg"
    ],

    "endResults" => [
        "Lose" => "../assets/prizewin.jpg",
        "Prize1" => "../assets/prizewin.jpg",
        "Prize2" => "../assets/prizewin.jpg",
        "Prize3" => "../assets/prizewin.jpg"
    ]
];

echo json_encode($appConfig, true);
