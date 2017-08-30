<?php

namespace Dash;

function rotate($iterable, $count = 1)
{
	assertType($iterable, 'iterable', __FUNCTION__);

	$size = size($iterable);

	if ($size === 0) {
		return $iterable;
	}

	$count = $count % $size;

	if ($count === 0) {
		return $iterable;
	}

	$array = toArray($iterable);
	$preserveKeys = !isIndexedArray($array);
	$rotated = array_merge(
		array_slice($array, $count, null, $preserveKeys),
		array_slice($array, 0, $count, $preserveKeys)
	);

	return is_object($iterable) ? (object) $rotated : $rotated;
}

/**
 * @codingStandardsIgnoreStart
 */
function _rotate(/* count, iterable */)
{
	return currify('Dash\rotate', func_get_args());
}