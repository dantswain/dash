<?php

namespace Dash\Collections;

function size($collection)
{
	if (is_array($collection) || $collection instanceof Countable) {
		return count($collection);
	}
	else {
		$count = 0;
		foreach ($collection as $value) {
			$count++;
		}
		return $count;
	}
}
