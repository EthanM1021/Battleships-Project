<?php

class Board {

  public function createBoard(int $width) {
    $boardState = array ();
    for ($i = 0; $i < $width; $i++) {
      array_push($boardState, "~     ");
    }

    foreach($boardState as $key => $value) {
      echo $value;
    }
  }
}