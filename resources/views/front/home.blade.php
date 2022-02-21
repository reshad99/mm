@extends('front.layouts.master')

@section('content')
    <!--MAIN SECTION START-->
<section class="home ref fix">
  <div class="container-fluid">
      <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
              @foreach ($sliders as $s)
              <div class="carousel-item @if($loop->first) active @endif" style="background-image: url('images/sliders/{{$s->photo}}');" ></div>
              @endforeach
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      
   
  </div>
</section>
<!--MAIN SECTION END-->


<section class="sliders">
  <div class="slider_center">
      <div class="swiper-container">
          <div class="swiper-wrapper">
              <div class="swiper-slide">
                  <a href="/services">
                      <div class="bottom_sec_about">
                          <img src="img/logistics/1/plane.webp" alt="">
                          <div class="bottom-content"><h6>{{__('home.air')}}</h6></div>
                      </div>
                  </a>
              </div>
              <div class="swiper-slide">
                  <a href="/services?id=2">
                      <div class="bottom_sec_about">
                          <img src="img/logistics/1/ship.webp" alt="">
                          <div class="bottom-content"><h6>{{__('home.sea')}}</h6></div>
                      </div>
                  </a>
              </div>
              <div class="swiper-slide">
                  <a href="/services?id=3">
                      <div class="bottom_sec_about">
                          <img src="img/logistics/1/tir.webp" alt="">
                          <div class="bottom-content"><h6>{{__('home.road')}}</h6></div>
                      </div>
                  </a>
              </div>
              <div class="swiper-slide">
                  <a href="/services?id=4">
                      <div class="bottom_sec_about">
                          <img src="img/logistics/1/train.webp" alt="">
                          <div class="bottom-content"><h6>{{__('home.railway')}}</h6></div>
                      </div>
                  </a>
              </div>
              <div class="swiper-slide">
                  <a href="/services?id=5">
                      <div class="bottom_sec_about">
                          <img src="img/logistics/1/home.webp" alt="">
                          <div class="bottom-content"><h6>{{__('home.ware')}}</h6></div>
                      </div>
                  </a>
              </div>
              <div class="swiper-slide">
                  <a href="/services?id=6">
                      <div class="bottom_sec_about">
                          <img src="img/logistics/1/person.webp" alt="">
                          <div class="bottom-content"><h6>{{__('home.broker')}}</h6></div>
                      </div>
                  </a>
              </div>
              <div class="swiper-slide">
                  <a href="/services?id=7">
                      <div class="bottom_sec_about">
                          <img src="img/logistics/1/grup.webp" alt="">
                          <div class="bottom-content"><h6>{{__('home.group')}}</h6></div>
                      </div>
                  </a>
              </div>
          </div>
      </div>
  </div>
</section>



@endsection


