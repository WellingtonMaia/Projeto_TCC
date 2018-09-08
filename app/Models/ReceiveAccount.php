<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiveAccount extends Model
{
    public function project()
    {
    	return $this->belongsTo('App\Models\Project');
    }
}
