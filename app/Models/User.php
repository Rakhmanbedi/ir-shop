<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'img',
        'balance'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);

    }
    public function productsRated(){
        return $this->belongsToMany(Product::class)->
            withPivot('rating');
    }
    public function basketProduct(){
        return $this->belongsToMany(Product::class,'user_product')->
        withPivot('size','color','amount');
    }

}
