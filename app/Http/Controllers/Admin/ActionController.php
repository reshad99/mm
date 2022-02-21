<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Action;
use DB, Validator;

class ActionController extends Controller
{
    public function index()
    {
        $data['actions'] = DB::table('actions')->get();
        return view('back.action.index', $data);
    }

    public function index_add()
    {
        return view('back.action.add');
    }

    public function post_add(Request $request)
    {
        $rules = [
            'title_az' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'text_az' => 'required',
            'text_en' => 'required',
            'text_ru' => 'required',
            'photo' => 'required|file|mimes:jpg,png,jpeg,webp',
            'cover' => 'required|file|mimes:jpg,png,jpeg,webp'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $title_az = $request->input('title_az');
        $title_en = $request->input('title_en');
        $title_ru = $request->input('title_ru');
        $text_az = $request->input('text_az');
        $text_en = $request->input('text_en');
        $text_ru = $request->input('text_ru');
        $photo = $request->file('photo');
        $cover = $request->file('cover');

        $photo_name = uniqid().".".$photo->getClientOriginalExtension();
        $photo->move(public_path('images/action'), $photo_name);

        $cover_name = uniqid().".".$cover->getClientOriginalExtension();
        $cover->move(public_path('images/action'), $cover_name);

        DB::table('actions')->insert(['title_az' => $title_az, 'title_en' => $title_en, 'title_ru' => $title_ru, 'text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru, 'photo' => $photo_name, 'cover' => $cover_name]);

        return redirect('admin/action')->with('success', 'Dəyişiliklər qeydə alındı!');
    }

    public function destroy($id)
    {
        $action = Action::findOrFail($id);
        \File::delete(public_path('images/action/'.$action->photo));
        \File::delete(public_path('images/action/'.$action->cover));
        $action->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        if (DB::table('actions')->where('id', $id)->exists()) 
        {
            $data['action'] = DB::table('actions')->where('id', $id)->first();
            return view('back.action.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('actions')->where('id', $id)->exists()) 
        {
            $action = DB::table('actions')->where('id', $id)->first();

            $rules = [
                'title_az' => 'required',
                'title_en' => 'required',
                'title_ru' => 'required',
                'text_az' => 'required',
                'text_en' => 'required',
                'text_ru' => 'required',
                'photo' => 'file|mimes:jpg,png,jpeg,webp',
                'cover' => 'file|mimes:jpg,png,jpeg,webp',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $title_az = $request->input('title_az');
            $title_en = $request->input('title_en');
            $title_ru = $request->input('title_ru');
            $text_az = $request->input('text_az');
            $text_en = $request->input('text_en');
            $text_ru = $request->input('text_ru');
            $photo = $request->file('photo');
            $cover = $request->file('cover');

            if (!is_null($photo)) 
            {
                \File::delete(public_path('images/action/'.$action->photo));
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/action'), $photo_name);
            }
            else {
                $photo_name = $action->photo;
            }

            if (!is_null($cover)) 
            {
                \File::delete(public_path('images/action/'.$action->cover));
                $cover_name = uniqid().".".$cover->getClientOriginalExtension();
                $cover->move(public_path('images/action'), $cover_name);
            }
            else {
                $cover_name = $action->cover;
            }
            
    
            DB::table('actions')->where('id', $id)->update(['title_az' => $title_az, 'title_en' => $title_en, 'title_ru' => $title_ru, 'text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru, 'photo' => $photo_name, 'cover' => $cover_name]);
    
            return redirect('admin/action')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }
}
