<?php

if (session_status() === PHP_SESSION_NONE) session_start();

$quizContent = [
    [
        "title" => "Question 1/5",
        "ask" => "Replacez les appellations d’origine contrôlée des Côtes du Rhône dans la pyramide hiérarchique ci-dessous :",
        "illustration" => null,

        "options" => [
            // "image" => [
            //     ["Gran Canaria", "./styles/img/quiz-quest1.jpg"],
            //     ["Maldives", "./styles/img/quiz-quest2.jpg"],
            //     ["Seychelles", "./styles/img/quiz-quest3.jpg"]
            // ],
            // "radio" => [
            //     null
            // ],
            "game" => "app-pyramid"
        ]
    ],

    [
        "title" => "Question 2/5",
        "ask" => "Quels sont les principaux cépages blancs des Côtes du Rhône ?",
        "options" => [
            "radio" => [
                "Viognier, Marsanne, Roussanne, Grenache Blanc, et Clairette",
                "Sauvignon blanc, Riesling, Viognier",
                "Chardonnay, Pinot gris, Viognier"
            ]
        ],
        "answers" => [
            "Gran Canaria"
        ],
        "illustration" => "./styles/img/quiz-quest2.jpg"
    ],

    [
        "title" => "Question 3/5",
        "ask" => "Avec quels types de cépages sont produits les vins rosés en Côtes du Rhône ?",
        "options" => [
            "image" => [
                ["Cépages Blancs", "./styles/img/quiz-q3-rep1.png", "Cépages Blancs",],
                ["Cépages Rouges", "./styles/img/quiz-q3-rep2.png", "Cépages Rouges"],
                ["Cépages Rosés", "./styles/img/quiz-q3-rep3.png", "Cépages Rosés"]
            ]
        ],
        "answers" => [
            "Gran Canaria"
        ],
        "illustration" => "./styles/img/quiz-quest3.jpg"
    ],
    [
        "title" => "Question 4/5",
        "ask" => "Quelle est la forme habituelle d’une bouteille <br> de Côtes du Rhône ?",
        "options" => [
            "image" => [
                ["Haut", "./styles/img/quiz-q4-rep1.png"],
                ["Moyen", "./styles/img/quiz-q4-rep2.png"],
                ["Bas", "./styles/img/quiz-q4-rep3.png"]
            ]
        ],
        "answers" => [
            "Gran Canaria"
        ],
        "illustration" => null
    ],
    [
        "title" => "Question 5/5",
        "ask" => "Quelle est la part de BIO (%)<br>dans les Côtes du Rhône ? (données 2021)",
        "options" => [
            "radio" => [
                "5%",
                "10%",
                "12%"
            ]
        ],
        "answers" => [
            "Gran Canaria"
        ],
        "illustration" => "./styles/img/quiz-quest5.jpg"
    ]
];

define("QUIZ", $quizContent);
