<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Organizer extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'organizers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','type','comments'];
	protected $appends = ['type_str'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

    public function Conference()
    {
        return $this->belongsToMany('App\Conference', 'conference_organizers')->withTimestamps();
    }

    /**
     * translate type to its equivalent string
     * @return string
     */
    public function gettypeStrAttribute()
    {
        if($this->type==1)
            return __('faculty');
        elseif ($this->type==2)
            return __('department');
        elseif ($this->type==3)
            return __('other');
        else
            return "";
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