@extends('front.layouts.master')

@section('content')

<section class="about-section fix">
 
   
    <div class="container-fluid">
        <div class="about-box-bg"></div>
       <div class="row">
           <div class="texts">
            
            @if (app()->getLocale() == 'az')
            <h2>Şirkət </h2>
            <h3>Haqqında</h3>
            <p>{!!$about->text_az!!}</p>
            @elseif (app()->getLocale() == 'ru')
            <h2>О компании </h2>
            <p>{!!$about->text_ru!!}</p>
            @elseif (app()->getLocale() == 'en')
            <h2>About </h2>
            <h3>Company</h3>
            <p>{!!$about->text_en!!}</p>
            @endif
           </div>
       </div>
    </div>
</section>

@endsection

