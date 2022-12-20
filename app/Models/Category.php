<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'name_en',
        'name_kz',
        'name_ru',
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }


}
