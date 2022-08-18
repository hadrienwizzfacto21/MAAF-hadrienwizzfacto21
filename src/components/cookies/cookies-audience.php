<?php
$gaID = $config["legals"]["googleTag"] ?? "";
$cookiesLegals = $config["legals"]["mentionsLegalesUrl"] ?? "";
?>

<section id="banner-cookies">
    <p>Nous utilisons des cookies sur ce site. Les cookies sont nécessaires au bon fonctionnement du site (cookies strictement nécessaires). Avec votre consentement, nous en utiliserons pour mesurer et analyser l'utilisation du site (cookies analytiques).<br><br><a href="<?= $cookiesLegals ?>" target="_blank">En savoir plus sur notre politique cookie</a></p>
    <div id="--banner-buttons">
        <button id="--banner-accept" class="--banner-btn" onclick="CookiesAccept()">Accepter</button>
        <button id="--banner-refuse" class="--banner-btn" onclick="CookiesRefuse()">Refuser</button>
    </div>
</section>

<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $gaID ?>"></script>

<script>
    var cookiesBanner = document.getElementById("banner-cookies");

    function CookiesAccept() {
        cookiesBanner.style.visibility = "hidden";
        localStorage.setItem("cookiesState", "true");
    }

    function CookiesRefuse() {
        cookiesBanner.style.visibility = "hidden";
        localStorage.setItem("cookiesState", "false");
    }

    function CookiesBannerOpen() {
        cookiesBanner.style.visibility = "visible";
    }


    // CONDITIONS
    if (localStorage.getItem("cookiesState") === null) {
        console.log("pas de storage");
    } else if (localStorage.getItem("cookiesState") == "true") {
        console.log("cookies acceptés");
        window["ga-disable-<?= $gaID ?>"] = false;
        cookiesBanner.style.visibility = "hidden";
    } else {
        console.log("cookies refusés");
        window["ga-disable-<?= $gaID ?>"] = true;
        cookiesBanner.style.visibility = "hidden";
    }

    // GOOGLE
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());
    gtag('config', '<?= $gaID ?>');
</script>