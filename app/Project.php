<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function tasks()
    {
    	return $this->hasMany('App\Task');
    }
    
    public function payAccounts()
    {
    	return $this->hasMany('App\PayAccount');
    }
    
    public function receiveAccounts()
    {
    	return $this->hasMany('App\ReceiveAccount');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
