<?php

namespace Dash\Functions;

function negate($function)
{
	$negated = function() use ($function) {
		return !call_user_func_array($function, func_get_args());
	};

	return $negated;
}