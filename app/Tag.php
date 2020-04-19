<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use softDeletes;
    protected $table = 'tags';
    protected $fillable = [
        'title', 'slug',
    ];

    public function users(){
    	return $this->belongsTo(User::class);
    }

    public function posts(){
    	return $this->belongsToMany(Post::class);
    }

    // SEO 
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
