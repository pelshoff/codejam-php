<?php
require_once 'StoreCreditCalculator.php';
$inFile = $argv[1];
$outFile = str_replace('.in', '.out', $inFile);
$input = file_get_contents($inFile);
$calculator = new StoreCreditCalculator();
file_put_contents($outFile, $calculator->calculateStoreCredit($input));