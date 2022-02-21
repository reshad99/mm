<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    public function index()
    {
        $data['about'] = DB::table('abouts')->first();
        return view('front.about', $data);
    }
}
