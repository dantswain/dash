<?php

use Dash\Collections;
use Dash\Container;

class firstTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider casesForFirst
	 */
	public function testStandaloneFirst($collection, $expected)
	{
		$actual = Collections\first($collection);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @dataProvider casesForFirst
	 */
	public function testChainedFirst($collection, $expected)
	{
		$container = new Container($collection);
		$actual = $container->first()->value();
		$this->assertEquals($expected, $actual);
	}

	public function casesForFirst()
	{
		return array(
			'With an empty array' => array(
				array(),
				null
			),
			'With a non-empty array' => array(
				array('a', 'b', 'c'),
				'a'
			),
			'With a non-empty array with null as the first element' => array(
				array(null, 'b', 'c'),
				null
			),
		);
	}
}
