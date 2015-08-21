<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class Quit extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'quit';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['quit_date', 'packs_per_week', 'cigarettes_per_pack', 'cost_per_pack'];

    /**
     * The objects relationship with the user
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getByType($type)
    {
        if($type == 'days') {
            return $this->getDays();
        }
        if($type == 'money') {
            return $this->getMoney();
        }
        if($type == 'minutes') {
            return $this->getMinutes();
        }
        if($type == 'cigarettes') {
            return $this->getCigarettes();
        }
    }

    public function getDays() {
    	$now = new Carbon();
    	$quit_date = new Carbon($this->quit_date);
    	$days = $now->diffInDays($quit_date);
    	return $days;
    }

    public function getMoney() {
    	$money = $this->getDays() * $this->costPerPack() * $this->packsPerDay();
    	return round($money, 2);
    }

    public function getCigarettes()
    {
    	$smoked = $this->cigarettesPerDay() * $this->getDays();
    	return round($smoked,0);
    }

    public function getMinutes() {
    	$smokeTime = 5;
    	$minutes = $this->cigarettesPerDay() * $this->getDays() * $smokeTime;
    	return round($minutes,0);
    }

    private function costPerPack()
    {
        return $this->cost_per_pack;
    }

    private function packsPerDay()
    {
        return $this->packs_per_week / 7;
    }

    private function cigarettesPerDay()
    {
        return $this->packsPerDay() * $this->cigarettes_per_pack;
    }

}
