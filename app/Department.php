<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Department extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['description'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

    public function researchplans()
    {
        return $this->hasMany('App\ResearchPlan');
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