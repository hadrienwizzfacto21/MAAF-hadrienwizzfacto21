<script>
    let quizPos = 0;
</script>

<form action="./src/handlers/levels/lvlQuizSubmit.php" method="POST">

    <?php foreach (QUIZ as $quizKey => $quizValue) : ?>
        <section id="quiz-<?= $quizKey ?>" class="quiz --hidden">

            <?php if (isset($quizValue["illustration"])) : ?>
                <div class="quiz-illustration">
                    <img src="<?= $quizValue['illustration'] ?>">
                </div>
            <?php endif ?>

            <div class="quiz-content">
                <div class="quiz-content__head">
                    <h4><?= $quizValue['title'] ?></h4>
                    <h3><?= $quizValue['ask'] ?></h3>
                </div>

                <?php if (isset($quizValue["options"]["radio"][0])) : ?>
                    <div class="quiz-content__options--radio">
                        <?php foreach ($quizValue["options"]["radio"] as $radioKey => $radioValue) : ?>
                            <label for="<?= "quiz-$quizKey-radio-$radioKey" ?>">
                                <?= $radioValue ?>
                                <input type="radio" name="<?= "radio-$quizKey" ?>" id="<?= "quiz-$quizKey-radio-$radioKey" ?>" value="<?= $radioValue ?>">
                            </label>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <?php if (isset($quizValue["options"]["image"][0])) : ?>
                    <div class="quiz-content__options--image">
                        <?php foreach ($quizValue["options"]["image"] as $imageKey => $imageValue) : ?>
                            <label for="<?= "quiz-$quizKey-image-$imageKey" ?>">
                                <img src="<?= $imageValue[1] ?>" alt="" loading="lazy">
                                <input type="radio" name="<?= "radio-$quizKey" ?>" id="<?= "quiz-$quizKey-image-$imageKey" ?>" value="<?= $imageValue[0] ?>">
                                <?php if (isset($imageValue[2])) : ?>
                                    <?= $imageValue[2] ?>
                                <?php endif ?>
                            </label>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <?php if (isset($quizValue["options"]["game"])) : ?>
                    <iframe frameborder="0" name="iframe" class="quiz-content__options--game" src="./src/apps/<?= $quizValue["options"]["game"] ?>/src/index.html">
                    </iframe>
                <?php endif ?>

                <div class="quiz-submit">
                    <button class="--btn --inactive quizSubmit" onclick="UpdateQuizPos(++quizPos)">Suivant</button>
                </div>
            </div>

        </section>
    <?php endforeach ?>

    <input type="hidden" class="--hidden" name="debug" id="debug" hidden>

</form>

<script>
    let quiz = document.querySelectorAll(".quiz")
    let radio = document.querySelectorAll("input[type='radio']");
    let quizSubmit = document.querySelectorAll(".quizSubmit");
    let form = document.querySelector("form");

    // QUIZ RADIO
    radio.forEach((element) => {
        element.addEventListener("click", () => {
            quizSubmit.forEach((e) => {
                e.classList.remove("--inactive");
            })

            radio.forEach((e) => {
                if (e.checked == true) {
                    e.parentNode.classList.add("--quiz-selected", "--quiz-no-hover");
                } else e.parentNode.classList.remove("--quiz-selected", "--quiz-no-hover");
            });
        });
    });


    // scroll
    let game = document.querySelector("#quiz-0");
    setTimeout(() => {
        game.scrollIntoView()
    }, 1)
    // game.addEventListener("load", () => {
    //     game.scrollIntoView()
    // })


    // QUIZ DISPLAY
    function UpdateQuizDisplay() {

        quiz.forEach((e) => {
            if (e.id == "quiz-" + quizPos) {
                e.classList.remove("--hidden")
            } else e.classList.add("--hidden")
        })
    }

    // QUIZ SUBMIT
    form.addEventListener("submit", (e) => {
        let count = Object.keys(quiz).length;
        if (!(quizPos > count - 1)) e.preventDefault();
    });

    // QUIZ PARCOURS
    UpdateQuizPos(0)

    function UpdateQuizPos(quizPos) {

        quizSubmit.forEach((e) => {
            e.classList.add("--inactive");
        })
        UpdateQuizDisplay();
    }

    // QUIZ GAME START
    function GameStart() {
        quizSubmit.forEach((e) => {
            e.classList.remove("--inactive");
        })
    }

    // QUIZ GAME END
    function GameEnd() {
        document.querySelector("iframe").classList.add("--prevent-touch")
    }

    // QUIZ DEBUG
    function GameScore(score) {
        let debug = document.querySelector("#debug");
        debug.value = score;
    }
</script>