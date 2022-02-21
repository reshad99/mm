<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator;

class AboutController extends Controller
{
    public function index()
    {
        $data['abouts'] = DB::table('abouts')->get();
        return view('back.about.index', $data);
    }

    public function edit()
    {
        if (DB::table('abouts')->where('id', 1)->exists()) 
        {
            $data['about'] = DB::table('abouts')->where('id', 1)->first();
            return view('back.about.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request)
    {
        if (DB::table('abouts')->where('id', 1)->exists()) 
        {
            $about = DB::table('abouts')->where('id', 1)->first();

            $rules = [
                'text_az' => 'required',
                'text_en' => 'required',
                'text_ru' => 'required',
                'photo' => 'file|mimes:jpg,png,jpeg,webp',
                'photo_en' => 'file|mimes:jpg,png,jpeg,webp',
                'photo_ru' => 'file|mimes:jpg,png,jpeg,webp'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $text_az = $request->input('text_az');
            $text_en = $request->input('text_en');
            $text_ru = $request->input('text_ru');
            $photo   = $request->file('photo');
            $photo_en   = $request->file('photo_en');
            $photo_ru   = $request->file('photo_ru');

            if (!is_null($photo)) 
            {
                \File::delete(public_path('images/about/'.$about->photo));
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/about'), $photo_name);
            }
            else {
                $photo_name = $about->photo;
            }

            if (!is_null($photo_en)) 
            {
                \File::delete(public_path('images/about/'.$about->photo_en));
                $photo_name_en = uniqid().".".$photo_en->getClientOriginalExtension();
                $photo_en->move(public_path('images/about'), $photo_name_en);
            }
            else {
                $photo_name_en = $about->photo_en;
            }

            if (!is_null($photo_ru)) 
            {
                \File::delete(public_path('images/about/'.$about->photo_ru));
                $photo_name_ru = uniqid().".".$photo_ru->getClientOriginalExtension();
                $photo_ru->move(public_path('images/about'), $photo_name_ru);
            }
            else {
                $photo_name_ru = $about->photo_ru;
            }
            
    
            DB::table('abouts')->where('id', 1)->update(['text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru, 'photo' => $photo_name, 'photo_ru' => $photo_name_ru, 'photo_en' => $photo_name_en]);
    
            return redirect('admin/about')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }
}
