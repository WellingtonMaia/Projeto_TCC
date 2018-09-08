<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function tasks()
    {
    	return $this->belongsTo('App\Models\Task');
    }
}
