<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\FirstSlide;
use Illuminate\Http\Request;

class FirstSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $firstSlide = FirstSlide::all();
        return view('products.ads.firstSlider.index', compact('products', 'firstSlide'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.ads.firstSlider.create');

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


        $firstSlide = FirstSlide::create([
            'title'            => $request->title,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $firstSlide->save();
        return redirect(route('firstSlider.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\firstSlide  $firstSlide
     * @return \Illuminate\Http\Response
     */
    public function show(FirstSlide $firstSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FirstSlide  $firstSlide
     * @return \Illuminate\Http\Response
     */
    public function edit(firstSlide $firstSlide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FirstSlide  $firstSlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, firstSlide $firstSlide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\firstSlide  $firstSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirstSlide $firstSlide, $id)
    {
        $firstSlide = FirstSlide::find($id);
        $firstSlide->delete();
        return redirect(route('firstSlider.index'))
            ->with('success', 'تم مسح العرض بنجاح');
    }


    public function home(FirstSlide $firstSlide)
    {
        $firstSlide = FirstSlide::latest()->orderBy('created_at')->paginate(3);
        $products = Product::all();


        return view('welcome', compact('firstSlide', 'products')) ;
    }

    public function display($id)
    {
        $firstSlide = FirstSlide::find($id);
        $firstSlide->isShow = 1;
        $firstSlide->save();
        return redirect()->route('firstSlider.index');
    }

    public function hide($id)
    {
        $firstSlide = FirstSlide::find($id);
        $firstSlide->isShow = 0;
        $firstSlide->save();
        return redirect()->route('firstSlider.index');
    }
}
