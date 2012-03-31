<?php
/**
 * @package
 */

require_once 'WordsReverser.php';

/**
 * @package
 * @author		Pim Elshoff <pim@procurios.nl>
 */
class WordsReverserTest extends PHPUnit_Framework_TestCase
{
	public function testReverseWordsSmall()
	{
		$input = <<<EOT
3
this is a test
foobar
all your base
EOT;
		$expected = <<<EOT
Case #1: test a is this
Case #2: foobar
Case #3: base your all
EOT;
		$reverser = new WordsReverser();
		$result = $reverser->reverseInput($input);
		$this->assertEquals($expected, $result);
	}
}
