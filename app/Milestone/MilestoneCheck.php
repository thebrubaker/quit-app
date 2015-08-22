<?php
namespace App\Milestone;

use App\User;
use App\Milestone\Milestone;
use App\Milestone\ChecksMilestones;
use Illuminate\Contracts\Auth\Guard;

class MilestoneCheck 
{

	/**
	 * The array of milestones returned
	 * @var array
	 */
	protected $milestones = [];

	/**
	 * The array of milestones returned
	 * @var array
	 */
	protected $types = ['days', 'money', 'minutes', 'cigarettes'];

	/**
	 * Check for eligible milestones and create them
	 * @param  array  $types which milestones to check
	 * @return array
	 */
	public function checkAndCreateMilestones($types, User $user)
	{	
		foreach($types as $type) {
			if($this->checkMiletoneEligibility($type, $user)) {
				$milestone = $this->createMilestone($type, $user);
				$this->milestones[] = $milestone;
			}
		}
		return $this->milestones;
	}

	/**
	 * Check if a milestone is eligible for creation by type
	 * @return boolean
	 */
	public function checkMiletoneEligibility($type, User $user)
	{
		$milestone = $this->getMilestoneByType($type, $user);

		$today = $user->quit->getByType($type);
		$check = (is_object($milestone) ? $milestone->value : null);
		$values = config('milestone.' . $type . '.values');
		$step = config('milestone.' . $type . '.step');

		return $this->checkEligibility($today, $check, $values, $step);
	}

	/**
	 * Create a milestone for a user
	 * @param  string $type
	 * @return Milestone
	 */
	public function createMilestone($type, User $user)
	{
		$milestone = new Milestone;
		$milestone->type = $type;
		$milestone->value = $user->quit->getByType($type);
		$milestone = $user->milestones()->save($milestone);
		return $milestone;
	}

	/**
	 * Get most recent days milestone
	 * @return Milestone
	 */
	public function getMilestoneByType($type, User $user)
	{
	    $milestone = $user->milestones()
	        ->where('type', $type)
	        ->orderBy('created_at', 'desc')
	        ->first();
	    return $milestone;
	}

	/**
	 * Checks eligibility against exact values and steps
	 * @param  integer 	$today   	Todays value
	 * @param  integer 	$milestone 	The value we are checking against
	 * @param  array 	$values    	An array of exact values we want to check
	 * @param  integer  $step      	Every step value we want to check (divisible)
	 * @return boolean  
	 */
	public function checkEligibility($today = 0, $check = 0, $values = array(), $step = 0) {
		if($today <= $check) {
			return false;
		}
		if($today <= max($values)) {
			foreach($values as $value) {
				if ($value > $check && $today === $value) {
					return true;
				}
			}
		}
		if($today >= $step) {
			if($check < $step) {
				return true;
			}
			if($today >= $check + $step - $check % $step) {
				return true;
			}
		}
		return false;
	}
}