<?php


class Word
{
  // TODO: add word (FR) and answer (EN) - (via constructor or not? why?)
  protected $word;
  protected $answer;

  public function __construct(string $word, string $answer)
  {
    $this->word = $word;
    $this->answer= $answer;
  }

  public function getWord() {
    return $this->word;
  }

  public function getAnswer(){
    return $this->answer;
  }

  public function verify(string $answer): bool
  {
    return $blabla = true;


    // TODO: use this function to verify if the provided answer by the user matches the correct one
    // Bonus: allow answers with different casing (example: both bread or Bread can be correct answers, even though technically it's a different string)
    // Bonus (hard): can you allow answers with small typo's (max one character different)?
  }
}

