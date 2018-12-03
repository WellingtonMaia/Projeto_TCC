<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function tasks()
    {
    	return $this->belongsTo('App\Models\Task','task_id');
    }

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
