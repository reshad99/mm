@extends('front.layouts.master')

@section('content')

<section class="form-section fix">  
    <div class="container-fluid">
        <div class="form-box-bg">
            <div class="row">
                <div class="texts">
                 <h2>{{__('nav.form1')}}</h2>
                 <h3>{{__('nav.form2')}}</h3>
                </div>
            </div>
            <div class="row">
                @if ($errors->any())
                    <div class="col-md-3 text-center p-3 form-alert"><span class="alert alert-danger">{{$errors->first()}}</span> </div>   
                    @endif
                    @if (session('success'))
                    <div class="col-md-3 text-center p-3 form-alert"><span class="alert alert-success">{{session('success')}}</span> </div>   
                    @endif
                 <div class="contact_form">
                    
                     <form method="post">
                         @csrf
                         <input type="text" name="name" value="{{old('name')}}" placeholder="{{__('home.name')}}">
                         <input type="text" name="email" value="{{old('email')}}" placeholder="{{__('home.email')}}">
                         <input type="text" name="phone" value="{{old('phone')}}" placeholder="{{__('home.phone')}}">
                         <input type="text" name="service" value="{{old('service')}}" placeholder="{{__('home.service')}}">
                         <input type="text" name="from" value="{{old('from')}}" placeholder="{{__('home.from')}}">
                         <input type="text" name="to" value="{{old('to')}}" placeholder="{{__('home.to')}}">
                         <input type="number" name="width" value="{{old('width')}}" placeholder="{{__('home.width')}}">
                         <input type="number" name="length" value="{{old('length')}}" placeholder="{{__('home.length')}}">
                         <input type="number" name="height" value="{{old('height')}}" placeholder="{{__('home.height')}}">
                         <input type="number" name="weight" value="{{old('weight')}}" placeholder="{{__('home.weight')}}">
                         <textarea placeholder="Mesajınız" name="message">{!!old('message')!!}</textarea>
                 </div>
                 <div class="button">
                     <button class="btn" type="submit">{{__('home.send')}}</button>
                 </div>
                     </form>
            </div>
        </div>
      
    </div>
</section>


@endsection
