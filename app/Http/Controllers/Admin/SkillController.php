<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::latest('id')->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
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

            $exists = Skill::where('name', 'like', '%'.$request->name_en.'%')->exists();

          if($exists){
            $val->errors()->add('name_en', 'Already Exists');
            return redirect()->back()->withErrors($val)->withInput();
          }



                $name = json_encode(['en' => $request->name_en, 'ar' => $request->name_ar],
            JSON_UNESCAPED_UNICODE);


            Skill::create([
                'name' => $name,
                'slug' => Str::slug($request->name_en)
            ]);

            return redirect()->route('admin.skills.index')->with('msg', 'Added.')->with('type', 'success');
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
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required'
        ]);

        $name = json_encode(['en' => $request->name_en, 'ar' => $request->name_ar]);

        $skill->update([
            'name' => $name,
            // 'slug' => Str::slug($request->name_en)
        ]);

        return redirect()->route('admin.skills.index')->with('msg', 'Edited')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.destroy')->with('msg', 'Deleted Successfully')->with('type', 'danger');
    }
}
