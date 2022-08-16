<?php

/**
 * Calculate the date when someone will celebrate their 1 Gs anniversary.
 * @param type $date
 * @return type
 */
function from($date)
{
	$gs = clone $date;
	return $gs->add(new DateInterval('PT1000000000S'));
}
