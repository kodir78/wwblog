<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;
    
    protected $table = 'categories';
    protected $fillable = [
        'title', 'slug', 'status','image', 'created_by','updated_by', 'deleted_by', 'deleted_at',
    ];
    
    public function author(){
    	return $this->belongsTo('App\User');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function getRouteKeyName()
	{
	    return 'slug';
    }
    
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
  
        if (!is_null($this->image)) {
            $imagePath = public_path() ."/uploads/images/category/" . $this->image;
            // $imagePath = public_path() ."/uploads/images/category/" . $this->image;
            // if(file_exists($imagePath)) $imageUrl = asset("public/uploads/images/category/" . $this->image);
            if(file_exists($imagePath)) $imageUrl = asset("/uploads/images/category/" . $this->image);
        }
  
        return $imageUrl;
    }
}
