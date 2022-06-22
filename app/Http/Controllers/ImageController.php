<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\ProductType;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function save(Request $request, $id)
    {
        $request->validate([

            'photo.*'   => 'image|mimes:png,gif,svg,jpg|max:5048'
        ]);

        $data = [];
        if($request->hasfile('photo'))
        {
           foreach($request->file('photo') as $image)
           {
               $name=time(). ' ' .$image->getClientOriginalName();
               $image->move(public_path().'/uploads/images/', $name);
               $data[] = $name;
           }
        }

        $Images = Images::create([

            'product_id'      => $id,
            'photo'           =>  $data,

            'color_id'           => $request->color_id,

            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $Images->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
