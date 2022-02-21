<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function index()
    {
        $data['services'] = DB::table('services')->get();
        return view('front.service', $data);
    }
}
