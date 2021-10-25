<?php

include "classes.php";
include "constants.php";

/**
 * Extracts the dimensions from the first line of the file
 *
 * @param file name in order to get first line
 */ 
function getDimensions(string $fileName): void {
  $firstLine = file($fileName)[0];
  $firstWord = strtok($firstLine, ':');

  if ($firstWord === 'Board') {
    $everythingAfterColon = preg_replace('/^[^:]*:/', '', $firstLine); 
    $trimmed = trimWhitespace($everythingAfterColon);
    
    $firstDimension = strtok($trimmed, 'x');
    $secondDimension = strtok('');

    displayColumnHeaders($firstDimension);
    displayRows($secondDimension, $firstDimension);
  }
}

/**
 * Displays the column headers in the console
 *
 * @param dimension to see how far along to go
 */ 
function displayColumnHeaders(int $dimension): void {
    $alphabet = range('A', 'Z');
    $letter = $alphabet[$dimension - 1];

    foreach(range('A', $letter) as $eachLetter) {
      echo "     $eachLetter";
    }
}

/**
 * Displays the rows in the console
 *
 * @param dimension to know how far to go down
 * @param width to know how far to go across
 */ 
function displayRows(int $dimension, int $width): void {
  $board = new Board();

  for ($i = 1; $i <= $dimension; $i++) {
    if ($i < 10) {
      echo "\n\n$i    ";
      $board::createBoard($width);
    } else if ($i > 9 && $i < 100) {
      echo "\n\n$i   ";
      $board::createBoard($width);
    }
  }
}

/**
 * Gets rid of whitespace in a string
 *
 * @param string to change
 *
 * @return trimmed string
 */ 
function trimWhitespace(string $string): string {
  return trim($string);
}