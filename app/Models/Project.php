<?php

namespace App\Models;

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
    	return $this->hasMany('App\Models\Task');
    }
    
    public function payAccounts()
    {
    	return $this->hasMany('App\Models\PayAccount');
    }
    
    public function receiveAccounts()
    {
    	return $this->hasMany('App\Models\ReceiveAccount');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'projects_has_users');
    }

    public function financial(){
        return $this->hasOne(Financial::class, 'foreign_key');
    }
}
