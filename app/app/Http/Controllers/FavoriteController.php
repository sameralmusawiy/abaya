<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        $favorites = Favorite::all();
        // $favorites = Auth::user();
        return view('pages.favorite', compact( 'products', 'favorites')) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function save( $id)
    {
        $product_type = ProductType::find($id);
        $all_favorite = Favorite::all();
        $favorite =Favorite::where('productType_id',  $product_type->id)->first();
            if ($favorite) {
                if (Auth::user()->id == $favorite->user_id  && $product_type->id == $favorite->productType_id) {
                    return redirect(route('favorites.index'));
                }
                else{
                    $favorites = Favorite::create([
                        'user_id'          =>Auth::user()->id,
                        'productType_id'   =>  $product_type->id,
                    ]);
                    $favorites->save();
                    return redirect(route('favorites.index'));
                }
            }
            else  {
                $favorites = Favorite::create([
                    'user_id'          =>Auth::user()->id,
                    'productType_id'   =>  $product_type->id,
                ]);
                $favorites->save();
                return redirect(route('favorites.index'));
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
