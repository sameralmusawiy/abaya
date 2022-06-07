<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();
        return view('products.ads.index', compact('ads'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.ads.create');

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
            'photo.*'   => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048| dimensions:width=200,height=50'
        ]);


        $photo = $request->file('photo');
        $newPhoto = time() . '-' . $photo->getClientOriginalName();
        $photo->move('public/uploads/adsImage', $newPhoto);


        $ads = Ads::create([
            'title'            => $request->title,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $ads->save();
        return redirect(route('ads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads, $id)
    {
        $ads = Ads::find($id);
        $ads->delete();
        return redirect(route('ads.index'))
            ->with('success', 'Deleted seccessfuly');
    }

    public function home(Ads $ads)
    {
        $minSlider = Ads::latest()->orderBy('created_at')->paginate(3);
        $products = Product::all();


        return view('welcome', compact('minSlider', 'products')) ;
    }




    public function display($id)
    {
        $ads = Ads::find($id);
        $ads->isShow = 1;
        $ads->save();
        return redirect()->route('ads.index');
    }

    public function hide($id)
    {
        $ads = Ads::find($id);
        $ads->isShow = 0;
        $ads->save();
        return redirect()->route('ads.index');
    }
}
