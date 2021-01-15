<?php

//static_initialization
$input = [
    '/home/user/folder1/folder2/kdh4kdk8.txt',
    '/home/user/folder1/folder2/565shdhh.txt',
    '/home/user/folder1/folder2/folder3/nhskkuu4.txt',
    '/home/user/folder1/iiskjksd.txt',
    '/home/user/folder1/folder2/folder3/owjekksu.txt'
];

function parseInput($input) {
  $result = array();

  foreach ($input AS $path) {
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

    unset($prev);
  }

  return $result;
}

var_dump(parseInput($input));