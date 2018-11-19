<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function tasks()
    {
    	return $this->belongsTo('App\Models\Task');
    }

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
