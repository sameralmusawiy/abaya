<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers\users;
use App\Http\Controllers;
use App\Models\Basket;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Delivery;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersInfo = UserInfo::latest()->paginate(20);
        $orders = Order::all();
        $baskets = Basket::all();
        $allOrders = [];
        foreach ($orders as $order) {
            $eachOrder= $order->baskets()->get();
            array_push($allOrders, $eachOrder);
        }

        return view('products.orders.index', compact('orders', 'baskets', 'allOrders','usersInfo'));

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
    public function store(Request $request )
    {
        $minSlider = Ads::latest()->orderBy('created_at')->paginate(3);

        $request->validate([
            'name'             => 'required',
            'phonenumber'      => 'required',
            'country'          => 'required',
            'city'             => 'required',
            'district'         => 'required',
            'address'          => 'required',
            'date_of_birth'    => 'required',
            'gender'           => 'required',

        ]);

        $userInfo = new UserInfo();
        $userInfo = UserInfo::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'phonenumber'     => $request->phonenumber,
            'country'         => $request->country,
            'zip'             => $request->zip,
            'comp_name'       => $request->comp_name,
            'city'            => $request->city,
            'district'        => $request->district,
            'home_no'         => $request->home_no,
            'address'         => $request->address,
            'date_of_birth'   => $request->date_of_birth,
            'gender'          => $request->gender,
            'note'            => $request->note,
            'user_id'          =>Auth::user()->id,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);

        $userInfo->save();
        $userInfoId = $userInfo->id;

        // $products = Product::all();


        $orders = new Order;
        $orders->order_no = rand(100,10000000);
        $orders->user_id  = Auth::user()->id;
        $orders->userInfo_id  = $userInfoId;

        $orders->save();
        $orderId= $orders->id;

        $cartItems = \Cart::getContent();

        foreach ($cartItems as $item) {
            $baskets = new Basket;
            $baskets->order_id = $orderId;
            $baskets->product_id = $item->id;
            $baskets->quantity = $item->quantity;
            $baskets->color = $item->attributes->color;
            $baskets->size = $item->attributes->size;
            $baskets->fabric = $item->attributes->fabric;
            $baskets->save();
        }

        $userInfoAddress =  $userInfo->address ;
        $userInfoCity = $userInfo->city;

        return redirect(route('userInfo.confirm' ,compact('userInfoCity','orderId')));
    }


    public function confirm($userInfoCity , $orderId) {
        $products= Product::all();
        $userCity = $userInfoCity;
        $deliveries = Delivery::all();
        $deliveryPrice = 0 ;
        $totalPrice = 0 ;
        foreach ($deliveries as $item) {
            if ($item->city == $userCity) {
                $deliveryPrice = $item->price;
                $totalPrice = ( (\Cart::getTotal()) + $item->price);
            }
        }
        return view('site.details.confirm', compact('userCity', 'products', 'deliveryPrice', 'totalPrice', 'orderId' ));
    }


    public function isConfirm($id)
    {
        $order = Order::find($id);
        $order->isConfirm = 1;
        $order->save();
        return redirect(route('userInfo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(UserInfo $userInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInfo $userInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userInfo , $id)
    {
        $userInfo = UserInfo::find($id);
        $userInfo->delete();
        return view('products_types.home')
            ->with('success', 'Deleted seccessfuly');
    }




    public function cpSearch(Request $request)
    {
        $orders = Order::all();

        $request->validate([
            'q' => 'required'
        ]);
        $q = $request->q;
        $searchedPosts = Order::where('name', 'LIKE', '%' . $q . '%')->get();
                            // ->orWhere('body', 'LIKE', '%' . $q . '%')
                            // ->orWhere('catg_id', 'LIKE', '%' . $q . '%')->get();

        if ($searchedPosts->count()) {
            return view('products.orders.index')->with([
                'orders'         => $searchedPosts,
                'q'            => $q,
            ]);
        } else {
            return view('products.orders.index')->with([
                'status' => 'لا توجد نتائج مطابقة لعملية البحث هذه',
                'orders' =>$orders,
            ]);
        }
    }
}
