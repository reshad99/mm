<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = DB::table('categories')->get();
        return view('back.category.index', $data);
    }

    public function index_add()
    {
        return view('back.category.add');
    }

    public function post_add(Request $request)
    {
        $rules = [
            'name_az' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name_az = $request->input('name_az');
        $name_en = $request->input('name_en');
        $name_ru = $request->input('name_ru');

        DB::table('categories')->insert(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru]);

        return redirect('admin/category')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (DB::table('categories')->where('id', $id)->exists()) 
        {
            $data['category'] = DB::table('categories')->where('id', $id)->first();
            return view('back.category.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('categories')->where('id', $id)->exists()) 
        {
            $action = DB::table('categories')->where('id', $id)->first();

            $rules = [
                'name_az' => 'required',
                'name_en' => 'required',
                'name_ru' => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $name_az = $request->input('name_az');
            $name_en = $request->input('name_en');
            $name_ru = $request->input('name_ru');
            
    
            DB::table('categories')->where('id', $id)->update(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru]);
    
            return redirect('admin/category')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $action = Category::findOrFail($id);
        $action->delete();
        return redirect()->back();
    }
}
