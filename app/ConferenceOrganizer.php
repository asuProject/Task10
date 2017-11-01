<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConferenceOrganizer extends Model
{
    protected $table = "conference_organizers";
    public $timestamps = false;
    protected $guarded = [];
}
