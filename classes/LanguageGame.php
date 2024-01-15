<?php

class LanguageGame
{
  public array $words;

  public function __construct()
  {
    // :: is used for static functions
    // They can be called without an instance of that class being created
    // and are used mostly for more *static* types of data (a fixed set of translations in this case)
    foreach (Data::words() as $frenchTranslation => $englishTranslation) {
      $this->words[] = new Word($frenchTranslation, $englishTranslation);
    }
  }

  public function getRandomWord() {
    $randomKey = array_rand($this->words, 1);
    $randomWord = $this->words[$randomKey];
    return $randomWord;
  }

  public function run(): void
  {
    session_start();
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['word'] = $this->getRandomWord();
      $_SESSION['totalScore'] = 0;
      $_SESSION['correct'] = 0;
      $_SESSION['wrong'] = 0;
      $_SESSION['feedback']= '';
      // echo "<pre>";
      // print_r ($_SESSION['word']);
      // echo "</pre>";
    }

    if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submitBtn'] === 'submit') {
      if($_SESSION['word']->verify($_POST['solution']) == 'correct'){
        $_SESSION['totalScore'] += 1;
        $_SESSION['correct'] +=1;
      } else if ($_SESSION['word']->verify($_POST['solution']) == 'wrong'){
        $_SESSION['totalScore'] -= 1;
        $_SESSION['wrong'] +=1;
      }
      $_SESSION['word'] = $this->getRandomWord();
      // echo "<pre>";
      // print_r ($_SESSION['word']);
      // echo "</pre>";
    }
  }
}


