<?php

namespace Dash\Collections;

function findValue($collection, $predicate)
{
	list($key, $value) = find($collection, $predicate);
	return $value;
}
