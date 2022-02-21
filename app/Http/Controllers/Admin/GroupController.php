<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use DB, Validator;

class GroupController extends Controller
{
    public function index()
    {
        $data['groups'] = DB::table('groups')->get();
        return view('back.group.index', $data);
    }

    public function index_add()
    {
        return view('back.group.add');
    }

    public function post_add(Request $request)
    {
        $rules = [
            'name_az' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $count = DB::table('groups')->count() + 1;
        $name_az = $request->input('name_az');
        $name_en = $request->input('name_en');
        $name_ru = $request->input('name_ru');
        $table = 'table'.$count;


        DB::table('groups')->insert(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru, 'datatable' => $table]);

        return redirect('admin/groups')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (Group::findOrFail($id)) 
        {
            $data['group'] = Group::find($id);
            return view('back.group.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('groups')->where('id', $id)->exists()) 
        {
            $action = DB::table('groups')->where('id', $id)->first();

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
            
    
            DB::table('groups')->where('id', $id)->update(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru]);
    
            return redirect('admin/groups')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $action = Group::findOrFail($id);
        $action->delete();
        return redirect()->back();
    }
}
