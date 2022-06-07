<?php

namespace App\Http\Controllers\products;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\CursorPaginator;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Fabric;
use App\Models\Size;
use App\Models\Basket;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->orderBy('created_at')->paginate(15);
        $baskets = Basket::all();


        return view('products.orders.index', compact('orders', 'baskets'));
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

        $orders = Order::create([
            'order_no'            => rand(100,1000000),
            'user_id'            =>Auth::user()->id,
        ]);

        $orders->save();
        $orderId= $orders->id;


        return redirect(route('products_types.index'));

    }



    public function save(Request $request)
    {

        $orders = Order::create([
            'order_no'            => rand(100,1000000),
            'user_id'            =>Auth::user()->id,
        ]);
        $orders->save();
        $orderId= $orders->id;


        // $order = new Order;
        // $orderId =$order->id;

        // $baskets = new Basket;
        // $baskets->order_id = $orderId;
        // $baskets->product_id = $id;
        // $baskets->quantity = $request->input('quantity');

        // $baskets->save();





        return redirect(route('products_types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = Order::all();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    // public function details($id){
    //     $order = Order::find($id);
    //     return view('products.orders.details', compact('order'));

    // }



    public function isRead($id)
    {
        $order = Order::find($id);
        $order->isRead = 1;
        $order->save();
        return view('products.orders.details', compact('order'));
    }

    public function notRead($id)
    {
        $order = Order::find($id);
        $order->isRead = 0;
        $order->save();
        return redirect()->route('orders.index');
    }


    public function cpSearch(Request $request)
    {
        $orders = Order::all();

        $request->validate([
            'q' => 'required'
        ]);
        $q = $request->q;

        $searchedPosts = Order::where('order_no', 'LIKE', '%' . $q . '%')->get();
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
