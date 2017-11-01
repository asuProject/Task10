<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'conferences';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['conference_type_id', 'country_id', 'city_id', 'name', 'start_date', 'website', 'comments'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public function ConferenceType()
	{
		return $this->belongsTo('App\ConferenceType');
	}

	public function Organizer()
	{
		return $this->belongsToMany('App\Organizer', 'conference_organizers')->withTimestamps();
	}

	public function Country()
	{
		return $this->belongsTo('App\Country');
	}

	public function City()
	{
		return $this->belongsTo('App\City');
	}

	public function ForeignAttendance()
	{
		return $this->belongsToMany('App\ForeignAttendance', 'foreign_attendances')->withTimestamps()->withPivot('role_id');
	}

	public function AttendingConference()
	{
		return $this->hasMany('App\AttendingConference');
	}
}