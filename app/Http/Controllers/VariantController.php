<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::find($id);
        $variants = Variant::where('product_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.variants.index', ['variants' => $variants, 'product' => $product]);
    }
}
