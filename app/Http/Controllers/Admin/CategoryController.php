<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('id')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


     $val = Validator::make($request->all(),[
        'name_en' => 'required',
        'name_ar' => 'required'
      ]);

        $exists = Category::where('name', 'like', '%'.$request->name_en.'%')->exists();

      if($exists){
        $val->errors()->add('name_en', 'Already Exists');
        return redirect()->back()->withErrors($val)->withInput();
      }



            $name = json_encode(['en' => $request->name_en, 'ar' => $request->name_ar],
        JSON_UNESCAPED_UNICODE);


        Category::create([
            'name' => $name,
            'slug' => Str::slug($request->name_en)
        ]);

        return redirect()->route('admin.categories.index')->with('msg', 'Added.')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

       return view('admin.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name_en' => 'required|unique:categories,name',
            'name_ar' => 'required'
        ]);

        $name = json_encode(['en' => $request->name_en, 'ar' => $request->name_ar]);

        $category->update([
            'name' => $name,
            // 'slug' => Str::slug($request->name_en)
        ]);

        return redirect()->route('admin.categories.index')->with('msg', 'Edited')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('msg', 'Deleted Successfully')->with('type', 'danger');
    }
}
