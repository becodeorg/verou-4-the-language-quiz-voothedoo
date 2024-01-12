<?php

class Word
{
  // TODO: add word (FR) and answer (EN) - (via constructor or not? why?)
  protected $frenchTranslation;
  protected $englishTranslation;

  public function __construct($frenchTranslation, $englishTranslation) {
    $this->frenchTranslation = $frenchTranslation;
    $this->englishTranslation = $englishTranslation;
  }

  function getFrenchWord(){
    return $this->frenchTranslation;
  }


  function sanitizeInput($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = strtolower($input);
    $input = filter_var($input, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $input;
  }

  public function verify(string $userInput)
  {
    // TODO: use this function to verify if the provided answer by the user matches the correct one
    // Bonus: allow answers with different casing (example: both bread or Bread can be correct answers, even though technically it's a different string)
    // Bonus (hard): can you allow answers with small typo's (max one character different)?
    $userWord = $this-> sanitizeInput($userInput);

    $errors = [];
    $score = 0;

    if(empty($userWord)) {
      $errors['solution']= "Solution field can't be empty";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $userWord)) {
      $errors['solution']= "Only letters are allowed";
    }

    if (empty($errors) && $userWord === $this->englishTranslation) {
      $feedBack = " <span class='userWord'>". strtoupper($userWord) . "</span> was <span class='outcome'>correct</span>! :)";

    } else if (empty($errors)&& $userWord !== $this->englishTranslation) {
      $feedBack = " <span class='userWord'>". strtoupper($userWord) . "</span> was <span class='outcome'>NOT correct</span>! :(";
    } else {
      $feedBack = $errors['solution'];
    }
    $_SESSION['feedback']=$feedBack;

  }
}
