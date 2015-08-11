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
     * Return the quit object's user
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function daysQuit() {
    	$now = new Carbon();
    	$quit_date = new Carbon($this->quit_date);
    	$days = $now->diffInDays($quit_date);
    	return number_format($days,0);
    }

    public function moneySaved() {
    	$money = $this->daysQuit() * $this->costPerPack() * $this->packsPerDay();
    	return number_format($money, 2);
    }

    public function notSmoked()
    {
    	$smoked = $this->cigarettesPerDay() * $this->daysQuit();
    	return number_format($smoked,0);
    }

    public function costPerPack()
    {
    	return $this->cost_per_pack;
    }

    public function packsPerDay()
    {
    	return $this->packs_per_week / 7;
    }

    public function cigarettesPerDay()
    {
    	return $this->packsPerDay() * $this->cigarettes_per_pack;
    }

    public function timeSaved() {
    	$smokeTime = 5;
    	$minutes = $this->cigarettesPerDay() * $this->daysQuit() * $smokeTime;
    	return $this->minutesToTime($minutes);
    }

    public function minutesToTime($minutes) {
        return Carbon::now()->addMinutes($minutes)->diffForHumans(null,true);
    }
}
