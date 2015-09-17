<?php

use Dash\Collections;
use Dash\Container;

class findLastTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider casesForFindLast
	 */
	public function testStandaloneFindLast($collection, $predicate, $expected)
	{
		$actual = Collections\findLast($collection, $predicate);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @dataProvider casesForFindLast
	 */
	public function testChainedFindLast($collection, $predicate, $expected)
	{
		$container = new Container($collection);
		$actual = $container->findLast($predicate)->value();
		$this->assertEquals($expected, $actual);
	}

	public function casesForFindLast()
	{
		return array(
			'With an empty array' => array(
				array(),
				function() { return false; },
				null
			),
			'With a non-matching search of an array' => array(
				array(
					'a' => 'first',
					'b' => 'second',
					'c' => 'third',
					'd' => 'second',
					'e' => 'fifth',
				),
				function() { return false; },
				null
			),
			'With a matching value search of an array' => array(
				array(
					'a' => 'first',
					'b' => 'second',
					'c' => 'third',
					'd' => 'second',
					'e' => 'fifth',
				),
				function($value) {
					return $value == 'second';
				},
				array('d', 'second')
			),
			'With a matching key search of an array' => array(
				array(
					'a' => 'first',
					'b' => 'second',
					'c' => 'third',
					'd' => 'second',
					'e' => 'fifth',
				),
				function($value, $key) {
					return $key == 'd';
				},
				array('d', 'second')
			),
		);
	}
}
