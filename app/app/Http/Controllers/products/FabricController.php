<?php

namespace App\Http\Controllers\products;

use App\Models\Fabric;
use App\Models\ProductType;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\User;
class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabrics = Fabric::all();
        $fabric = Fabric::all();

        return view('products.fabrics.index', compact('fabrics', 'fabric')); ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.fabrics.create');

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
            // 'productType_id' => 'required',
        ]);
        Fabric::create($request->all());
        return redirect()->route('fabrics.index')
        -> with ('success','تم اضافة العنصر بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fabric  $fabric_type
     * @return \Illuminate\Http\Response
     */
    public function show(Fabric $fabric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fabric_type  $fabric_type
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $fabric = Fabric::find($id);
        return view('products.fabrics.edit', compact('fabric'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fabric_type  $fabric_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabric $fabric)
    {
        $request->validate([
            'name' => 'required',

        ]);
        $fabric->update($request->all());
        return redirect()->route('fabrics.index')
            ->with('success', 'تم تعديل العنصر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fabric  $fabric_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabric $fabric)
    {
        $fabric->delete();
        return redirect()->route('fabrics.index')
            ->with('success', 'تم مسح العنصر ');
    }
}
