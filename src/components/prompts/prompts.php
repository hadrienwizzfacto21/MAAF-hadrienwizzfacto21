 <?php

   use Keemia\PromptsClass;

   $prompt = new PromptsClass;
   $promptAutho = $_SESSION["prompts"] ?? null;
   if ($prompt->isRestricted() && $promptAutho != $prompt->activeTarget && !$router->IsDevMode()) $prompt->setActivePrompt("defaultErrorPage");

   ?>

 <section id="prompts">
    <?= $prompt->getWording() ?>
 </section>

 <?php if (!empty($prompt->getCommon())) : ?>

    <section class="prompts-common">
       <?= $prompt->getCommon() ?>
       <?php if (TEMPLATES["networks"]["active"]) include "./src/components/networks/networks.php"; ?>
    </section>

 <?php endif ?>