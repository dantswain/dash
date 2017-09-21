<?php

namespace Dash;

/**
 * Returns a new array containing values of $iterable that are present in all other arguments.
 *
 * Iterable keys are preseved.
 *
 * @category Iterable
 * @param iterable|stdClass $iterable Iterable to compare against
 * @param iterable|stdClass $iterables,...
 * @return array
 *
 * @alias intersect
 *
 * @example
	intersection(
		[1, 3, 5, 8],
		[1, 2, 3, 4]
	);  // === [0 => 1, 1 => 3]
 */
function intersection($iterable /*, ...iterables */)
{
	$iterables = map(func_get_args(), 'Dash\toArray');
	return call_user_func_array('array_intersect', $iterables);
}

/**
 * @codingStandardsIgnoreStart
 */
function intersect()
{
	return call_user_func_array('Dash\intersection', func_get_args());
}
