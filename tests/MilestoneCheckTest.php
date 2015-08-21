<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Milestone\MilestoneCheck;
use App\User;

class CheckMilestonesTest extends TestCase
{

    /**
     * Test MileStoneCheck works with a variety of inputs.
     *
     * @return void
     */
    public function test_today_is_before_milestone()
    {
        $this->assertFalse(MilestoneCheck::checkEligibility(1,8,[1,2,3,4,5],4));
    }

    public function test_today_matches_exact_value()
    {
        $this->assertTrue(MilestoneCheck::checkEligibility(5,2,[1,2,3,4,5],4));
    }

    public function test_today_matches_step()
    {
        $this->assertTrue(MilestoneCheck::checkEligibility(8,2,[1,2,3,4,5],4));
    }

    public function test_today_is_past_step()
    {
        $this->assertTrue(MilestoneCheck::checkEligibility(43,20,[1,2,3,4,5],20));
    }

    public function test_today_matches_milestone_and_value()
    {
        $this->assertFalse(MilestoneCheck::checkEligibility(20,20,[20,30],20));
    }

    public function test_milestone_doesnt_exist()
    {
        $user = User::find(1);
        $this->assertNull(MilestoneCheck::getMilestoneByType('days', $user));
    }

    public function test_milestone_null_value_on_check()
    {
        $this->assertFalse(MilestoneCheck::checkEligibility(15,NULL,[20,30],20));
    }

}