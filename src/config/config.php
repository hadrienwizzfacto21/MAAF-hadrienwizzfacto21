
<?php


$dispQuizScore = $_SESSION["quiz"]["quizScore"] ?? 0;

// CONFIG
// Edit globals landing pages settings
$_SESSION["library"]["config"] = $config = [

    "meta" => [
        "author" => "Côtes du Rhône",
        "title" => "Côtes du Rhône ",
        "descrTitle" => "Côtes du Rhône : Cliquez pour participer !", //useful when sharing link
        "descr" => " Jouez avec Côtes du Rhône et tentez de gagner de nombreux lots !",
        "keywords" => "Côtes du Rhône, jeu, formulaire, quiz",
        "illustration" => "./styles/img/illuIndex.jpg" //useful on social media
        // "favicon" => "./styles/ico/favicon.ico"
    ],

    "legals" => [
        "client" => "Inter Rhône",
        "politiqueConfidentialiteUrl" => "./confidentialite",
        "reglementUrl" => "./reglement.pdf",
        "mentionsLegalesUrl" => "./mentionslegales",
        "googleTag" => "G-TEG58KLTF5" //optional
    ],

    "routing" => [
        "startOP" => "2206230001", //when the op start YYMMDDhhmm
        "endOP" => "2206262000" //when the op end YYMMDDhhmm
    ],

    "weezio" => [
        "weezioParam" => [
            "api_key" => "4e569357-ab17-40e0-9373-8fd275f87a9f",
            "interface_id" => 150,
            "task_id" => 109
        ],
        "level_id" => [
            "scenarioStart" => 1,
            "formSubmit" => 2,
            "quizSubmit" => 3,
            "scenarioEnd" => null,
            "redirection" => 4
        ],
        "postForm" => true, //alow data to be sent
        "checkParticipation" => false //allow only one participation/email adress
    ],
];


// TEMPLATES
// Edit templates sections settings, styling and content
$_SESSION["library"]["configTemplates"] = $configTemplates = [

    "globals" => [
        "bg" => [
            "bg-image" => null
        ],
    ],

    "header" => [
        "active" => true,
        "logo" => [
            "./styles/img/logo.jpg",
        ]
    ],

    "hero" => [
        "active" => true,
        "image" => [
            "desktop" => null,
            "alt" => "Hero"
        ],
        "wording" => [
            "<h2>Venez tester vos connaissances sur les vins Côtes du Rhône et Côtes du Rhône Villages !</h2>",
            "<h4><br>DES SÉJOURS<br>EN VALLÉE DU RHÔNE<br>À GAGNER !</h4>"
        ],
        "btn" => ["Je joue !", "./form"]
    ],

    "illustration" => [
        "index" => [
            "active" => true,
            "onMobile" => true,
            "image" => [
                "desktop" => "./styles/img/illu-index.jpg",
                "alt" => "Illustration"
            ],
            "wording" => [
                null
            ]
        ],
        "form" => [
            "active" => true,
            "onMobile" => false,
            "image" => [
                "desktop" => "./styles/img/illu-form.jpg",
                "alt" => "Illustration"
            ],
            "wording" => [
                "<h3>Venez tester vos connaissances sur les vins Côtes du Rhône et Côtes du Rhône Villages !</h3>"
            ]
        ]
    ],

    "apps" => [
        "active" => true,
        "title" => null,
        "activeApp" => "app-quiz", //app-scratch/app-jackpot/app-wheel ...
        "btnNext" => null
    ],

    "networks" => [
        "active" => true,
        "website" => [null, "./styles/ico/website.svg"], //URL + Ico path
        "facebook" => ["https://www.facebook.com/cotesdurhone", "./styles/ico/facebook.svg"],
        "instagram" => ["https://www.instagram.com/cotesdurhone/", "./styles/ico/instagram.svg"],
        "linkedin" => [null, "./styles/ico/linkedin.svg"],
        "twitter" => ["https://twitter.com/vinsrhone", "./styles/ico/twitter.svg"],
        "youtube" => ["https://www.youtube.com/user/VinsRhone", "./styles/ico/youtube.svg"]
    ],

    "form" => [
        "active" => true,
        "title" => "VOS COORDONNÉES",
        "btnSubmit" => "Je joue !",
        "inputs" => [
            // [
            //     "id" => "Area",
            //     "type" => "select",
            //     "label" => "Secteur",
            //     "options" => [
            //         "required",
            //     ],
            //     "content" => [
            //         "Strasbourg" => "Strasbourg",
            //         "Lille" => "Lille",
            //         "Nancy-Metz" => "Nancy-Metz",
            //     ]
            // ],
            [
                "id" => "LastName",
                "type" => "text",
                "label" => "Nom",
                "options" => [
                    "required",
                    "pattern=\"[A-Za-zÀ-ÿ '-]{2,20}\"",
                    "size='20'"
                ]
            ],
            [
                "id" => "FirstName",
                "type" => "text",
                "label" => "Prénom",
                "options" => [
                    "required",
                    "pattern=\"[A-Za-zÀ-ÿ '-]{2,20}\"",
                    "size='20'"
                ]
            ],
            [
                "id" => "Email",
                "type" => "email",
                "label" => "Email",
                "options" => [
                    "required",
                    "pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$'",
                    "size='20'",
                ]
            ],
            [
                "id" => "Age",
                "type" => "text",
                "label" => "Âge",
                "options" => [
                    "required",
                    "pattern ='[0-9]{2}'",
                    "size='2'"
                ]
            ],
            // [
            //     "id" => "Telephone",
            //     "type" => "tel",
            //     "label" => "Téléphone",
            //     "options" => [
            //         "pattern ='[0-9]{10}'",
            //         "size='10'"
            //     ]
            // ],
        ],

        "optins" => [
            [
                "id" => "Optin1",
                "type" => "checkbox",
                "label" => "J'accepte le <a href='./reglement.pdf' target='_blank'><u>règlement du jeu</u></a>",
                "options" => ["required"]
            ],
            [
                "id" => "Optin2",
                "type" => "checkbox",
                "label" => "J’accepte de recevoir des offres oenotouristiques de la part d’Inter Rhône par mail",
                "options" => [null]
            ],

        ]
    ],
];


// PROMTPS
// Edit the wordings of the /prompts page
$_SESSION["library"]["configPrompts"] = $configPrompts = [

    "clientRedir" => "https://www.cotesdurhone.com",

    "commonWording" => [
        "<p><br>Retrouvez toutes les informations sur les appellations Côtes du Rhône et Côtes du Rhône villages sur <a href='./src/handlers/levels/lvlRedirection.php' target='_blank'>www.cotesdurhone.com</a></p>",
        "<p style='font-size:small;'>L’ABUS D’ALCOOL EST DANGEREUX POUR LA SANTÉ, À CONSOMMER AVEC MODÉRATION.</p>"

    ],

    "startOPPage" => [ //teasing page
        "restricted" => false,
        "wording" => [
            "<h1>Le site n'est pas <br> encore disponible !</h1><br><hr>",
            "<h2>Revenez ici un peu plus tard.</h2>"
        ]
    ],

    "endOPPage" => [ //end of the op wording
        "restricted" => false,
        "wording" => [
            "<h1>Le site n'est plus <br> accessible !</h1><br><hr>",
            "<h2>Merci d'avoir participé</h2>"
        ]
    ],

    "formErrorPage" => [ //form error wording
        "restricted" => false,
        "wording" => [
            "<h1>Vérifiez le formulaire !</h1><br><hr>",
            "<h2>Il y a eu un problème ...</h2>"
        ]
    ],

    "participationErrorPage" => [ //already participated wording
        "restricted" => false,
        "wording" => [
            "<h1>Vous avez<br>déjà participé !</h1><br><hr>",
            "<h2>Vous ne pouvez participer qu'une seule fois.</h2>"
        ]
    ],

    "defaultErrorPage" => [ //for any other or unknown errors wording
        "restricted" => false,
        "wording" => [
            "<h1>Il y a eu un problème !</h1><br><hr>",
            "<h2>Merci de réessayer plus tard.</h2>",
        ]
    ],

    "PRl1t" => [ //prize 1 wording
        "restricted" => true,
        "wording" => [
            "<h2 class='--bigger'>Votre score est de $dispQuizScore/5</h2>", "<p><a href='./reponses.pdf' target='_blank'>Voir les bonnes réponses</a></p>",
            "<h1><br>FÉLICITATIONS !</h1><p class='--red'>Vous allez participer au tirage au sort pour remporter un séjour en Vallée du Rhône !</p>",
            "<p>Tirage au sort mardi 28 juin à 12h</p>",
            "<h2>Surveillez votre boîte mail !</h2>"
        ],
        "image" => [
            "desktop" => "./styles/img/hero.jpg",
            "mobile" => "",
            "alt" => "Lot 1"
        ]
    ],

    "PRlse" => [ //lost wording
        "restricted" => true,
        "wording" => [
            "<h2 class='--bigger'>Votre score est de $dispQuizScore/5</h2>",
            "<p><a href='./reponses.pdf' target='_blank'>Voir les bonnes réponses</a></p>",
            "<h1><br>MERCI D'AVOIR PARTICIPÉ !</h1>",
            "<h2 style='font-weight:normal;'>Découvrez notre site <a href='./src/handlers/levels/lvlRedirection.php' target='_blank'>www.cotesdurhone.com</a></h2>"
        ],
        "image" => [
            "desktop" => "",
            "mobile" => "",
            "alt" => "Perdu"
        ]
    ]
];

// DEFINE CONSTANTS
define("CONFIG", $config);
define("TEMPLATES", $configTemplates);
define("PROMPTS", $configPrompts);
