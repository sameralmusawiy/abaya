<?php
namespace App\Http\Controllers\products;
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductType;

class ShopComponent extends Component
{

    public $sortings;
    public function mount(Product $products){
        $this->sorting = "default";
    }
    public function render()
    {
        $products = Product::all();
        $productsID = Product::find(1);
        // $products_types = $productsID->products_types;

        if($this->sorting=='date'){
            $products_types = $productsID->products_types()->orderBy('created_at', 'DESC')->get();

        }
        elseif($this->sorting=='price'){
            $products_types = $productsID->products_types()->orderBy('price', 'ASC')->get();
        }
        elseif($this->sorting=='price-desc'){
            $products_types = $productsID->products_types()->orderBy('price', 'DESC')->get();
        }
        else{
            $products_types = $productsID->products_types()->get();
        }


        return view('livewire.shop-component', compact('products_types','products','productsID'));
    }
}
