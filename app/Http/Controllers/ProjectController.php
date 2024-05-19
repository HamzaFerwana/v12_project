<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {

        if ($request->ajax()) {
            $data = Project::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
               ->addColumn('name', function($row){

                return  $row->trans_name;

               })
               ->addColumn('user', function($row){

                return   $row->user->trans_name;

               })
               ->addColumn('category', function($row){

                return   $row->category->trans_name;

               })


                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // $projects = Project::with('category', 'user')->latest('id')->paginate(10);
        // dd($projects);
        return view('admin.projects.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = Validator::make($request->all(),[
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'time' => 'required',
            'budget' => 'required',
            'category' => 'required'

          ]);
        //   if($val->fails()){
        //     // $val->errors()->add('name_en', 'Already Exists');
        //     return redirect()->back()->withErrors($val)->withInput();
        //   }

          $count = Project::where('name', 'like', '%'.$request->name_en.'%')->count();
            // dd($count);
          $slug = Str::slug($request->name_en);
          if($count >= 1){
            $slug = $slug . '-' . ($count+1);
          }
        //     $exists = Project::where('name', 'like', '%'.$request->name_en.'%')->exists();

        //   if($exists){
        //     $val->errors()->add('name_en', 'Already Exists');
        //     return redirect()->back()->withErrors($val)->withInput();
        //   }



                $name = json_encode(['en' => $request->name_en, 'ar' => $request->name_ar],
            JSON_UNESCAPED_UNICODE);

            $description = json_encode(['en' => $request->description_en, 'ar' => $request->description_ar], JSON_UNESCAPED_UNICODE);


            Project::create([
                'name' => $name,
                'slug' => $slug,
                'description' => $description,
                'budget' => $request->budget,
                'time' => $request->time,
                'category_id' => $request->category,
                'user_id' => Auth::user()->id,
                'status' => 1
            ]);

            return redirect()->route('admin.projects.index')->with('msg', 'Added.')->with('type', 'success');
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
    public function edit(string $id)
    {
        return view('admin.projects.edit', compact('Project'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name_en' => 'required|unique:projects,name',
            'name_ar' => 'required'
        ]);

        $name = json_encode(['en' => $request->name_en, 'ar' => $request->name_ar]);

        $project->update([
            'name' => $name,
            // 'slug' => Str::slug($request->name_en)
        ]);

        return redirect()->route('admin.projects.index')->with('msg', 'Edited')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('msg', 'Deleted Successfully')->with('type', 'danger');
    }
}
