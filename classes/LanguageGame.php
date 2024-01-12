<?php

class LanguageGame
{
  private array $words;

  public function __construct()
  {
    // :: is used for static functions
    // They can be called without an instance of that class being created
    // and are used mostly for more *static* types of data (a fixed set of translations in this case)
    foreach (Data::words() as $frenchTranslation => $englishTranslation) {
      // TODO: create instances of the Word class to be added to the words array
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
    // TODO: check for option A or B

    // Option A: user visits site first time (or wants a new word)
    // TODO: select a random word for the user to translate

    // Option B: user has just submitted an answer
    // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
    // TODO: generate a message for the user that can be shown

    
  function sanitizeInput($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = strtolower($input);
    $input = filter_var($input, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $input;
  }

  $errors = [];

  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $solution = sanitizeInput($_POST['solution']);

    if(empty($solution)) {
      $errors['solution']= "Solution field can't be empty";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $solution)) {
      $errors['solution']= "Only letters are allowed";
    }

    if (empty($errors)) {
      $feedBack = " <span class='userWord'>$solution</span> was <span class='outcome'>correct</span>!";
    } else {
      $feedBack = $errors['solution']; 
  }
}

  }
}

