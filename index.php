<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
// Load your classes
require_once 'classes/Data.php';
require_once 'classes/LanguageGame.php';
// require_once 'classes/Player.php'; // Only needed for extra's
require_once 'classes/Word.php';

// Start the game
// Don't change anything in this file
// The LanguageGame class will be your starting point
$game = new LanguageGame();
$game->run();

$wordPair = $game->getRandomWord();

echo"<pre>";
print_r($_SESSION);
echo "<br>";

echo "</pre>";





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
  } else if (!preg_match("/^[a-zA-Z]+$/", $solution)) {
    $errors['solution']= "Only letters are allowed";
  }

  if (empty($errors)) {
    $feedBack = " <span class='userWord'>$solution</span> was <span class='outcome'></span>!";
    $_SESSION['wordPair'] = $game->getRandomWord();
    $_SESSION['randomWord'] = strtoupper($_SESSION['wordPair']['french']);
  } else {
    $feedBack = $errors['solution']; 
  }
}

$randomWord = isset($_SESSION['randomWord']) ? $_SESSION['randomWord'] : strtoupper($wordPair['french']);


require 'view.php';