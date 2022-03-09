<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

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
                "meta_keywords" => "Eukanuba, large breed, small breed, medium breed, puppy, adult, mature &amp; senior, EVD, eukanuba veterinary diets, Yorkshire Terrier, Working &amp; endurance, weight control, lamb &amp; rice, daily care, sensitive joints, sensitive skin, sensitive diges"
            ),
            array(
                "id" => "590", 
                "name" => "Cat Toys", 
                "meta_title" => "Buy Cat Toys in South Africa Online at ePETstore.co.za", 
                "meta_description" => "A complementary range of cat scratchers, interactive feeders and toys to entertain your cat 24/7. Buy now.", 
                "meta_keywords" => "Catit speed circuit, scratching post, feather wand, woolly monster, crazy ear mouse, catnip mouse, twinkle ball, kong, slimcat interactive ball, snuggle and rest, orakat, wiggle worm, laser fun toy, breath mint stick, feather buddy, easy life scratcher ha"
            ),
            array(
                "id" => "635", 
                "name" => "Cat Treats", 
                "meta_title" => "Buy Cat Treats in South Africa Online at ePETstore.co.za", 
                "meta_description" => "Spoil your cat with Iams or Royal Canin pouches, Greenies dental treats and catnip options to make them purr.", 
                "meta_keywords" => "Catnip, Iams, Royal Canin, pouches, Greenies dental treats, salmon, ocean fish, chicken, kitten, adult, senior, ocean fish, instinctive, beauty, jelly, light, catnip drops"
            ),
        );
        // insert products into the products table
        Product::insert($products);
            
    }
}
