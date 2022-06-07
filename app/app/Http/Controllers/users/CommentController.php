<?php

namespace App\Http\Controllers\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ProductType;
use App\Models\Prodect_colors;
use App\Models\Prodect_sizes;
use App\Models\Prodect_fabrics;
use App\Models\Color;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Fabric;
use App\Models\Size;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $idI = ProductType::find($id);
        $request->validate([
            'comment'             => 'required',
        ]);
        // $product_type = new ProductType();
        // $product_type->id = 'id';
        $comments = Comment::create([
            'comment'            => $request->comment,
            'user_id'            =>Auth::user()->id,
            'productType_id'     =>$request->products_types->id,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);

        $comments->save();

        return redirect(route('products_types.index'));

    }

    public function save(Request $request, $id)
    {
        $request->validate([
            'comment'             => 'required',
        ]);
        // $product_type = new ProductType();
        // $product_type->id = 'id';
        $comments = Comment::create([
            'comment'            => $request->comment,
            'user_id'            =>Auth::user()->id,
            'productType_id'     =>$id,

            'created_at'      => time(),
            'updated_at'      => time(),
        ]);

        $comments->save();

        return redirect(route('products_types.home'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
