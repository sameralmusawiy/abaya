<?php

namespace App\Http\Controllers\products;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProductType;
use App\Models\Color;
use App\Models\Fabric;
use App\Models\Prodect_colors;
use App\Models\Prodect_fabrics;
use App\Models\Prodect_sizes;
use App\Models\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        $fabrics = Fabric::all();
        $colors = Color::all();
        $products = Product::all();
        $product = Product::all();

        return view('products.index', compact('products', 'sizes', 'fabrics', 'products', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');

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
            'name' => 'required',
            'photo.*'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $photo = $request->file('photo');
        $newPhoto = time() . '-' . $photo->getClientOriginalName();
        $photo->move('public/uploads/images', $newPhoto);


        $product = Product::create([
            'name'            => $request->name,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $product->save();
        return redirect()->route('products.index')
        -> with ('success','تم اضافة العنصر بنجاح');
    }


    public function edit( $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));

    }


    public function show(Product $product)
    {


        // return view('site.details.eachProduct');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $request->validate([
            'name' => 'required',

        ]);

        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time() . '_' . $photo->getClientOriginalName();
            $photo->move('public/uploads/images', $newPhoto);
            $product->photo = 'public/uploads/images/' . $newPhoto;
        }

        $product->name = $request->name;
        $product->photo = $newPhoto;

        $product->save();
        return redirect()->route('products.index')
        -> with ('success','تم اضافة العنصر بنجاح');






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'تم مسح العنصر ');
    }
}
