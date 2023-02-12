<?php

namespace App\Models;

use App\supCategory;
use App\Category;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Post;
use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use LaratrustUserTrait; // add this trait to your user model


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar', 'mobile'
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

    public function doors()
    {
        return $this->hasMany(supCategory::class,'created_by');
    }

    public function laws()
    {
        return $this->hasMany(Category::class,'created_by');
    }

    public function mate()
    {
        return $this->hasMany(Post::class,'created_by');
    }
}
