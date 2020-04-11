<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    //If you would like to make all attributes mass assignable, you may define the $guarded not $fillable
    protected $guarded = [];

    use softDeletes;
    
  public function getImageUrlAttribute($value)
  {
      $imageUrl = "";

      if (!is_null($this->image)) {
         $imagePath = public_path() ."/uploads/images/sliders/" . $this->image;
         if(file_exists($imagePath)) $imageUrl = asset("/uploads/images/sliders/" . $this->image);
      }

      return $imageUrl;
  }

     // Relasi users ke slider
   public function user()
   {
       return $this->belongsTo(User::class);
   }



    // SEO 
    public function getRouteKeyName()
    {
     return 'slug';
     }
}
