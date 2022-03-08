<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    
    
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'products_products_categories');
    }

    public function variants()
    {
        return $this->belongsToMany(ProductCategory::class, 'products_products_variants');
    }
}
