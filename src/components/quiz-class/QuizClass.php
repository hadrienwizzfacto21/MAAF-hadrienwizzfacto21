<?php

class QuizClass
{

    public $QUIZ;
    public $QUIZCOUNT;


    public function __construct(string $quizFilePath)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $file = json_decode(file_get_contents($quizFilePath, true), true);

        $this->QUIZ = $file["quizcontent"];
        $this->QUIZCOUNT = $this->GetCount();
    }

    public function GetCount()
    {
        return $this->QUIZCOUNT = count($this->QUIZ);
    }

    public function Head($pos)
    {
        return <<<HEAD
            <div class='quiz-content__head' data-quizpos='$pos'>
                <h3>{$this->QUIZ[$pos]["title"]}</h3>
                <h1>{$this->QUIZ[$pos]["ask"]}</h1>
            </div>
        HEAD;
    }

    public function Illustration($pos)
    {
        return <<<HEAD
            <div class='quiz-illustration' data-quizpos='$pos'>
                <img src="{$this->QUIZ[$pos]["illustration"]}">
            </div>
        HEAD;
    }

    public function Radio($pos, $key)
    {
        return <<<HEAD
            <label data-quizpos='$pos' for='quizpos-$pos-$pos'>
                {$this->QUIZ[$pos]["options"]["radio"][$key]}
                <input type="radio" name="quizpos-$pos-$key" id="quizpos-$pos-$key" value="{$this->QUIZ[$pos]["options"]["radio"][$key]}">
            </label>
        HEAD;
    }


    public function Options($pos)
    {
        $content = "<div class='quiz-content__options--radio'>";

        foreach ($this->QUIZ[$pos]["options"]["radio"] as $key) $content .=  $this->Radio($pos, $key);

        $content .= "</div>";

        return $content;
    }


    public function Generate()
    {
    }


    // 
    public function Show($target)
    {
        for ($i = 0; $i < $this->QUIZCOUNT; $i++) {
            echo $this->$target($i);
        }
    }




    // Generate head
    // Generate Radio
    // Generate Image
    // Generate Game
    // Generate illustration




}


// $quiz = new QuizClass("./quizContent.json");


// $quiz->Generate("HeadTemplate");
// $quiz->Generate("IlluTemplate");

?>


<!-- <script>
    let test = document.querySelectorAll("[data-quizpos]")


    test.forEach(

        (e) => {

            // console.log(e.dataset.quizpos)
            if (e.dataset.quizpos == 2) console.log(e);


        }

    )
</script>
 -->