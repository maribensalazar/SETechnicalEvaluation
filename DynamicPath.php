<?php

//dynamic_initialization
$basePath = "home/user/";
$numberOfPath = 5;

function parseInput($basePath, $numberOfPath) {
    for ($i=0; $i < $numberOfPath; $i++) { 
        $randomSite = $basePath . hash('adler32', $i);
        $new_array = array($randomSite);
          
        var_dump(parseOutput($new_array));
    }
}

function parseOutput($new_array) {
    $result = array();

  foreach ($new_array AS $path) {
    $previousPath = &$result;

    $split = strtok($path, '/');

    while (($nextPath = strtok('/')) !== false) {
      if (!isset($previousPath[$split])) {
        $previousPath[$split] = array();
      }

      $previousPath = &$previousPath[$split];
      $split = $nextPath;
    }

    $previousPath[] = $split;

    unset($previousPath);
  }

  return $result;
}

parseInput($basePath, $numberOfPath);
?>