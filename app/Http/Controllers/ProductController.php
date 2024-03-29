<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $categories = Category::all();
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
            'name' => 'required|min:1|max:64',
            'slug' => 'required',
            'meta_title' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->meta_description = $request->input('meta_description');
        $product->meta_title = $request->input('meta_title');
        $product->slug = $request->input('slug');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->is_published = $request->input('is_published');
        $product->save();

        $category = $request->input('category_id');
        if ($category) {
            foreach ($category as $cat) {
                $product->categories()->attach($cat);
            }
        }
        return redirect()->back()->with('message', 'Successfully added product');

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
        $variants = Variant::where('product_id', $id)->get(['description', 'id']);
        return view('dashboard.products.show', ['product' => $product, 'variants' => $variants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('dashboard.products.edit', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1|max:64',
            'slug' => 'required',
            'meta_title' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->meta_description     = $request->input('meta_description');
        $product->meta_title     = $request->input('meta_title');
        $product->slug   = $request->input('slug');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->is_published = $request->input('is_published');
        $product->save();

        $product->categories()->detach();
        $category = $request->input('category_id');
        if ($category) {
            foreach ($category as $cat) {
                $product->categories()->attach($cat);
            }
        }
        return redirect()->back()->with('message', 'Successfully edited product');
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
            Variant::where('product_id', $id)->delete();
            $product->delete();
        }
        $product->categories()->detach();
        return redirect()->route('products.index')->with('err_message', 'Successfully deleted product');
    }
}
