<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{



    
    // public function index($lang)
    public function index() {
        // App::setLocale($lang);
        return view('admin.index');
    }
}
