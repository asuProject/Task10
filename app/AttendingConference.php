<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendingConference extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attending_conferences';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['conference_id', 'attendance_type_id', 'research_plan_id', 'staff_id', 'sponsor_id', 'approval_info_id', 'request_date', 'flight_amount', 'other_amount', 'comments'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	protected static function boot()
	{
		parent::boot();

		static::deleting(function($attending)
		{
			$attending->ApprovalInfo()->delete();
		});
	}

	public function Conference()
	{
		return $this->belongsTo('App\Conference');
	}

	public function AttendanceType()
	{
		return $this->belongsTo('App\AttendanceType');
	}

	public function ResearchPlan()
	{
		return $this->belongsTo('App\ResearchPlan');
	}

	public function Staff()
	{
		return $this->belongsTo('App\Staff');
	}

	public function Sponsor()
	{
		return $this->belongsTo('App\Sponsor');
	}

	public function ApprovalInfo()
	{
		return $this->belongsTo('App\ApprovalInfo');
	}
}