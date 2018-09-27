<?php

function habit_hash( $string = '' ) {

	$string  = trim($string);
	$letters = 'abdeghlmnoprstuw';

	$h = 7;

	for($i = 0; $i < strlen($string); $i++) {

		$indexOf = strpos($letters, $string[$i]);

		// the string has an invalid letter in it, so return zero
		if($indexOf === false){
			return 0;
		}

		$h = ($h * 37 + $indexOf);
	}

	return $h;
}

function habit_unhash($string){
	//implement this function
	$hash  = trim($string);
	$letters = 'abdeghlmnoprstuw';
	$next = '';
	$word = '';

	while($hash > 0)
	{
		echo $hash." Test <br/>";
		$remainder = 0;

		$next = (int)($hash / 37);
		$remainder = ($hash % 37);
		
		//echo $next."<br/>";
		if($next > 0)
		{
			$word = $word.''.substr($letters, $remainder, 1);
			$hash = $next;

		}
		else{
			//return $word;
			echo strrev($word);
			exit;
		}
	}
}

// Test Cases
assert(habit_hash('modern') == 18462465839);
assert(habit_hash('apple') == 485928144);
assert(habit_hash('planet') == 18664780475);
assert(habit_hash('newer') == 500573603);
assert(habit_hash('habit') == 0);	//invalid letter: I

/* Your Task:

We've put a secret word through the `habit_hash` function, and the result was 917622709512878.

We need you to implement the `habit_unhash` function in order to turn it back into a word, and show us how you did it.
*/

$the_word = habit_unhash('917622709512878');

echo $the_word;