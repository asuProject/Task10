<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ForeignerAttendee extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'foreigner_attendee';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','country_id','city_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function Conference()
    {
        return $this->belongsToMany('App\Conference', 'foreign_attendances')->withTimestamps()->withPivot('role_id');
    }

	/**
	 * Change the locale of created_at attribute.
	 *
	 * @param  string  $request
	 * @return \Carbon\Carbon
	 */
	public function getCreatedAtAttribute($value)
	{
		$new_value = new Carbon($value);
		$new_value->setLocale(config('app.locale'));
		return new Carbon($new_value);
	}

	/**
	 * Change the locale of updated_at attribute.
	 *
	 * @param  string  $request
	 * @return \Carbon\Carbon
	 */
	public function getUpdatedAtAttribute($value)
	{
		$new_value = new Carbon($value);
		$new_value->setLocale(config('app.locale'));
		return new Carbon($new_value);
	}
}