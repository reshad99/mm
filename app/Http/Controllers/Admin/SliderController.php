<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use DB, Validator;

class SliderController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::get();
        return view('back.slider.index', $data);
    }

    public function index_add()
    {
        return view('back.slider.add');
    }

    public function edit($id)
    {
        if(Slider::findOrFail($id))
        {
            $data['slider'] = Slider::find($id);
            return view('back.slider.edit', $data);
        }
    }

    public function post_edit(Request $request, $id)
    {
        $rules = [
            'photo' => 'nullable|file|mimes:jpg,png,jpeg,webp',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Slider::findOrFail($id)) 
        {
            $slider = Slider::find($id);

            $photo = $request->file('photo');

            if (!is_null($photo)) 
            {
                \File::delete(public_path('images/sliders/'.$slider->photo));
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/sliders'), $photo_name);    
            }
            else
            {
                $photo_name = $slider->photo;
            }

            $slider->photo    = $photo_name;
            $slider->update();

            return redirect('admin/slider')->with('success', 'Dəyişikliklər qeydə alındı!');
        }

        
    }

    public function post_add(Request $request)
    {
        $rules = [
            'photo' => 'required|file|mimes:jpg,png,jpeg,webp',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo = $request->file('photo');

        $photo_name = uniqid().".".$photo->getClientOriginalExtension();
        $photo->move(public_path('images/sliders'), $photo_name);

        DB::table('sliders')->insert(['photo' => $photo_name]);

        return redirect('admin/slider')->with('success', 'Dəyişiliklər qeydə alındı!');
    }

    public function destroy($id)
    {
        $action = Slider::findOrFail($id);
        \File::delete(public_path('images/sliders/'.$action->photo));
        $action->delete();
        return redirect()->back();
    }

}
