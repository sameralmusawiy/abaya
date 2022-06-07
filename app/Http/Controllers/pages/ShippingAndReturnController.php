<?php
namespace App\Http\Controllers\products;
namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shipping_and_return;
use Illuminate\Http\Request;

class ShippingAndReturnController extends Controller
{

    public function index()
    {
        $shipping_and_return= Shipping_and_return::all();
        return view('pages.shipping_and_return.index', compact('shipping_and_return')); ;
    }


    public function create()
    {
        return view('pages.shipping_and_return.create'); ;

    }

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



        $shipping_and_return = Shipping_and_return::create([
            'title'            => $request->title,
            'description'           => $request->description,
            'photo'           =>  $newPhoto,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $shipping_and_return->save();
        return redirect(route('shipping_and_return.home'));

    }




    public function home(){
        $shipping_and_return= Shipping_and_return::latest()->paginate(3);
        $products = Product::all();

        return view('pages.shipping_and_return.home', compact('shipping_and_return', 'products')) ;

    }


    public function show(Shipping_and_return $shipping_and_return)
    {
        //
    }


    public function edit(Shipping_and_return $shipping_and_return)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $shipping_and_return = Shipping_and_return::find($id);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time() . '_' . $photo->getClientOriginalName();
            $photo->move('public/uploads/images', $newPhoto);
            $shipping_and_return->photo = 'public/uploads/images/' . $newPhoto;
        }
        $shipping_and_return->title = $request->title;
        $shipping_and_return->description = $request->description;

        $shipping_and_return->save();
        return view('pages.shipping_and_return.index')
            ->with('success', 'updated seccessfuly');
    }



    public function destroy(Shipping_and_return $shipping_and_return, $id)
    {
        $shipping_and_return = Shipping_and_return::find($id);
        $shipping_and_return->delete();
        return view('pages.shipping_and_return.home')
            ->with('success', 'Deleted seccessfuly');
    }
}
