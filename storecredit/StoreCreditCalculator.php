<?php
class StoreCreditCalculator
{
	function parseInput($inputString)
	{
		$returnValue = array();
		$inputArray = explode(PHP_EOL, $inputString);
		for ($i = 0; $i < $inputArray[0]; $i++) {
			$returnValue[] = array(
				'credit' => $inputArray[$i*3+1],
				'availableItems' => explode(' ', $inputArray[$i*3+3]),
			);
		}
		return $returnValue;
	}

	function storeCredit($credit, $wantedItems, array $availableItems)
	{
		if ($credit <= 0 || $wantedItems <= 0 || empty($availableItems))
			return array();
		foreach ($availableItems as $index => $item) {
			unset($availableItems[$index]);
			if ($credit - $item == 0)
				return array($index+1);
			elseif ($credit - $item > 0) {
				$subList = $this->storeCredit($credit - $item, $wantedItems - 1, $availableItems);
				if (!empty($subList))
					return array_merge(array($index+1), $subList);
			}
		}
		return array();
	}

	function formatOutput($output, $caseNumber)
	{
		return "Case #$caseNumber: " . implode(' ', $output);
	}

	public function calculateStoreCredit($inputString)
	{
		$input = $this->parseInput($inputString);
		$outputArray = array();
		foreach ($input as $index => $case)
			$outputArray[] = $this->formatOutput($this->storeCredit($case['credit'], 2, $case['availableItems']), $index+1);
		return implode(PHP_EOL, $outputArray);
	}
}
