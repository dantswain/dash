<?php

namespace Dash\Collections;

function difference(/* $collection1, $collection2, ... */)
{
	$collections = func_get_args();
	$union = union($collections);
	$intersection = intersection($collections);
	$difference = without($union, $intersection);
	$difference = values($difference);  // Re-indexes array

	return $difference;
}
