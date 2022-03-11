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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1|max:64',
        ]);

        $variant = new Variant();
        $variant->name = $request->input('name');
        $variant->description = $request->input('description');
        $variant->value = $request->input('value');
        $variant->product_id = $id;

        $variant->save();

        return redirect()->back()->with('message', 'Successfully added variant');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variant = Variant::find($id);
        if ($variant) {
            $variant->delete();
        }
        return redirect()->back()->with('message', 'variant deleted');
    }
}
