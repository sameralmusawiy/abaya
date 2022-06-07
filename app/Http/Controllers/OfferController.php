<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\ProductType;
use App\Models\Prodect_colors;
use App\Models\Prodect_sizes;
use App\Models\Prodect_fabrics;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Fabric;
use App\Models\Size;
use App\Models\Offer;
use Carbon\Carbon;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $productTypes = ProductType::latest()->orderBy('created_at')->paginate(15);

        $sizes = Size::all();
        $fabrics = Fabric::all();
        $colors = Color::all();
        return view('products.offers.index', compact('productTypes', 'products', 'sizes', 'fabrics', 'products', 'colors')) ;

    }

    public function allOffers(){
        $offers = Offer::all();

        return view('products.offers.allOffers', compact('offers')) ;
    }

    public function home(){
        $products = Product::all();

        $offers = Offer::all();
        return view('products.offers.home', compact('offers', 'products')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.offers.create') ;

    }
    public function addOffers($id)
    {
        $productType= ProductType::find($id);

        return view('products.offers.create', compact('productType')) ;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function save(Request $request, $id)
    {
        $request->validate([
            'discount'    => 'required',
            'end_time'    => 'required',

        ]);

        $productType= ProductType::find($id);


        $offer = Offer::create([
            'product_id'      => $productType->id,
            'discount'        => $request->discount,
            'end_time'        => $request->end_time,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $offer->save();
        return redirect(route('offers.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offers = Offer::all();
        $current = Carbon::now();
        foreach ($offers as  $offer) {
            if ($offer->end_time < $current) {
                $offer->delete();
            }
        }

        // Offer::where('end_time','<',Carbon::now())->delete();

        $offer->delete();
        return redirect(route('offers.allOffers'))
            ->with('success', 'تم مسح العرض بنجاح');
    }


}
