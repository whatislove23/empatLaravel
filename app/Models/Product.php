<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'description', 'price', 'img', "sale"];

    public function comments()
    {
        return $this->hasMany(Coment::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
