<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    //
    use SoftDeletes;
    public function users(){
    	return $this->belongsTo('App\User');
    }
}
