<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameStage;
use App\Models\Team;
use DB, Validator;

class GameController extends Controller
{
    public function index()
    {
        $data['games'] = Game::get();
        return view('back.games.index', $data);
    }

    public function index_add()
    {
        $data['teams'] = Team::get();
        $data['stages'] = GameStage::get();
        return view('back.games.add', $data);
    }

    public function post_add(Request $request)
    {
        $rules = [
            'team_id_1' => 'required|numeric',
            'team_id_2' => 'required|numeric',
            'team1goal' => 'nullable|numeric',
            'team2goal' => 'nullable|numeric',
            'game_stages_id' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $team_id_1 = $request->input('team_id_1');
        $team_id_2 = $request->input('team_id_2');
        $team1goal = $request->input('team1goal');
        $team2goal = $request->input('team2goal');
        $game_stages_id = $request->input('game_stages_id');

        DB::table('games')->insert(['team_id_1' => $team_id_1, 'team_id_2' => $team_id_2, 'team1goal' => $team1goal, 'team2goal' => $team2goal, 'active' => 1, 'game_stages_id' => $game_stages_id]);

        return redirect('admin/games')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (Game::findOrFail($id)) 
        {
            $data['game'] = Game::find($id);
            $data['teams'] = Team::get();
            $data['stages'] = GameStage::get();
            return view('back.games.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('games')->where('id', $id)->exists()) 
        {
            $action = DB::table('games')->where('id', $id)->first();

            $rules = [
                'team_id_1' => 'required|numeric',
                'team_id_2' => 'required|numeric',
                'team1goal' => 'nullable|numeric',
                'team2goal' => 'nullable|numeric',
                'game_stages_id' => 'required|numeric'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $team_id_1 = $request->input('team_id_1');
            $team_id_2 = $request->input('team_id_2');
            $team1goal = $request->input('team1goal');
            $team2goal = $request->input('team2goal');
            $game_stages_id = $request->input('game_stages_id');
            $active = $action->active;
            
    
            DB::table('games')->where('id', $id)->update(['team_id_1' => $team_id_1, 'team_id_2' => $team_id_2, 'team1goal' => $team1goal, 'team2goal' => $team2goal, 'active' => $active, 'game_stages_id' => $game_stages_id]);
    
            return redirect('admin/games')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return "error";
        }
    }

    public function destroy($id)
    {
        $action = Game::findOrFail($id);
        $action->delete();
        return redirect()->back();
    }

    public function active(Request $request)
    {
        $id = $request->id;
        $value = $request->value;

        DB::table('games')->where('id', $id)->update(['active' => $value]);
    }
}
