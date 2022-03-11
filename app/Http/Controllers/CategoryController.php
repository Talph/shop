<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $categories = Category::paginate(20);
        return view('dashboard.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('dashboard.categories.create', ['categories' => $categories]);
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
            'category_name' => 'required|min:1|max:64',
        ]);

        $user = auth()->user();
        $category = new Category();
        $category->category_name     = $request->input('category_name');
        $category->category_description     = $request->input('category_description');
        $category->save();
        return redirect()->back()->with('message', 'Successfully created category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.show', ['category' => $category]);
    }

    /**
     * Display the specified resource products in a category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryProducts($id)
    {
        $category = category::find($id);
        return view('dashboard.categories.products', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.edit', ['category' => $category]);
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
        $validatedData = $request->validate([
            'category_name'             => 'required|min:1|max:64',
            'category_description'          => 'required',
        ]);
        $category = Category::find($id);
        $slug = Str::slug($request->input('slug'), '-');
        $category->category_name = $request->input('category_name');
        $category->category_description = $request->input('category_description');
        $category->slug = $slug;
        $category->save();
        return redirect()->back()->with('message', 'Successfully edited category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
        }
        return redirect()->route('categories.index')->with('err_message', 'Successfully deleted category');;
    }
}
