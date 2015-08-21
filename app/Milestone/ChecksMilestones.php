<?php

namespace App\Milestone;

trait ChecksMilestones {

	/**
	 * Checks if the user is eligible for the creation of a new milestone
	 * @param  integer 	$today   	The value for today
	 * @param  integer 	$milestone 	The most recent milestone value
	 * @param  array 	$values    	Any specific values to check
	 * @param  integer  $step      	The step you want to divide and check for
	 * @return boolean  
	 */
	public static function check($today, $milestone, $values, $step) {
		if($today <= $milestone) {
			return false;
		}
		if($today <= max($values)) {
			foreach($values as $value) {
				if ($value > $milestone && $today === $value) {
					return true;
				}
			}
		}
		if($today >= $step) {
			if($milestone < $step) {
				return true;
			}
			if($today >= $milestone + $step - $milestone % $step) {
				return true;
			}
		}
		return false;
	}
}