<?php

namespace App\Milestone;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Milestone extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'milestone';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['type', 'value'];

    /**
     * The objects relationship with the user
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Output the human readable timestamp for the notification
     * @return string
     */
    public function time()
    {
    	return '5 minutes ago';
    }

    /**
     * Output the number of days, rounded up
     * @return string
     */
    public function getDays()
    {
        return round($this->value,0);
    }

    /**
     * Output the number of days, rounded up
     * @return string
     */
    public function getMinutes()
    {
        return round($this->value,0);
    }

    /**
     * Output the number of days, rounded up
     * @return string
     */
    public function getCigarettes()
    {
        return round($this->value,0);
    }

}
