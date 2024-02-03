<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function  __construct(){
        $this->middleware("auth");
    }
    public function index()
    {
        $cats = Category::all();
        return view('category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $input = $request->all();

        Category::create($input);
        return redirect()->route('cat.index')
        ->with('success','Category added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the input if necessary
        $request->validate([
            'name' => 'required|string|max:255', // Add any validation rules you need
        ]);
    
        $input = $request->all();
    
        // Find the model instance based on the ID
        $category = Category::find($id);
    
        // Check if the model instance exists
        if ($category) {
            // Update the model attributes and save
            $category->update($input);
        } else {
            // Handle the case when the category with the given id is not found
            return redirect()->route('cat.index')
                ->with('error', 'Category not found');
        }
    
        return redirect()->route('cat.index')
            ->with('success', 'Category updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        
        
        return redirect()->route('cat.index')
        ->with('success','category deleted successfully');
   
    }
}
