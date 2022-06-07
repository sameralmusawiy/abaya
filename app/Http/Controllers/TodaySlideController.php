<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\TodaySlide;
use Illuminate\Http\Request;

class TodaySlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todaySlide = TodaySlide::all();
        return view('products.ads.todaySlide.index', compact( 'todaySlide'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.ads.todaySlide.create');

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
            'title'        => 'required',
            'photo.*'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $photo = $request->file('photo');
        $newPhoto = time() . '-' . $photo->getClientOriginalName();
        $photo->move('public/uploads/adsImage', $newPhoto);


        $todaySlide = TodaySlide::create([
            'title'            => $request->title,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $todaySlide->save();
        return redirect(route('todaySlide.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodaySlide  $todaySlide
     * @return \Illuminate\Http\Response
     */
    public function show(TodaySlide $todaySlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodaySlide  $todaySlide
     * @return \Illuminate\Http\Response
     */
    public function edit(TodaySlide $todaySlide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodaySlide  $todaySlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodaySlide $todaySlide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodaySlide  $todaySlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodaySlide $todaySlide)
    {
        $todaySlide->delete();
        return redirect(route('todaySlide.index'))
            ->with('success', 'تم مسح العرض بنجاح');
    }

    public function display($id)
    {
        $todaySlide = TodaySlide::find($id);
        $todaySlide->isShow = 1;
        $todaySlide->save();
        return redirect()->route('todaySlide.index');
    }

    public function hide($id)
    {
        $todaySlide = TodaySlide::find($id);
        $todaySlide->isShow = 0;
        $todaySlide->save();
        return redirect()->route('todaySlide.index');
    }
}
