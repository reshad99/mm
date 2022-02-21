@extends('front.layouts.master')

@section('content')

<section class="activity-section fix">
    <div class="container-fluid">
        <div class="row">
            <h1 class="activity-section_header_text">Fəaliyət</h1>
        </div>
        <div class="activity_frames">
            @foreach ($actions as $a)
            <div class="blog1 col-md-6 col-ms-12">
                <div class="activity_frames_image">
                    <a href="#"> <img src="/images/action/{{$a->photo}}" alt=""></a>
                </div>
                <div class="content">
                    <h5>{{$a->title_az}}</h5>
                    <p>{!! \Illuminate\Support\Str::limit($a->text_az, 150, $end='...') !!}</p>
                    <div class="btnRead" data-id="{{$a->id}}"><span>Davam</span></div>
                </div>
            </div>
            @endforeach
            
        </div>
        
        <div class="activity_frames_about">
            <div class="row">
                <div class="col-md-4">
                    @foreach ($actions as $l)
                    <div class="col-lg-12 ">
                        <a href="#" class="btnRead" data-id="{{$l->id}}"> <img src="/images/action/{{$l->photo}}" alt=""></a>
                        <p>{!! \Illuminate\Support\Str::limit($l->text_az, 150, $end='...') !!}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-8">
                    <div class="showothers" style="display: flex; justify-content: center;">
                        <button type="submit" id="showothers"><i class="fas fa-arrow-circle-left"></i></button>
                    </div>
                    <div class="imag">
                        <img src="" alt="">
                    </div>
                    <div class="about-p">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eius reiciendis, eos modi aperiam asperiores repellendus sapiente mollitia similique dolorem? Pariatur rerum nobis suscipit delectus illum provident esse laudantium ex reprehenderit exercitationem nisi ad eos nulla placeat, impedit quam, recusandae cupiditate unde! Numquam natus distinctio aliquam aspernatur totam eligendi quis praesentium adipisci, dolores saepe maiores. Ratione maiores tempora fugiat, harum soluta ad saepe itaque animi quia eos, neque asperiores at, laborum nulla iure voluptatibus? Ipsum nesciunt temporibus nulla, autem voluptates facere optio impedit, vero necessitatibus ratione aspernatur perferendis dicta reprehenderit est? Provident, molestias eos. Aspernatur impedit asperiores odit sunt distinctio!</p>
                    </div>
                </div>
            </div>
        </div> 
    
    </div>
</section>

@endsection

