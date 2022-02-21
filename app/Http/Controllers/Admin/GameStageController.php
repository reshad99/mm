<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GameStage;
use DB, Validator;

class GameStageController extends Controller
{
    public function index()
    {
        $data['stages'] = GameStage::get();
        return view('back.stage.index', $data);
    }

    public function index_add()
    {
        return view('back.stage.add');
    }

    public function post_add(Request $request)
    {
        $rules = [
            'stage_az' => 'required',
            'stage_en' => 'required',
            'stage_ru' => 'required',
            'time' => 'required|date',
            'hour' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $stage_az = $request->input('stage_az');
        $stage_en = $request->input('stage_en');
        $stage_ru = $request->input('stage_ru');
        $time = $request->input('time');
        $hour = $request->input('hour');

        DB::table('game_stages')->insert(['stage_az' => $stage_az, 'stage_en' => $stage_en, 'stage_ru' => $stage_ru, 'time' => $time, 'hour' => $hour]);

        return redirect('admin/stages')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (GameStage::findOrFail($id)) 
        {
            $data['stage'] = GameStage::find($id);
            return view('back.stage.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('game_stages')->where('id', $id)->exists()) 
        {
            $action = DB::table('game_stages')->where('id', $id)->first();

            $rules = [
                'stage_az' => 'required',
                'stage_en' => 'required',
                'stage_ru' => 'required',
                'time' => 'required|date',
                'hour' => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $stage_az = $request->input('stage_az');
            $stage_en = $request->input('stage_en');
            $stage_ru = $request->input('stage_ru');
            $time = $request->input('time');
            $hour = $request->input('hour');
            
    
            DB::table('game_stages')->where('id', $id)->update(['stage_az' => $stage_az, 'stage_en' => $stage_en, 'stage_ru' => $stage_ru, 'time' => $time, 'hour' => $hour]);
    
            return redirect('admin/stages')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $action = GameStage::findOrFail($id);
        $action->delete();
        return redirect()->back();
    }

    public function active(Request $request)
    {
        $id = $request->id;
        $value = $request->value;

        DB::table('game_stages')->where('id', $id)->update(['active' => $value]);
    }
    
}
