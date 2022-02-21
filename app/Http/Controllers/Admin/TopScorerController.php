<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopScorer;
use App\Models\Team;
use DB, Validator;

class TopScorerController extends Controller
{
    public function index()
    {
        $data['topscorers'] = TopScorer::get();
        return view('back.topscorer.index', $data);
    }

    public function index_add()
    {
        $data['teams'] = Team::get();
        return view('back.topscorer.add', $data);
    }

    public function post_add(Request $request)
    {
        $rules = [
            'name_az' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
            'goal' => 'required|numeric',
            'team_id' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name_az = $request->input('name_az');
        $name_en = $request->input('name_en');
        $name_ru = $request->input('name_ru');
        $goal    = $request->input('goal');
        $team_id = $request->input('team_id');


        DB::table('top_scorers')->insert(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru, 'goal' => $goal, 'team_id' => $team_id]);

        return redirect('admin/topscorers')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (TopScorer::findOrFail($id)) 
        {
            $data['topscorer'] = TopScorer::find($id);
            $data['teams'] = Team::get();
            return view('back.topscorer.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('top_scorers')->where('id', $id)->exists()) 
        {
            $action = DB::table('top_scorers')->where('id', $id)->first();

            $rules = [
            'name_az' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
            'goal' => 'required|numeric',
            'team_id' => 'required|numeric',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $name_az = $request->input('name_az');
            $name_en = $request->input('name_en');
            $name_ru = $request->input('name_ru');
            $goal    = $request->input('goal');
            $team_id = $request->input('team_id');
            
    
            DB::table('top_scorers')->where('id', $id)->update(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru, 'goal' => $goal, 'team_id' => $team_id]);
    
            return redirect('admin/topscorers')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $action = TopScorer::findOrFail($id);
        $action->delete();
        return redirect()->back();
    }
}
