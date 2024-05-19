<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{




    // public function index($lang)
    public function index() {
        // App::setLocale($lang);
        return view('admin.index');
    }

    public function freelancers() {
        $users = User::whereType('employee')->get();
        return view('admin.freelancers', compact('users'));
    }

   public function freelancers_destroy ($id)  {
    User::destroy($id);
    return redirect()->route('admin.freelancers')->with('msg', 'Deleted')->with('type', 'danger');
   }



}
