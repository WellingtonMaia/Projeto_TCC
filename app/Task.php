<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    public function project()
    {
    	return $this->belongsTo('App\Project');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    }   

    public function times()
    {
        return $this->hasMany('App\Time');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }
}
