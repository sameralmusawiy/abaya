<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\SecondSlide;
use Illuminate\Http\Request;

class SecondSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $secondSlide = SecondSlide::all();
        return view('products.ads.secondSlider.index', compact( 'secondSlide'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.ads.secondSlider.create');

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


        $secondSlide = SecondSlide::create([
            'title'            => $request->title,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $secondSlide->save();
        return redirect(route('secondSlider.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecondSlide  $secondSlide
     * @return \Illuminate\Http\Response
     */
    public function show(SecondSlide $secondSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondSlide  $secondSlide
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondSlide $secondSlide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecondSlide  $secondSlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, secondSlide $secondSlide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondSlide  $secondSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondSlide $secondSlide, $id)
    {
        $secondSlide = SecondSlide::find($id);
        $secondSlide->delete();
        return redirect(route('secondSlider.index'))
            ->with('success', 'تم مسح العرض بنجاح');
    }


    public function display($id)
    {
        $secondSlide = SecondSlide::find($id);
        $secondSlide->isShow = 1;
        $secondSlide->save();
        return redirect()->route('secondSlider.index');
    }

    public function hide($id)
    {
        $secondSlide = SecondSlide::find($id);
        $secondSlide->isShow = 0;
        $secondSlide->save();
        return redirect()->route('secondSlider.index');
    }
}
