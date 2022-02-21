<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use DB, Validator;

class BrandController extends Controller
{
    public function index()
    {
        $data['brands'] = Brand::get();
        return view('back.brands.index', $data);
    }

    public function index_add()
    {
        $data['categories'] = DB::table('categories')->get();
        return view('back.brands.add', $data);
    }

    public function post_add(Request $request)
    {
        $rules = [
            'name' => 'required',
            'category' => 'required',
            'percent' => 'required',
            'logo' => 'required|file|mimes:jpg,png,jpeg,webp',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $category = $request->input('category');
        $percent = $request->input('percent');
        $logo = $request->file('logo');

        $logo_name = uniqid().".".$logo->getClientOriginalExtension();
        $logo->move(public_path('images/brands/'), $logo_name);

        DB::table('brands')->insert(['name' => $name, 'logo' => $logo_name, 'percent' => $percent, 'category_id' => $category]);

        return redirect('admin/brands')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (Brand::findOrFail($id)) 
        {
            $data['brand'] = Brand::find($id);
            $data['categories'] = Category::get();
            return view('back.brands.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('brands')->where('id', $id)->exists()) 
        {
            $action = DB::table('brands')->where('id', $id)->first();

            $rules = [
                'logo' => 'file|mimes:jpg,png,jpeg,webp',
                'name' => 'required',
                'percent' => 'required|numeric',
                'category' => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $logo = $request->file('logo');
            $name = $request->name;
            $percent = $request->percent;
            $category = $request->category;

            if (!is_null($logo)) 
            {
                \File::delete(public_path('images/brands/'.$action->logo));
                $logo_name = uniqid().".".$logo->getClientOriginalExtension();
                $logo->move(public_path('images/brands'), $logo_name);
            }
            else {
                $logo_name = $action->logo;
            }
            
    
            DB::table('brands')->where('id', $id)->update(['name' => $name, 'percent' => $percent, 'category_id' => $category, 'logo' => $logo_name]);
    
            return redirect('admin/brands')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $action = Brand::findOrFail($id);
        \File::delete(public_path('images/brands/'.$action->logo));
        $action->delete();
        return redirect()->back();
    }

}
