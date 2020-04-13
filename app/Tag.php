<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use softDeletes;
    protected $table = 'tags';
    protected $fillable = [
        'title', 'slug', 'hits', 'created_by','updated_by', 'deleted_by', 'deleted_at',
    ];

    public function users(){
    	return $this->belongsTo(User::class);
    }

    public function posts(){
    	return $this->belongsToMany(Post::class);
    }
}
