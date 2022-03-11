<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        try {
            $categories = Category::get();
            $products = Product::where('is_published', 1)->get();
            return view('shop.index', ['products' => $products, 'categories' => $categories]);
        } catch (\Throwable $th) {
            $products = [];
            $categories = [];
            $dbConnection = "No database connection!";
            return view('shop.index', [
                'products' => $products,
                'categories' => $categories,
                'err_message' => $dbConnection
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $variants = Variant::where('product_id', $id)->get();
        $relatedproducts = Product::limit(5)->where('id', '!=', $id)->get();
        return view('shop.show', ['product' => $product, 'variants' => $variants, 'relatedproducts' => $relatedproducts]);
    }
}
