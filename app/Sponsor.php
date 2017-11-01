<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sponsors';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['country_id', 'town_id', 'name', 'email', 'phone', 'website', 'comments'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public function Country()
	{
		return $this->belongsTo('App\Country');
	}

	public function City()
	{
		return $this->belongsTo('App\City');
	}

	public function AttendingConference()
    {
        return $this->hasMany('App\AttendingConference');
    }

}