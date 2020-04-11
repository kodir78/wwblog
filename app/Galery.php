<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galery extends Model
{
    //
    use softDeletes;
    public function users(){
    	return $this->belongsTo('App\User');
    }
}
