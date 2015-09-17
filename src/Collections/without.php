<?php

namespace Dash\Collections;

use Dash\Functions;

function without($collection, $excluded, $predicate = null)
{
	if ($predicate === null) {
		$predicate = 'Dash\Functions\equal';
	}

	$without = reject($collection, function($value) use ($excluded, $predicate) {
		return contains($excluded, $value, $predicate);
	});

	return $without;
}
