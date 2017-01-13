<?php
	namespace General_Lib;

	//Greatest common factor
	function gcf($a, $b) {
		if ($b == 0) {
			return $a;
		} else {
			return gcf($b, $a % $b);
		}
	}

	//Least common multiple of two numbers
	function lcm($a, $b) {
		return ($a / gcf($a,$b)) * $b;
	}

	//Least common multiple of numbers in an array
	function lcm_array($arr) {
		//Until you are down to just one element...
		while (count($arr) > 1) {
			//Pop the first two items off the front of the array,
			//compute their LCM, and append that number to the
			//end of the array
			$arr[] = lcm(array_shift($arr), array_shift($arr));
		}
		
		//Once you have only one element left, return it
		return $arr[0];
	}
?>
