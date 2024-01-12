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
      echo "<pre>";
      print_r ($_SESSION['word']);
      echo "</pre>";
    }

    if ($_SERVER['REQUEST_METHOD']=='POST') {
      $_SESSION['word']->verify($_POST['solution']);
      $_SESSION['word'] = $this->getRandomWord();
      echo "<pre>";
      print_r ($_SESSION['word']);
      echo "</pre>";
    }
  }
}


