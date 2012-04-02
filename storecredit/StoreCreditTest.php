<?php

require_once 'StoreCreditCalculator.php';

class StoreCreditTest extends PHPUnit_Framework_TestCase
{
	private $inputString = <<<EOT
3
100
3
5 75 25
200
7
150 24 79 50 88 345 3
8
8
2 1 9 4 4 56 90 3
EOT;

	private $outputString = <<<EOT
Case #1: 2 3
Case #2: 1 4
Case #3: 4 5
EOT;

	public function testParseInput()
	{
		$expected = array(
			array(
				'credit' => 100,
				'availableItems' => array(5,75,25)
			),
			array(
				'credit' => 200,
				'availableItems' => array(150,24,79,50,88,345,3)
			),
			array(
				'credit' => 8,
				'availableItems' => array(2,1,9,4,4,56,90,3)
			),
		);
		$creditCalculator = new StoreCreditCalculator();
		$this->assertEquals($expected, $creditCalculator->parseInput($this->inputString));
	}

	public function testStoreCredit()
	{
		$input = array(
			'credit' => 8,
			'availableItems' => array(2,1,9,4,4,56,90,3)
		);
		$expected = array(4, 5);
		$creditCalculator = new StoreCreditCalculator();
		$this->assertEquals($expected, $creditCalculator->calculateSingleStoreCredit($input['credit'], 2, $input['availableItems']));
	}

	public function testCalculateStoreCredit()
	{
		$creditCalculator = new StoreCreditCalculator();
		$this->assertEquals($this->outputString, $creditCalculator->calculateStoreCredit($this->inputString));
	}
}
