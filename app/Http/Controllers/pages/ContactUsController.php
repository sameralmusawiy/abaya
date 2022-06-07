<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers\pages;
use App\Models\Product;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs= ContactUs::all();
        return view('pages.contact_us.index', compact('contactUs'));

    }
    // public function index2($id)
    // {
    //     $contactUs= ContactUs::find($id);
    //     $contactUsId= $contactUs;
    //     return view('pages.contact_us.index', compact('contactUsId'));

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.contact_us.create');

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
            'name'       => 'required',
            'phonenumber'       => 'required',
            'email'       => 'required',
            'city'       => 'required',
            'description'       => 'required',

        ]);

        if ($request->has('photo')) {
            $photo = $request->file('photo');
        $newPhoto = time() . '-' . $photo->getClientOriginalName();
        $photo->move('public/uploads/contact_us', $newPhoto);
        }
        else{
            $newPhoto = '';
        }



        $contactUs = ContactUs::create([
            'title'           => $request->title,
            'name'            => $request->name,
            'phonenumber'     => $request->phonenumber,
            'email'           => $request->email,
            'city'            => $request->city,
            'district'        => $request->district,
            'description'     => $request->description,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $contactUs->save();
        return redirect(route('contact_us.index'));
    }


    public function home(){
        $contactUs= ContactUs::all();
        $products = Product::all();

        return view('pages.contact_us.home', compact('contactUs', 'products')) ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs, $id)
    {
        $contactUs= ContactUs::find($id);
        $contactUsId= $contactUs;
        return view('pages.contact_us.show', compact('contactUsId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs, $id)
    {
        $contactUs = ContactUs::find($id);
        $contactUs->delete();
        return view('products_types.home')
            ->with('success', 'Deleted seccessfuly');
    }
}
