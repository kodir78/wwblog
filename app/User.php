<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    // use softDeletes;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password', 'user_login', 'slug', 'user_url',
        'user_role', 'user_phone', 'avatar', 'user_bio',
        'status', 'display_name',
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // Relasi users ke posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
    
     // Relasi users ke slider
     public function sliders()
     {
         return $this->hasMany(Slider::class, 'created_by');
     } 
    public function categories()
    {
        return $this->hasMany('App\Category');
    }
    
    // SEO 
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
