<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;



class User extends Authenticatable
{
   use LaratrustUserTrait; // add this trait to your user model
    use Notifiable;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password', 'user_login', 'slug', 'user_url',
        'user_phone', 'avatar', 'bio',
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
        return $this->hasMany(Category::class);
    }
    
    // SEO 
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //fungsi enkripsi password
    public function setPasswordAttribute($value)
    {
        if (! empty($value)) $this->attributes['password'] = crypt($value, '');
    }

}
