<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Team;
use DB, Validator;

class TeamController extends Controller
{
    public function index()
    {
        $data['groups'] = Group::get();
        $data['groupcount'] = Group::count();
        return view('back.teams.index', $data);
    }

    public function index_add()
    {
        $data['groups'] = Group::get();
        return view('back.teams.add', $data);
    }

    public function post_add(Request $request)
    {
        $rules = [
            'name_az' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
            'group_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name_az  = $request->input('name_az');
        $name_en  = $request->input('name_en');
        $name_ru  = $request->input('name_ru');
        $group_id = $request->input('group_id');
        $game     = $request->input('game');
        $win      = $request->input('win');
        $draw     = $request->input('draw');
        $lose     = $request->input('lose');
        $ag       = $request->input('ag');
        $yg       = $request->input('yg');
        $av       = $request->input('av');
        $point    = $request->input('point');
        $order    = $request->input('order');


        DB::table('teams')->insert(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru, 'group_id' => $group_id, 'game' => $game, 'win' => $win, 'draw' => $draw, 'lose' => $lose, 'ag' => $ag, 'yg' => $yg,  'av' => $av, 'point' => $point, 'order' => $order]);

        return redirect('admin/teams')->with('success', 'Dəyişikliklər qeydə alındı!');
    }

    public function edit($id)
    {
        if (Team::findOrFail($id)) 
        {
            $data['team'] = Team::find($id);
            $data['groups'] = Group::get();
            return view('back.teams.edit', $data);
        }
        else {
            return redirect()->back();
        }
    }

    public function post_edit(Request $request, $id)
    {
        if (DB::table('teams')->where('id', $id)->exists()) 
        {
            $action = DB::table('teams')->where('id', $id)->first();

            $rules = [
                'name_az' => 'required',
                'name_en' => 'required',
                'name_ru' => 'required',
                'group_id' => 'required'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $name_az  = $request->input('name_az');
            $name_en  = $request->input('name_en');
            $name_ru  = $request->input('name_ru');
            $group_id = $request->input('group_id');
            $game     = $request->input('game');
            $win      = $request->input('win');
            $draw     = $request->input('draw');
            $lose     = $request->input('lose');
            $ag       = $request->input('ag');
            $yg       = $request->input('yg');
            $av       = $request->input('av');
            $point    = $request->input('point');
            $order    = $request->input('order');
            
    
            DB::table('teams')->where('id', $id)->update(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru, 'group_id' => $group_id, 'game' => $game, 'win' => $win, 'draw' => $draw, 'lose' => $lose, 'ag' => $ag, 'yg' => $yg,  'av' => $av, 'point' => $point, 'order' => $order]);
    
            return redirect('admin/teams')->with('success', 'Dəyişikliklər qeydə alındı!');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $action = Team::findOrFail($id);
        $action->delete();
        return redirect()->back();
    }
    
}
