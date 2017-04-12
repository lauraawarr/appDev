<?php

	/* Returns the dot product of two arrays where the user's array is raised to the power of 2*/
	function calcScore( $x, $y )
	{
		if (count($x) != count($y)) return "Cannot dot arrays of uneven length.";

		$total = 0;
		for ($i = 0; $i < count($x) ; $i++){
			$total = $total + (pow( 2 , $x[$i])*$y[$i]);
		};
		return $total;
	}

	/* Inserts and item at a specific index, removes the last item from the array, and returns array*/
	function insertAt( $array, $index, $obj )
	{
		for ( $i = count($array) - 1; $i > $index; $i--){
			$array[$i] = $array[$i - 1];
		}
		$array[$index] = $obj;

		return $array;
	}
?>