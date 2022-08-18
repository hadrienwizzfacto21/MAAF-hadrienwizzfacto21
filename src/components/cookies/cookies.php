<?php
$gaID = $config["legals"]["googleTag"] ?? "";
$cookiesLegals = $config["legals"]["mentionsLegalesUrl"] ?? "";
?>

<section id="banner-cookies">
    <p>Nous utilisons des cookies sur ce site. Les cookies sont nécessaires au bon fonctionnement du site (cookies strictement nécessaires).<br><br><a href="<?= $cookiesLegals ?>" target="_blank">En savoir plus sur notre politique cookie</a></p>
    <div id="--banner-buttons">
        <button id="--banner-close" class="--banner-btn">J'ai compris</button>
    </div>
</section>

<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $gaID ?>"></script>
<script>
    let cookiesBanner = document.querySelector("#banner-cookies");
    let cookiesClose = document.querySelector("#--banner-close");

    function CookiesBannerOpen() {
        cookiesBanner.style.visibility = "visible";
    }

    cookiesClose.addEventListener("click", () => {
        cookiesBanner.style.visibility = "hidden";
        localStorage.setItem("cookiesState", true);
    })

    if (localStorage.getItem("cookiesState") == null) {
        cookiesBanner.style.visibility = "visible";
    } else {
        cookiesBanner.style.visibility = "hidden";
    }
</script>