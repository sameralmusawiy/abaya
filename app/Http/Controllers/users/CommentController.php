<?php

namespace App\Http\Controllers\users;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Http\Controllers\Controller;

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

        return redirect()->back();

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

        return redirect()->back();

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
