@extends('front.layouts.master')

@section('content')
    



<section class="details-section fix-y">
 
   
    <div class="container-fluid fix-y">
        <div class="details-box-bg"></div>
       <div class="row">
           <div class="texts">
            <h2>Hava yolu </h2>
            <h3>logistika</h3>
           </div>
       </div>
       <div class="row">
        <div id="tsum-tabs">
  
            <main>
                <input id="tab1" type="radio" name="tabs" @if(!request()->has('id')) checked @endif>
                <label for="tab1">
                    <div class="about">
                        <div class="img">
                            <img src="img/logistics/1/plane.webp" alt="">
                        </div>
                        <div class="text">
                            <h6>{{__('home.air')}}</h6>
                        </div>
                    </div>
                </label>
                
                <input id="tab2" type="radio" name="tabs" @if(request()->has('id') && request()->id == 2) checked @endif>
                <label for="tab2">
                    <div class="about">
                        <div class="img">
                            <img src="img/logistics/1/ship.webp" alt="">
                        </div>
                        <div class="text">
                            <h6>{{__('home.sea')}}</h6>
                        </div>
                    </div>
                </label>
                
                <input id="tab3" type="radio" name="tabs" @if(request()->has('id') && request()->id == 3) checked @endif>
                <label for="tab3">
                    <div class="about">
                        <div class="img">
                            <img src="img/logistics/1/tir.webp" alt="">
                        </div>
                        <div class="text">
                            <h6>{{__('home.road')}}</h6>
                        </div>
                    </div>
                </label>
                
                <input id="tab4" type="radio" name="tabs" @if(request()->has('id') && request()->id == 4) checked @endif>
                <label for="tab4">
                    <div class="about">
                        <div class="img">
                            <img src="img/logistics/1/train.webp" alt="">
                        </div>
                        <div class="text">
                            <h6>{{__('home.railway')}}</h6>
                        </div>
                    </div>
                </label>

                <input id="tab5" type="radio" name="tabs" @if(request()->has('id') && request()->id == 5) checked @endif>
                <label for="tab5">
                    <div class="about">
                        <div class="img">
                            <img src="img/logistics/1/home.webp" alt="">
                        </div>
                        <div class="text">
                            <h6>{{__('home.ware')}}</h6>
                        </div>
                    </div>
                </label>

                <input id="tab6" type="radio" name="tabs" @if(request()->has('id') && request()->id == 6) checked @endif>
                <label for="tab6">
                    <div class="about">
                        <div class="img">
                            <img src="img/logistics/1/person.webp" alt="">
                        </div>
                        <div class="text">
                            <h6>{{__('home.broker')}}</h6>
                        </div>
                    </div>
                </label>

                <input id="tab7" type="radio" name="tabs" @if(request()->has('id') && request()->id == 7) checked @endif>
                <label for="tab7">
                    <div class="about">
                        <div class="img">
                            <img src="img/logistics/1/grup.webp" alt="">
                        </div>
                        <div class="text">
                            <h6>{{__('home.group')}}</h6>
                        </div>
                    </div>
                </label>

                @foreach ($services as $s)
                <section  id="content{{$s->id}}">
                    @if (app()->getLocale() == 'az')
                    <p>{!!$s->text_az!!}</p>
                    @elseif (app()->getLocale() == 'ru')
                    <p>{!!$s->text_ru!!}</p>
                    @elseif (app()->getLocale() == 'en')
                    <p>{!!$s->text_en!!}</p>
                        
                    @endif
                    
            
                </section>
                @endforeach
                
                
               
                
            </main>
            </div>
       </div>
    </div>
</section>
@endsection
