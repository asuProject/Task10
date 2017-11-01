<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovalInfo extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'approval_info';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['department_approval_date', 'faculty_approval_date', 'university_approval_date', 'university_decree_number', 'university_decree_document'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public function AttendingConference()
	{
		return $this->hasOne('App\AttendingConference');
	}
}