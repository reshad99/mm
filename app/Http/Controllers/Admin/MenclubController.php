<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menclub;
use DB, Validator;

class MenclubController extends Controller
{
    public function index()
    {
        $data['menclub'] = Menclub::first();
        return view('back.menclub.index', $data);
    }

    public function edit()
    {
        if (Menclub::findOrFail(1)) 
        {
            $data['menclub'] = Menclub::find(1);
            return view('back.menclub.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request)
    {
        if (DB::table('menclubs')->where('id', 1)->exists()) 
        {
            $action = DB::table('menclubs')->where('id', 1)->first();

            $rules = [
                'photo' => 'nullable|file|mimes:jpg,png,jpeg,webp',
                'text_az' => 'required',
                'text_en' => 'required',
                'text_ru' => 'required'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $photo = $request->file('photo');
            $text_az = $request->input('text_az');
            $text_en = $request->input('text_en');
            $text_ru = $request->input('text_ru');

            if (!is_null($photo)) 
            {
                \File::delete('/images/menclub/'.$action->photo);
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/menclub'), $photo_name);
            }
            else {
                $photo_name = $action->photo;
            }

            
    
            DB::table('menclubs')->where('id', 1)->update(['text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru, 'photo' => $photo_name]);
    
            return redirect('admin/menclub')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }
}
