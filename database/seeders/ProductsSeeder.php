<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = array(
            array(
                "id" => "553", 
                "name" => "Dog Dry Food", 
                "meta_title" => "Buy Dog Dry Food in South Africa Online at ePETstore.co.za", 
                "meta_description" => "Shop our full range of Eukanuba, Royal Canin, Vet's Choice and Earthborn dry dog food now. Every palate is covered.", 
                "meta_keywords" => "Eukanuba, large breed, small breed, medium breed, puppy, adult, mature &amp; senior, EVD, eukanuba veterinary diets, Yorkshire Terrier, Working &amp; endurance, weight control, lamb &amp; rice, daily care, sensitive joints, sensitive skin, sensitive diges",
                "slug" => "dog-dry-food",
                "is_published" => 1
            ),
            array(
                "id" => "590", 
                "name" => "Cat Toys", 
                "meta_title" => "Buy Cat Toys in South Africa Online at ePETstore.co.za", 
                "meta_description" => "A complementary range of cat scratchers, interactive feeders and toys to entertain your cat 24/7. Buy now.", 
                "meta_keywords" => "Catit speed circuit, scratching post, feather wand, woolly monster, crazy ear mouse, catnip mouse, twinkle ball, kong, slimcat interactive ball, snuggle and rest, orakat, wiggle worm, laser fun toy, breath mint stick, feather buddy, easy life scratcher ha",
                "slug" => "cat-toys",
                "is_published" => 1
            ),
            array(
                "id" => "635", 
                "name" => "Cat Treats", 
                "meta_title" => "Buy Cat Treats in South Africa Online at ePETstore.co.za", 
                "meta_description" => "Spoil your cat with Iams or Royal Canin pouches, Greenies dental treats and catnip options to make them purr.", 
                "meta_keywords" => "Catnip, Iams, Royal Canin, pouches, Greenies dental treats, salmon, ocean fish, chicken, kitten, adult, senior, ocean fish, instinctive, beauty, jelly, light, catnip drops",
                "slug" => "cat-treats",
                "is_published" => 1
            ),
        );
        // insert products into the products table
        Product::insert($products);

        $categories = array(
            array(
                "category_name"=> "Cats",
                "category_description" => "cats",
                "slug" => "cats"
            ),
            array(
                "category_name" => "Dogs",
                "category_description" => "Dogs",
                "slug" => "dogs"
            ),
            array(
                "category_name" => "Birds",
                "category_description" => "Birds",
                "slug" => "birds"
            ),
        );
        // insert products into the products table
        Category::insert($categories);


        $assignedCategories = array(
            array(
                "product_id" => 590,
                "category_id" => 2
            ),
            array(
                "product_id" => 590,
                "category_id" => 1
            ),
            array(
                "product_id" => 635,
                "category_id" => 2
            ),
            array(
                "product_id" => 553,
                "category_id" => 1
            )
            );
            DB::table('products_categories')->insert($assignedCategories);


        // insert product variants into the products values
        $variants = array(
            array(
                "name" => "Quantity",
                "product_id" => 590,
                "description" => "Case of 24",
                "value" => "952"
            ),
            array(
                "name" => "Quantity",
                "product_id" => 590,
                "description" => "Case of 12",
                "value" => "952"
            ),
            array(
                "name" => "Quantity",
                "product_id" => 590,
                "description" => "Case of 6",
                "value" => "952"
            ),
            array(
                "name" => "Quantity",
                "product_id" => 553,
                "description" => "2kg",
                "value" => "152"
            ),
            array(
                "name" => "Quantity",
                "product_id" => 553,
                "description" => "5kg",
                "value" => "352"
            ),
            array(
                "name" => "Quantity",
                "product_id" => 635,
                "description" => "2kg",
                "value" => "152"
            )
        );

        DB::table('product_variants')->insert($variants);
    }
}
