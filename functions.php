<?php

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
  }
}