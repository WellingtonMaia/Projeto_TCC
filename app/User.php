<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task', 'tasks_has_users');
    }

    /*public function tasks_test(){
        return $this->hasMany();
    }*/

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'projects_has_users', 'user_id', 'project_id' );
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    public function time()
    {
        return $this->hasMany('App\Models\Time');
    }



}
