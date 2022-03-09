<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'products';
    protected $fillable = ['name', 'slug', 'meta_title', 'meta_description', 'meta_keywords',];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

    public function variants()
    {
        return $this->belongsToMany(Category::class, 'products_variants');
    }
}
