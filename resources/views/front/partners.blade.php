@extends('front.layouts.master')

@section('content')

<section class="col-lg-12 akiabPartner">
    <div class="row">
        <div class="akiabPartnerText">
          <span class="title">{{__('nav.partners')}}</span>
        </div>
    </div>
    <div class="row partnerss">
      @foreach ($partners as $p)
      <div class="col-lg-3 col-md-4 col-sm-6 p-partners">
        <a href="{{$p->link}}">
          <div class="card" >
            <img src="/images/partners/{{$p->logo}}" class="img-responsive" alt="...">
          </div>
        </a>
      </div>
      @endforeach
        
      </div>
</section>

@endsection
