<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Mancard;
use DB;

class GlobalController extends Controller
{
    public function index()
    {
        return view('front.global');
    }

    public function search(Request $request)
    {
        sleep(1);
        $value = $request->value;
        $select = $request->select;

        if (!is_null($select)) 
        {
            $brands = Brand::where('name', 'like', ''.$value.'%')->where('category_id', $select)->limit(12)->get();
        }
        else 
        {
            $brands = Brand::where('name', 'like', ''.$value.'%')->limit(12)->get();
        }

        
        $data = '';
        foreach ($brands as $b) {
            $data .= '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 brand">
            <div class="card" >
                <img src="/images/brands/'.$b->logo.'" class="card-img-top" alt="...">
                <div class="row card-body">
                    <div class="cardTitle">
                        <a>'.$b->name.'</a>';
                        
                        if (app()->getLocale() == "az")
                        $data .= '<p>'.$b->category->name_az.'</p>';
                        elseif (app()->getLocale() == 'en')
                        $data .= '<p>'.$b->category->name_en.'</p>';
                        elseif (app()->getLocale() == 'ru')
                        $data .= '<p>'.$b->category->name_ru.'</p>';

                        $data.= '
                        
                    </div>
                    <div class="price">
                        <p>'.$b->percent.'%</p>
                    </div>

                </div>
            </div>
        </div>';
        }
        return $data;
    }

    public function category(Request $request)
    {
        sleep(1);
        $value = $request->value;
        $search = $request->search;

        if (!is_null($search)) 
        {
            $brands = Brand::where('category_id', $value)->where('name', 'like', ''.$search.'%')->limit(12)->get();
        }
        else 
        {
            $brands = Brand::where('category_id', $value)->limit(12)->get();
        }

        
        $data = '';
        foreach ($brands as $b) {
            $data .= '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div class="card" >
                <img src="/images/brands/'.$b->logo.'" class="card-img-top" alt="...">
                <div class="row card-body">
                    <div class="cardTitle">
                        <a>'.$b->name.'</a>';
                        
                        if (app()->getLocale() == "az")
                        $data .= '<p>'.$b->category->name_az.'</p>';
                        elseif (app()->getLocale() == 'en')
                        $data .= '<p>'.$b->category->name_en.'</p>';
                        elseif (app()->getLocale() == 'ru')
                        $data .= '<p>'.$b->category->name_ru.'</p>';

                        $data.= '
                        
                    </div>
                    <div class="price">
                        <p>'.$b->percent.'%</p>
                    </div>

                </div>
            </div>
        </div>';
        }
        return $data;
    }

    public function scroll(Request $request)
    {
        try {
            sleep(1);
        $start = $request->start;
        $limit = $request->limit;
        $search = $request->search;
        $select = $request->select;

        if (!is_null($search) && is_null($select)) 
        {
            $brands = Brand::where('name', 'like', ''.$search.'%')->skip($start)->take($limit)->get();
           
        }
        elseif (is_null($search) && !is_null($select)) 
        {
            $brands = Brand::where('category_id', $select)->skip($start)->take($limit)->get();
        }
        elseif (!is_null($search) && !is_null($select)) 
        {
            $brands = Brand::where('category_id', $select)->where('name', 'like', ''.$search.'%')->skip($start)->take($limit)->get();
        }
        else 
        {
            $brands = Brand::skip($start)->take($limit)->get();
        }


        $data = '';
        foreach ($brands as $b) {
            $data .= '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div class="card" >
                <img src="/images/brands/'.$b->logo.'" class="card-img-top" alt="...">
                <div class="row card-body">
                    <div class="cardTitle">
                        <a>'.$b->name.'</a>';
                        
                        if (app()->getLocale() == "az")
                        $data .= '<p>'.$b->category->name_az.'</p>';
                        elseif (app()->getLocale() == 'en')
                        $data .= '<p>'.$b->category->name_en.'</p>';
                        elseif (app()->getLocale() == 'ru')
                        $data .= '<p>'.$b->category->name_ru.'</p>';

                        $data.= '
                        
                    </div>
                    <div class="price">
                        <p>'.$b->percent.'%</p>
                    </div>

                </div>
            </div>
        </div>';
        }
        return $data;
        } catch (\Exception $e) {
            return $e;
        }
        

       
    }
}
