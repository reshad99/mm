<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reklam;
use DB, Validator;

class ReklamController extends Controller
{
    public function index()
    {
        $data['reklams'] = DB::table('reklams')->get();
        return view('back.reklam.index', $data);
    }

    public function index_add()
    {
        return view('back.reklam.add');
    }

    public function post_add(Request $request)
    {
        $rules = [
            'photo' => 'required|file|mimes:jpg,png,jpeg,webp',
            'link' => 'nullable|url'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo = $request->file('photo');
        $link = $request->input('link');

        $photo_name = uniqid().".".$photo->getClientOriginalExtension();
        $photo->move(public_path('images/rec'), $photo_name);



        DB::table('reklams')->insert(['photo' => $photo_name, 'link' => $link]);

        return redirect('admin/reklam')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (Reklam::findOrFail($id)) 
        {
            $data['reklam'] = Reklam::find($id);
            return view('back.reklam.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('reklams')->where('id', $id)->exists()) 
        {
            $action = DB::table('reklams')->where('id', $id)->first();

            $rules = [
                'photo' => 'required|file|mimes:jpg,png,jpeg,webp',
                'link' => 'nullable'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $photo = $request->file('photo');
            $link = $request->input('link');

            if (!is_null($photo)) 
            {
                \File::delete('/images/rec/'.$action->photo);
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/rec'), $photo_name);
            }
            
    
            DB::table('reklams')->where('id', $id)->update(['photo' => $photo_name, 'link' => $link]);
    
            return redirect('admin/reklam')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $action = Reklam::findOrFail($id);
        \File::delete('/images/rec/'.$action->photo);
        $action->delete();
        return redirect()->back();
    }
}
