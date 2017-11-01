<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'countries';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'code'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	protected static function boot()
	{
		parent::boot();

		static::deleting(function($country)
		{
			$country->City()->delete();
		});
	}

	public function City()
	{
		return $this->hasMany('App\City');
	}

    public function foreigner_attendee()
    {
        return $this->hasMany('App\ForeignerAttendee');
	}

	public function Sponsor()
	{
		return $this->hasMany('App\Sponsor');
	}


}