<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menclub;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Validator;

class FormController extends Controller
{
    public function index()
    {
        return view('front.form');
    }

      public function post(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'service' => 'required',
            'from' => 'required',
            'to' => 'required',
            'width' => 'required',
            'length' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $service = $request->service;
        $from = $request->from;
        $to = $request->to;
        $width = $request->width;
        $length = $request->length;
        $height = $request->height;
        $weight = $request->weight;
        $message = $request->message;

        Mail::to("rashad.bayramov@mmlogistics.az")->send(new OrderMail($name,$email, $phone, $service, $from, $to, $width, $length, $height, $weight, $message));
        return redirect()->back()->with('success', 'Mesajınız uğurla göndərildi');
    }
}
