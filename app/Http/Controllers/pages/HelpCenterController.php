<?php
namespace App\Http\Controllers\products;
namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Help_Center;
use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $help_Center= Help_Center::all();
        return view('pages.help_Center.index', compact('help_Center')); ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.help_Center.create'); ;

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
            'question'        => 'required',
            'answer'       => 'required',
        ]);


        $help_Center = Help_Center::create([
            'question'            => $request->question,
            'answer'           => $request->answer,
            'created_at'      => time(),
            'updated_at'      => time(),
        ]);
        $help_Center->save();
        return redirect(route('help_Center.home'));

    }




    public function home(){
        $help_Center= Help_Center::latest()->paginate(15);
        $products = Product::all();

        return view('pages.help_Center.home', compact('help_Center', 'products')) ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Help_Center  $help_Center
     * @return \Illuminate\Http\Response
     */
    public function show(Help_Center $help_Center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Help_Center  $help_Center
     * @return \Illuminate\Http\Response
     */
    public function edit(Help_Center $help_Center)
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
        $help_Center = Help_Center::find($id);
        $help_Center->question = $request->question;
        $help_Center->answer = $request->answer;

        $help_Center->save();
        return view('pages.help_Center.index')
            ->with('success', 'updated seccessfuly');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Help_Center  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Help_Center $help_Center, $id)
    {
        $help_Center = Help_Center::find($id);
        $help_Center->delete();
        return view('pages.help_Center.home')
            ->with('success', 'Deleted seccessfuly');
    }
}
