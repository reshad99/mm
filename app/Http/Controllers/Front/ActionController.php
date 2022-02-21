<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Action;
use DB;

class ActionController extends Controller
{
    public function index()
    {
        $data['actions'] = DB::table('actions')->paginate(4);
        $data['latests'] = Action::orderBy('id', 'desc')->limit(3)->get();
        return view('front.activity', $data);
    }

    public function show($id)
    {
        sleep(1);
        if (DB::table('actions')->where('id', $id)->exists()) 
        {
            $data = DB::table('actions')->where('id', $id)->first();
            return $data;
        }
        
    }
}
