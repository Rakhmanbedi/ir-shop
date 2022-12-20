<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

protected $fillable = ['name', 'url', 'description', 'price','size','category_id','name_en', 'name_kz','name_ru', 'img_1', 'img_2', 'img_3'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function usersRated(){
        return $this->belongsToMany(User::class)->
        withPivot('rating');
    }
    public function basketUser(){
        return $this->belongsToMany(User::class,'user_product')->withPivot('size','color','amount');
    }


}
