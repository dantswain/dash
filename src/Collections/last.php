<?php

namespace Dash\Collections;

function last($collection)
{
	$last = end($collection);
	reset($collection);
	return $last;
}
