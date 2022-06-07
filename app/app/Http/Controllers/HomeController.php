<?php
namespace App\Http\Controllers\products;
namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\FirstSlide;
use App\Models\SecondSlide;
use App\Models\Ads;
use App\Models\Order;
use App\Models\TodaySlide;
use App\Models\Offer;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products            = Product::all();

        $latestProducts      = ProductType::latest()->orderBy('created_at')->paginate(5);
        $firstSlide          = FirstSlide::latest()->orderBy('created_at')->paginate(3);
        $secondSlide         = SecondSlide::latest()->orderBy('created_at')->paginate(3);
        $minSlider              = Ads::latest()->orderBy('created_at')->paginate(3);
        $allProdect          = ProductType::all();
        $today_offers_slides = TodaySlide::latest()->orderBy('created_at')->paginate(3);
        $rodects_types         = ProductType::all();
        
        $abayaProducts =collect() ;
        $hijabProducts =collect() ;
        $bagsProducts =collect() ;

        foreach ($products as $abayaProduct) {
            if ($abayaProduct->name == 'عبايات رأس' ) {
                $abayaProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(10);
            }
        }
        foreach ($products as $abayaProduct) {
            if ($abayaProduct->name == 'حجابات' ) {
                $hijabProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(5);
            }
        }
        foreach ($products as $abayaProduct) {
            if ($abayaProduct->name == 'حقائب' ) {
                $bagsProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(5);
            }
        }

        
        
        
        $orders = Order::all();
        $not_read_order = $orders->where('isRead', '0');
        $offers = Offer::all();

            if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
                return view('home',compact('abayaProducts','hijabProducts','bagsProducts','products','latestProducts', 'allProdect','firstSlide', 'secondSlide', 'minSlider', 'today_offers_slides', 'rodects_types','not_read_order', 'offers'));
            }
            else{
                return view('abayaProducts','hijabProducts','bagsProducts','welcome',compact('products','latestProducts', 'allProdect','firstSlide', 'secondSlide', 'minSlider', 'today_offers_slides', 'rodects_types','not_read_order', 'offers'));

            }
    }

    public function welcome()
    {
        $products            = Product::all();
        $latestProducts      = ProductType::latest()->orderBy('created_at')->paginate(5);
        $firstSlide          = FirstSlide::latest()->orderBy('created_at')->paginate(3);
        $secondSlide         = SecondSlide::latest()->orderBy('created_at')->paginate(3);
        $minSlider              = Ads::latest()->orderBy('created_at')->paginate(3);
        $allProdect          = ProductType::all();
        $today_offers_slides = TodaySlide::latest()->orderBy('created_at')->paginate(3);
        $rodects_types         = ProductType::all();
        $orders = Order::all();
        $not_read_order = $orders->where('isRead', '0');
        $offers = Offer::all();
        
        $abayaProducts =collect() ;
        $hijabProducts =collect() ;
        $bagsProducts =collect() ;

        foreach ($products as $abayaProduct) {
            if ($abayaProduct->name == 'عبايات رأس' ) {
                $abayaProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(10);
            }
        }
        foreach ($products as $abayaProduct) {
            if ($abayaProduct->name == 'حجابات' ) {
                $hijabProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(5);
            }
        }
        foreach ($products as $abayaProduct) {
            if ($abayaProduct->name == 'حقائب' ) {
                $bagsProducts = $abayaProduct->products_types()->latest()->orderBy('created_at')->paginate(5);
            }
        }

            // if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            //     return view('home',compact('products','latestProducts', 'allProdect','firstSlide', 'secondSlide', 'minSlider', 'today_offers_slides'));

            // }
            // else{
                return view('welcome',compact('abayaProducts','hijabProducts','bagsProducts','products','latestProducts', 'allProdect','firstSlide', 'secondSlide', 'minSlider', 'today_offers_slides', 'rodects_types','not_read_order', 'offers'));

            // }
    }
}
