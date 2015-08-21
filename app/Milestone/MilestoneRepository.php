<?php
namespace App\Milestone;

use App\User;
use App\Milestone\Milestone;
use App\Milestone\ChecksMilestones;
use Illuminate\Contracts\Auth\Guard;

class MilestoneRepository 
{
	use ChecksMilestones;

	protected $milestones;
	protected $user;

	function __construct(User $user) {
		$this->user = $user;
		$this->milestones = array();
	}

	public function checkAndCreateMilestones()
	{
		if($this->checkDays()) {
			$milestone = new Milestone;
			$milestone->type = 'days';
			$milestone->value = $this->user->quit->getDays();
			$milestone = $this->user->milestones()->save($milestone);
			$this->milestones[] = $milestone;
		}
		if($this->checkMoney()) {
			$milestone = new Milestone;
			$milestone->type = 'money';
			$milestone->value = $this->user->quit->getMoney();
			$milestone = $this->user->milestones()->save($milestone);
			$this->milestones[] = $milestone;
		}
		if($this->checkMinutes()) {
			$milestone = new Milestone;
			$milestone->type = 'minutes';
			$milestone->value = $this->user->quit->getMinutes();
			$milestone = $this->user->milestones()->save($milestone);
			$this->milestones[] = $milestone;
		}
		if($this->checkCigarettes()) {
			$milestone = new Milestone;
			$milestone->type = 'cigarettes';
			$milestone->value = $this->user->quit->getCigarettes();
			$milestone = $this->user->milestones()->save($milestone);
			$this->milestones[] = $milestone;
		}
		if(!empty($this->milestones)) {
			session()->flash('milestones.newly_created', $this->milestones);
		}
	}

	/**
	 * Check if there is a new days milestone ready to be created
	 * @return boolean
	 */
	public function checkDays()
	{
		$today = $this->user->quit->getDays();
		$milestone = $this->getDaysMilestone();
		$values = config('milestone.days.values');
		$step = config('milestone.days.step');
		return $this->check($today, $milestone, $values, $step);
	}

	/**
	 * Check if there is a new days milestone ready to be created
	 * @return boolean
	 */
	public function checkMoney()
	{
		$today = $this->user->quit->getMoney();
		$milestone = $this->getMoneyMilestone();
		$values = config('milestone.money.values');
		$step = config('milestone.money.step');
		return $this->check($today, $milestone, $values, $step);
	}

	/**
	 * Check if there is a new days milestone ready to be created
	 * @return boolean
	 */
	public function checkMinutes()
	{
		$today = $this->user->quit->getMinutes();
		$milestone = $this->getMinutesMilestone();
		$values = config('milestone.minutes.values');
		$step = config('milestone.minutes.step');
		return $this->check($today, $milestone, $values, $step);
	}

	/**
	 * Check if there is a new days milestone ready to be created
	 * @return boolean
	 */
	public function checkCigarettes()
	{
		$today = $this->user->quit->getCigarettes();
		$milestone = $this->getCigarettesMilestone();
		$values = config('milestone.cigarettes.values');
		$step = config('milestone.cigarettes.step');
		return $this->check($today, $milestone, $values, $step);
	}

	/**
	 * Get most recent days milestone
	 * @return integer
	 */
	public function getDaysMilestone()
	{
	    $milestone = $this->user->milestones()
	        ->where('type', 'days')
	        ->orderBy('created_at', 'desc')
	        ->first();
	    if($milestone) {
	    	return $milestone->value;
	    }
	    return 0;
	}

	/**
	 * Get most recent money milestone
	 * @return integer
	 */
	public function getMoneyMilestone()
	{
	    $milestone = $this->user->milestones()
	        ->where('type', 'money')
	        ->orderBy('created_at', 'desc')
	        ->first();
	    if($milestone) {
	    	return $milestone->value;
	    }
	    return 0;
	}

	/**
	 * Get most recent money milestone
	 * @return integer
	 */
	public function getMinutesMilestone()
	{
	    $milestone = $this->user->milestones()
	        ->where('type', 'minutes')
	        ->orderBy('created_at', 'desc')
	        ->first();
	    if($milestone) {
	    	return $milestone->value;
	    }
	    return 0;
	}

	/**
	 * Get most recent money milestone
	 * @return integer
	 */
	public function getCigarettesMilestone()
	{
	    $milestone = $this->user->milestones()
	        ->where('type', 'cigarettes')
	        ->orderBy('created_at', 'desc')
	        ->first();
	    if($milestone) {
	    	return $milestone->value;
	    }
	    return 0;
	}
}