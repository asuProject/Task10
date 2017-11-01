<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForeignAttendance extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'foreign_attendances';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['conference_id', 'foreign_attendee_id', 'role_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public function ConferenceRole()
	{
		return $this->belongsTo('App\ConferenceRole');
	}
}