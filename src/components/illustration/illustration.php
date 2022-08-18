<section id="illustration">

    <?php if (isset(TEMPLATES["illustration"][$currentPage]["wording"][0])) : ?>
        <div class="illustration_wording">
            <?= implode("<br>", TEMPLATES["illustration"][$currentPage]["wording"]) ?>
        </div>
    <?php endif ?>

    <?php if (isset(TEMPLATES["illustration"][$currentPage]["image"]["desktop"])) : ?>
        <img class="illustration_image" src="<?= TEMPLATES["illustration"][$currentPage]["image"]["desktop"] ?>" class="<?= TEMPLATES["illustration"][$currentPage]["onMobile"] ? "" : "--hide-mobile" ?>" alt="<?= TEMPLATES["illustration"][$currentPage]["image"]["alt"] ?>">
    <?php endif ?>

</section>