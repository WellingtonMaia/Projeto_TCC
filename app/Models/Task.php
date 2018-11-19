<?php

namespace App\Models;

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
    	return $this->belongsTo('App\Models\Project');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'tasks_has_users');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }   

    public function times()
    {
        return $this->hasMany('App\Models\Time');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}
