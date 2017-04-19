<?php

	/* Returns the dot product of two arrays where the user's array is raised to the power of 2*/
	function calcScore( $x, $y )
	{
		// Loops over elements in question array (y)
		// If user array is shorter, undefined elements are set to zero
		// If user array is longer, extra elements are ignored
		$total = 0;
		for ($i = 0; $i < count($y) ; $i++){
			if (!isset($x[$i])) {
				$x[$i] = 0;
			} else if ( $x[$i] > 5){ 
				$x[$i] = 5;
			} else if ( $x[$i] < 1){
				$x[$i] = 1;
			};

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