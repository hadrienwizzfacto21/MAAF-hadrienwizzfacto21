 <section id="hero">

     <?php if (isset(TEMPLATES["hero"]["wording"])) : ?>
         <div class="hero_wording">
             <?= implode("<br>", TEMPLATES["hero"]["wording"]) ?>
         </div>
     <?php endif ?>

     <?php if (isset(TEMPLATES["hero"]["image"]["desktop"])) : ?>
         <img class="hero_image" src="<?= TEMPLATES["hero"]["image"]["desktop"] ?>" alt="<?= TEMPLATES["hero"]["image"]["alt"] ?>">
     <?php endif ?>

     <?php if (isset(TEMPLATES["hero"]["btn"][0])) : ?>
         <a class='--btn' href='<?= TEMPLATES['hero']['btn'][1] ?>'><?= TEMPLATES['hero']['btn'][0] ?></a>
     <?php endif ?>

 </section>