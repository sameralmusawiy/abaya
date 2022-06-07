<?php

namespace App\Http\Controllers\products;
use Illuminate\Support\Facades\File;
use App\Models\ProductType;
use App\Models\Images;
use App\Models\Prodect_sizes;
use App\Models\Prodect_fabrics;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Fabric;
use App\Models\Size;
use App\Models\Comment;

class ProductTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $productType = ProductType::latest()->orderBy('created_at')->paginate(15);

        $sizes = Size::all();
        $fabrics = Fabric::all();
        $colors = Color::all();

        return view('products.products_types.index', compact('productType', 'products', 'sizes', 'fabrics', 'products', 'colors')) ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.products_types.create');

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
            'name'        => 'required',
            'price'       => 'required',
            'product_id'  => 'required',

            'photo.*'   => 'image|mimes:png,gif,svg,jpg|max:2048'
            // |dimensions:min_width=500,max_width=1500
        ]);

        $data = [];
        $data2 = [];

        $allSizes = [];
        $allColor = [] ;
        $allFabric = [];
        if($request->hasfile('photo'))
        {
           foreach($request->file('photo') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/uploads/images/', $name);
               $data[] = $name;
           }
        }

        // foreach ($request->size as $size) {
        //     $allSizes[] = $size;
        // }

        $allSizes = implode('-',$request->size);
        // $allColor = implode('-',$request->color);
        $allFabric = implode('-',$request->fabric);


        // foreach ($request->color as $color) {
        //     $allColor[] = $color;
        // }
        // foreach ($request->fabric as $fabric) {
        //     $allFabric[] = $fabric;
        // }
        // $allColor[] = implode(',', ['color']);
        // $allFabric[] = implode(',', ['fabric']);

        $productType= new ProductType();
        $productType->photo=json_encode($data);
        // $productType->size=json_encode($allSizes);
        // $productType->color=json_encode($allColor);
        // $productType->fabric=json_encode($allFabric);

        $productType = ProductType::create([
            'name'            => $request->name,
            'price'           => $request->price,
            'product_id'      => $request->product_id,
            'photo'           =>  $data,
            'size'            => $allSizes,
            'color'           => $request->color,
            'fabric'          => $allFabric,
            'description'     => $request->description,

            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $productType->save();
        $productTypeId = $productType->id;
        $productTypeColor = $productType->color;






        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $image2)
           {
               $name=$image2->getClientOriginalName();
               $image2->move(public_path().'/uploads/images/', $name);
               $data2[] = $name;
           }
        }

        $colors = Color::all();
        $images= new Images();
        $images->product_id = $productTypeId ;
        $PcolorId = 0;
        foreach ($colors as $color) {
            if ($color->value == $productTypeColor) {
                $PcolorId = $color->id;
            }
        }
        $images->color_id = $PcolorId ;
        $images->photo = $data2;
        $images->save();
        return redirect(route('products_types.index', [$productTypeId]))->with('تم', 'تمت اضافة المنتج بنجاح');
    }

    public function show(ProductType $products_types, $id)
    {
        $products = Product::all();
        $products_types = ProductType::find($id);
        $comments = $products_types->comment()->latest()->paginate(15);
        $images   = $products_types -> images()->get();
        $colors = Color::all();


        $mainProducts = ProductType::all();

        return view('site.details.eachProduct', compact('products_types','comments','products', 'mainProducts', 'images', 'colors'));
    }

    public function edit($id)
    {
        $products = Product::all();
        $productType = ProductType::find($id);
        $sizes = Size::all();
        $fabrics = Fabric::all();
        $colors = Color::all();
        return view('products.products_types.edit', compact('productType', 'products', 'sizes', 'fabrics', 'products', 'colors')) ;
    }

    public function update(Request $request, $id)
    {
        $data =[];
        $productType = ProductType::find($id);
        if ($request->hasFile('photo')){
            // $image_path = public_path("public/uploads/images/".$productType->photo);
            $image_path = public_path("/uploads/images/".json_encode($productType->photo));

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            foreach($request->file('photo') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/uploads/images/', $name);
                $data[] = $name;
            }
        }
        else {
            $name = $productType->photo;
        }


        $jdata = json_encode($data);
        $allSizes = implode('-',$request->size);
        $allColor = implode('-',$request->color);
        $allFabric = implode('-',$request->fabric);
        $productType->update([
            'name'      => $request->name,
            'price'           => $request->price,
            'product_id'      => $request->product_id,
            'photo'           =>  $data,
            'size'            => $allSizes,
            'color'           => $allColor,
            'fabric'          => $allFabric,
            'description'     => $request->description,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $productType->save();
          return redirect(route('products_types.home'))
          ->with('success', 'updated seccessfuly');

    }

    public function destroy(ProductType $products_type)
    {
        $products_type->delete();
        return redirect()->route('products_types.home')
            ->with('success', 'Deleted seccessfuly');
    }

    public function home(ProductType $products_types)
    {
        $products = Product::all();
        $productTypes = ProductType::latest()->orderBy('created_at')->paginate(12);
        return view('products.products_types.home', compact('productTypes', 'products')) ;
    }

    public function mainPart(Request $request, $id)
    {
        $request->validate([
        ]);
        $products = Product::all();
        $productsID = Product::find($id);
        $colors = Color::all();
        $sizes =Size::all();
        $fabrics = Fabric::all();
        $products_types = $productsID->products_types();
        $color = $request->color;
        $size = $request->size;
        $fabric = $request->fabric;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        if ($min_price && $max_price) {
            $products_types = $products_types->where('price','>=' , $min_price);
            $products_types = $products_types->where('price','<=',$max_price);
        }
        if ( $color) {
            $products_types = $products_types->where('color', 'LIKE', '%' . $color . '%' );
        }
        if ( $size) {
            $products_types = $products_types->where('size', 'LIKE', '%' . $size . '%' );
        }if ( $fabric) {
            $products_types = $products_types->where('fabric', 'LIKE', '%' . $fabric . '%' );
        }
        $products_types=  $products_types->latest()->orderBy('created_at')->paginate(9);
        return view('site.details.mainPart', compact('products_types','products','productsID', 'colors', 'sizes', 'fabrics'));
    }

    public function latestProducts()
    {

        $products = Product::all();
        $products_types = ProductType::latest()->paginate(15);
        return view('products.products_types.latestProducts', compact('products_types','products'));
    }

    public function siteSearch(Request $request)
    {
        $productType = ProductType::all();
        $products = Product::all();

        $request->validate([
            'q' => 'required'
        ]);
        $q = $request->q;

        $searchedProduct = ProductType::where('name', 'LIKE', '%' . $q . '%')->get();
                            // ->orWhere('body', 'LIKE', '%' . $q . '%')
                            // ->orWhere('catg_id', 'LIKE', '%' . $q . '%')->get();

        if ($searchedProduct->count()) {
            return view('site.details.serchResults')->with([
                'productType'         => $searchedProduct,
                'q'            => $q,
                'products'          => $products
            ]);
        } else {
            return view('site.details.serchResults')->with([
                'status' => 'لا توجد نتائج مطابقة لعملية البحث هذه',
                'products'          => $products
            ]);
        }
    }



}
