<?php

require_once __DIR__ . '/src/loader.php';
$bodyStyle = isset(TEMPLATES["globals"]["bg"]["bg-image"]) ? "style=\"background-image:url('" . TEMPLATES['globals']['bg']['bg-image'] . "')\"" : "";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="<?= CONFIG["meta"]["descr"] ?>">
    <meta name="keywords" content="<?= CONFIG["meta"]["keywords"] ?>">
    <meta property="og:title" content="<?= CONFIG["meta"]["descrTitle"] ?>">
    <meta property="og:description" content="<?= CONFIG["meta"]["descr"] ?>">
    <meta property="og:image" content="<?= CONFIG["meta"]["illustration"] ?>">
    <meta property="og:type" content="website">

    <link rel="apple-touch-icon" sizes="76x76" href="./styles/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./styles/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./styles/favicon/favicon-16x16.png">
    <link rel="manifest" href="./styles/favicon/site.webmanifest">
    <link rel="mask-icon" href="./styles/favicon/safari-pinned-tab.svg" color="#e30613">
    <meta name="msapplication-TileColor" content="#e30613">
    <meta name="theme-color" content="#e30613">

    <link rel="stylesheet" href="./styles/main.css">
    <title><?= CONFIG["meta"]["title"] ?></title>
</head>

<body <?= $bodyStyle ?>>

    <main>

        <?php include "./src/components/header/header.php" ?>

        <div id="main_container">
            <?php include $router->LoadView() ?>
        </div>

        <?php include "./src/components/footer/footer.php" ?>
        <?php include './src/components/cookies/cookies-audience.php' ?>

    </main>

</body>

</html>