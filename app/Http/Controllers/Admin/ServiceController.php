<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Action;
use DB, Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $data['services'] = DB::table('services')->get();
        return view('back.service.index', $data);
    }

    // public function index_add()
    // {
    //     return view('back.action.add');
    // }

    // public function post_add(Request $request)
    // {
    //     $rules = [
    //         'title_az' => 'required',
    //         'title_en' => 'required',
    //         'title_ru' => 'required',
    //         'text_az' => 'required',
    //         'text_en' => 'required',
    //         'text_ru' => 'required',
    //         'photo' => 'required|file|mimes:jpg,png,jpeg,webp',
    //         'slug' => 'required',
    //     ];

    //     $validator = Validator::make($request->all(), $rules);

    //     if($validator->fails())
    //     {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $title_az = $request->input('title_az');
    //     $title_en = $request->input('title_en');
    //     $title_ru = $request->input('title_ru');
    //     $text_az = $request->input('text_az');
    //     $text_en = $request->input('text_en');
    //     $text_ru = $request->input('text_ru');
    //     $slug = $request->input('slug');
    //     $photo = $request->file('photo');

    //     $photo_name = uniqid().".".$photo->getClientOriginalExtension();
    //     $photo->move(public_path('images/action'), $photo_name);

    //     DB::table('actions')->insert(['title_az' => $title_az, 'title_en' => $title_en, 'title_ru' => $title_ru, 'text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru, 'slug' => $slug, 'photo' => $photo_name]);

    //     return redirect('admin/action')->with('success', 'Dəyişiliklər qeydə alındı!');
    // }

    // public function destroy($id)
    // {
    //     $action = Action::findOrFail($id);
    //     \File::delete(public_path('images/action/'.$action->photo));
    //     $action->delete();
    //     return redirect()->back();
    // }

    public function edit($id)
    {
        if (DB::table('services')->where('id', $id)->exists()) 
        {
            $data['service'] = DB::table('services')->where('id', $id)->first();
            return view('back.service.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('services')->where('id', $id)->exists()) 
        {
            $action = DB::table('services')->where('id', $id)->first();

            $rules = [
                'text_az' => 'required',
                'text_en' => 'required',
                'text_ru' => 'required',
                'slug' => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $text_az = $request->input('text_az');
            $text_en = $request->input('text_en');
            $text_ru = $request->input('text_ru');
            $slug = $request->input('slug');
            
    
            DB::table('services')->where('id', $id)->update(['title_az' => $title_az, 'title_en' => $title_en, 'title_ru' => $title_ru, 'text_az' => $text_az, 'text_en' => $text_en, 'text_ru' => $text_ru, 'slug' => $slug, 'photo' => $photo_name]);
    
            return redirect('admin/service')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }
}
