<?php

class Player
{
  public $name;
  public $score;

  public function __construct(string $name)
  {
      // TODO: add 👤 automatically to their name
      $this->name = '👤 ' . $name;
  }
}