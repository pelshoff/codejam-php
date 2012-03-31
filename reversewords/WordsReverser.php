<?php
/**
 * Reverse a set of words
 *
 * http://code.google.com/codejam/contest/351101/dashboard, problem B
 */
class WordsReverser
{
	/**
	 * @param string $inputString
	 * @return string
	 */
	public function reverseInput($inputString)
	{
		return $this->formatResults($this->reverseSet($this->parseInput($inputString)));
	}

	/**
	 * @param array $results
	 * @return string
	 */
	private function formatResults(array $results)
	{
		return trim(array_reduce($results, function ($result, $item) {
			static $count = 1;
			return $result . "Case #" . ($count++) . ": $item" . PHP_EOL;
		}));
	}

	/**
	 * @param string $sentence
	 * @return string
	 */
	private function reverseWords($sentence)
	{
		return implode(" ", array_reverse(explode(" ", $sentence)));
	}

	/**
	 * @param array $input
	 * @return array
	 */
	private function reverseSet(array $input)
	{
		return array_map(array($this, 'reverseWords'), $input);
	}

	/**
	 * @param $inputString
	 * @return array
	 */
	private function parseInput($inputString)
	{
		$input = explode(PHP_EOL, $inputString);
		$caseCount = array_shift($input);
		return array_slice($input, 0, $caseCount);
	}
}