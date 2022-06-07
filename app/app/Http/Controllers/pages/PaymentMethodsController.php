<?php
namespace App\Http\Controllers\products;
namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\payment_Methods;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_Methods= payment_Methods::all();
        return view('pages.payment_Methods.index', compact('payment_Methods')); ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.payment_Methods.create'); ;

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



        $payment_Methods = payment_Methods::create([
            'title'            => $request->title,
            'description'           => $request->description,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $payment_Methods->save();
        return redirect(route('payment_Methods.home'));

    }




    public function home(){
        $payment_Methods= payment_Methods::latest()->paginate(3);
        $products = Product::all();

        return view('pages.payment_Methods.home', compact('payment_Methods', 'products')) ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Help_Center  $help_Center
     * @return \Illuminate\Http\Response
     */
    public function show(payment_Methods $payment_Methods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Help_Center  $help_Center
     * @return \Illuminate\Http\Response
     */
    public function edit(payment_Methods $payment_Methods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Help_Center  $help_Center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment_Methods = payment_Methods::find($id);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time() . '_' . $photo->getClientOriginalName();
            $photo->move('public/uploads/images', $newPhoto);
            $payment_Methods->photo = 'public/uploads/images/' . $newPhoto;
        }
        $payment_Methods->title = $request->title;
        $payment_Methods->description = $request->description;

        $payment_Methods->save();
        return view('pages.payment_Methods.index')
            ->with('success', 'updated seccessfuly');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Help_Center  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment_Methods $payment_Methods, $id)
    {
        $payment_Methods = payment_Methods::find($id);
        $payment_Methods->delete();
        return view('pages.payment_Methods.home')
            ->with('success', 'Deleted seccessfuly');
    }
}
