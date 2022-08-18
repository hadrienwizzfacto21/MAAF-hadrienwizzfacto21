<?php
include "./src/components/quiz-class/QuizClass.php";
$quiz = new QuizClass("./src/components/quiz-class/quizContent.json");

?>

<script>
    let quizPos = 0;
</script>

<form action="./src/components/quiz-php/quiz-post.php" method="POST">

    <section id="quiz">

        <?php $quiz->Show("Illustration") ?>


        <div class="quiz-content">
            <?php $quiz->Show("Head") ?>
            <?php $quiz->Show("Options"); ?>
        </div>

    </section>

</form>

<script>
    let quiz = document.querySelectorAll("[data-quizpos]")
    let radio = document.querySelectorAll("input[type='radio']");
    let quizSubmit = document.querySelectorAll("#quizSubmit");
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

    // QUIZ DISPLAY
    function UpdateQuizDisplay() {
        quiz.forEach((e) => {
            if (e.dataset.quizpos == quizPos.toString()) {
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
</script>