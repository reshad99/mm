<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mancard;
use DB, Validator;

class MancardController extends Controller
{
    public function index()
    {
        $data['mancard'] = DB::table('mancards')->first();
        return view('back.mancard.index', $data);
    }

    public function edit()
    {
        if (Mancard::findOrFail(1)) 
        {
            $data['mancard'] = Mancard::find(1);
            return view('back.mancard.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request)
    {
        if (DB::table('mancards')->where('id', 1)->exists()) 
        {
            $action = DB::table('mancards')->where('id', 1)->first();

            $rules = [
                'photo' => 'nullable|file|mimes:jpg,png,jpeg,webp',
                'photo_en' => 'nullable|file|mimes:jpg,png,jpeg,webp',
                'photo_ru' => 'nullable|file|mimes:jpg,png,jpeg,webp',
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
            $photo_en = $request->file('photo_en');
            $photo_ru = $request->file('photo_ru');
            $text_az = $request->input('text_az');
            $text_en = $request->input('text_en');
            $text_ru = $request->input('text_ru');

            if (!is_null($photo)) 
            {
                \File::delete('/images/mancard/'.$action->photo);
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/mancard'), $photo_name);
            }
            else {
                $photo_name = $action->photo;
            }

            if (!is_null($photo_en)) 
            {
                \File::delete('/images/mancard/'.$action->photo_en);
                $photo_en_name = uniqid().".".$photo_en->getClientOriginalExtension();
                $photo_en->move(public_path('images/mancard'), $photo_en_name);
            }
            else {
                $photo_en_name = $action->photo_en;
            }

            if (!is_null($photo_ru)) 
            {
                \File::delete('/images/mancard/'.$action->photo_ru);
                $photo_ru_name = uniqid().".".$photo_ru->getClientOriginalExtension();
                $photo_ru->move(public_path('images/mancard'), $photo_ru_name);
            }
            else {
                $photo_ru_name = $action->photo_ru;
            }

            
    
            DB::table('mancards')->where('id', 1)->update(['text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru, 'photo' => $photo_name, 'photo_ru' => $photo_ru_name, 'photo_en' => $photo_en_name]);
    
            return redirect('admin/mancard')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }
}
