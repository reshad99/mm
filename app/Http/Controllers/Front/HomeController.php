<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Group;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::get();
        return view('front.home', $data);
    }
    
    public function lang($lang)
    {
        \Session::put('lang', $lang);
        return redirect()->back();
    }
}
