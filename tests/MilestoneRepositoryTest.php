<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Milestone\MilestoneRepository;
use App\User;

class MilestoneRepositoryTest extends TestCase
{
	public function test_user_quit()
	{
		$user = User::find(1);
		$this->assertTrue($user->quit->packs_per_week == 2);
	}

	public function testCigarettesMilestoneDoesNotExist()
	{
		$user = User::find(1);
		$repository = new MilestoneRepository($user);
		$milestone = $repository->getCigarettesMilestone();
		$this->assertEquals($milestone, 0);
	}

	public function testDaysMilestoneDoesNotExist()
	{
		$user = User::find(1);
		$repository = new MilestoneRepository($user);
		$milestone = $repository->getDaysMilestone();
		$this->assertEquals($milestone, 0);
	}

	public function testMinutesMilestoneDoesNotExist()
	{
		$user = User::find(1);
		$repository = new MilestoneRepository($user);
		$milestone = $repository->getMinutesMilestone();
		$this->assertEquals($milestone, 0);
	}

	public function testMoneyMilestoneDoesNotExist()
	{
		$user = User::find(1);
		$repository = new MilestoneRepository($user);
		$milestone = $repository->getMoneyMilestone();
		$this->assertEquals($milestone, 0);
	}

	public function testDayValuesConfig()
	{
		$values = config('milestone.days.values');
		$this->assertEquals($values, [2,3,5,7,10,15]);
	}

	public function testDayStepConfig()
	{
		$step = config('milestone.days.step');
		$this->assertEquals($step, 20);
	}

	public function testCheckFunctionForDays()
	{
		$user = User::find(1);
		$repository = new MilestoneRepository($user);
		$days = $user->quit->getDays();
		$milestone = $repository->getDaysMilestone();
		$values = config('milestone.days.values');
		$step = config('milestone.days.step');
		$this->assertTrue($repository->check($days,$milestone,$values,$step));
	}
	
}