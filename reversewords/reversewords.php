<?php
require_once 'WordsReverser.php';
$inFile = $argv[1];
$outFile = str_replace('.in', '.out', $inFile);
$input = file_get_contents($inFile);
$reverser = new WordsReverser();
file_put_contents($outFile, $reverser->reverseInput($input));