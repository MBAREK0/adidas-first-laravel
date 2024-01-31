<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::select('select P.*, C.name as category_name from products  P INNER JOIN categories C on P.cat_id = C.id');
        $categoris = Category::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoris = Category::all();
        return view('products.create',compact('categoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       // dd($request->all());

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'tags'=>'required',
            'cat_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
           $destinationPath = 'images/';
           $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
        }

        Product::create($input);
        return redirect()->route('products.index')
        ->with('success','Products added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $catID = $product->cat_id;
        $categoris = Category::all();
        $category = DB::table('categories')->where('id',$catID)->first();
       
        return view('products.edit',compact('product','category','categoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $input = $request->all();
        if ($image = $request->file('image')) {
           $destinationPath = 'images/';
           $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
        }else{
            unset( $input['image']);
        }

        $product->update($input);
      
        return redirect()->route('products.index')
        ->with('success','Products updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->route('products.index')
        ->with('success','Products deleted successfully');
    }
}
