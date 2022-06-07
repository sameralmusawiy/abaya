<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers\pages;
use Illuminate\Http\Request;
use App\Models\Product;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs= AboutUs::all();
        return view('pages.about_us.index', compact('aboutUs')); ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about_us.create'); ;

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
            'description'       => 'required',

            'photo.*'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $photo = $request->file('photo');
        $newPhoto = time() . '-' . $photo->getClientOriginalName();
        $photo->move('public/uploads/images', $newPhoto);



        $aboutUs = AboutUs::create([
            'title'            => $request->title,
            'description'           => $request->description,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $aboutUs->save();
        return redirect(route('about_us.home'));
    }



    public function home(){
        $aboutUs= AboutUs::latest()->paginate(1);
        $products = Product::all();

        return view('pages.about_us.home', compact('aboutUs', 'products')) ;

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,  $id)
    {

        $aboutUs = AboutUs::find($id);



        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time() . '_' . $photo->getClientOriginalName();
            $photo->move('public/uploads/images', $newPhoto);
            $aboutUs->photo = 'public/uploads/images/' . $newPhoto;
        }

        $aboutUs->title = $request->title;
        $aboutUs->description = $request->description;

        $aboutUs->save();
        return view('pages.about_us.index')
            ->with('success', 'updated seccessfuly');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs, $id)
    {
        $aboutUs = AboutUs::find($id);
        $aboutUs->delete();
        return view('pages.about_us.home')
            ->with('success', 'Deleted seccessfuly');
    }
}
