<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Style pagination using bootstrap
        Paginator::useBootstrap();

        // registering a callback to be executed upon the creation of a Product
        Product::creating(function ($product) {
            // create a slug based on the activity title
            $slug = Str::slug($product->slug);
            // check if slug exist and count them
            $count = Product::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();
            // if other slugs exist that are the same, append the count to the slug
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        Product::updating(function ($product) {
            if ($product->id) {
                // create a slug based on the activity title
                $slug = Str::slug($product->slug);
                // check if slug exist and count them
                $count = Product::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();
                // if other slugs exist that are the same, append the count to the slug
                $product->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        });

        // registering a callback to be executed upon the creation of a Product Category
        Category::creating(function ($category) {
            // create a slug based on the activity title
            $slug = Str::slug($category->category_name);
            // check if slug exist and count them
            $count = Category::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();
            // if other slugs exist that are the same, append the count to the slug
            $category->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        Category::updating(function ($category) {
            if (!$category->id) {
                // create a slug based on the activity title
                $slug = Str::slug($category->slug);
                // check if slug exist and count them
                $count = Category::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();
                // if other slugs exist that are the same, append the count to the slug
                $category->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        });
    }
}
