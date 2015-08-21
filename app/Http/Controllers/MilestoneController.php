<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Milestone;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MilestoneController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    public function check(Guard $auth)
    {
        $user = $auth->user;
        if($user->checkMilestone('days')) {
            // Create new milestone and flash
            $milestone = new Milestone;
            $milestone->type = 'days';
            $milestone->value = $user->quit->daysQuit();
            $milestone = $user->milestone()->save($milestone);
            session()->flash('milestone.day', $milestone->notification());
        }
        if($user->checkMilestone('money')) {
            // Create new milestone and flash
            $milestone = new Milestone;
            $milestone->type = 'money';
            $milestone->value = $user->quit->moneySaved();
            $milestone = $user->milestone()->save($milestone);
            session()->flash('milestone.money', $milestone->notification());
        }
        if($user->checkMilestone('minutes')) {
            // Create new milestone and flash
            $milestone = new Milestone;
            $milestone->type = 'minutes';
            $milestone->value = $user->quit->minutesSaved();
            $milestone = $user->milestone()->save($milestone);
            session()->flash('milestone.minutes', $milestone->notification());
        }
        if($user->checkMilestone('cigarettes')) {
            // Create new milestone and flash
            $milestone = new Milestone;
            $milestone->type = 'cigarettes';
            $milestone->value = $user->quit->cigarettes();
            $milestone = $user->milestone()->save($milestone);
            session()->flash('milestone.cigarettes', $milestone->notification());
        }
    }
}
