<?php
namespace App\Http\Controllers\products;

namespace App\Http\Controllers;
// use App\Models\Product;
use App\Models\Product;
use App\Models\Delivery;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cartList()
    {
        $products= Product::all();
        $cartItems = \Cart::getContent();
        $cartTotalQuantity = \Cart::getTotalQuantity();
        return view('site.details.cart', compact('cartItems', 'products', 'cartTotalQuantity'));
    }


    public function userInfo(){
        $products= Product::all();
        $neww = $this->cartList();
        $cartItems_second = $neww->cartItems;
        $deliveries = Delivery::all();




        return view('site.details.user_infos', compact('cartItems_second', 'products', 'deliveries'));

    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,


            'attributes' => array(
                'image' => $request->image,
                'size' => $request->size,
                'color' => $request->color,
                'fabric' => $request->fabric,

            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'تم تحديث الطلب بنجاح !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'تم تمسح الطلب بنجاح !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'تم مسح جميع الطلبات بنجاح !');

        return redirect()->route('cart.list');
    }
}
