<?php

namespace App\Http\Controllers\products;

use App\Models\Order;
use App\Models\basket;
use App\Models\Fabric;
use App\Models\ProductType;
use App\Models\Color;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baskets = Basket::all();
            return view('baskets.index', compact('baskets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, basket $basket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(basket $basket)
    {
        //
    }
}
