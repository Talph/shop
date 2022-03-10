<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $table = 'product_values';
    
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    
        public function options()
    {
        return $this->belongsToMany(Option::class, 'variant_options');
    }
}