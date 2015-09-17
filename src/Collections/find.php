<?php

namespace Dash\Collections;

function find($collection, $predicate)
{
	foreach ($collection as $key => $value) {
		$found = call_user_func($predicate, $value, $key, $collection);
		if ($found) {
			return array($key, $value);
		}
	}

	return null;
}
