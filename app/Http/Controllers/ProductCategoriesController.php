<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductCategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('dashboard.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|min:1|max:64',
            'subname'          => 'required',
            'product_body'           => 'required',
            'short_description' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->meta_desc = $request->input('meta_desc');
        $product->seo_keywords = $request->input('seo_keywords');
        $product->short_description = $request->input('short_description');
        $product->product_body = $request->input('product_body');
        $product->seo_name = $request->input('seo_name');
        $product->is_published = $request->input('is_published');
        if (!$request->input('producted_at')) {
            $product->producted_at = Carbon::now()->toDateTimeString();
        } else {
            $product->producted_at = $request->input('producted_at');
        }
        $product->save();
        $category = $request->input('category_id');
        if ($category) {
            foreach ($category as $cat) {
                $product->categories()->attach($cat);
            }
        }
        $request->session()->flash('message', 'Successfully created product');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('user')->find($id);
        return view('dashboard.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Product $Product)
    {
        
        $product = Product::find($id);
        $categories = ProductCategory::get();
        return view('dashboard.products.edit', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Product $Product)
    {
        $validatedData = $request->validate([
            'name'             => 'required|min:1|max:64',
            'product_body'           => 'required',
            'short_description' => 'required',
        ]);

        $product = Product::find($id);
        $product->name     = $request->input('name');
        $product->meta_desc     = $request->input('meta_desc');
        $product->short_description     = $request->input('short_description');
        $product->product_body   = $request->input('product_body');
        $product->seo_name = $request->input('seo_name');
        $product->is_published = $request->input('is_published');
        $product->save();

        $product->categories()->detach();
        $category = $request->input('category_id');
        if ($category) {
            foreach ($category as $cat) {
                $product->categories()->attach($cat);
            }
        }
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->status = 'Deleted';
            $product->delete();
        }
        $product->categories()->detach();
        return redirect()->route('products.index');
    }
}
