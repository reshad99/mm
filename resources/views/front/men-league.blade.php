@extends('front.layouts.master')

@section('content')
<style>

</style>


<section class="col-lg-12 menleagueSection">
    <div class="row">
        <div class="menleagueText">
          <span class="title">{{__('nav.menleague')}}</span>
        </div>
    </div>

    @foreach ($groups as $g)
    <div class="row menleagueScorMain">
      <div class="menleagueScortext">
        @if (app()->getLocale() == 'az')
        <span class="title">{{$g->name_az}}</span>
        @elseif (app()->getLocale() == 'en')
        <span class="title">{{$g->name_en}}</span>
        @elseif (app()->getLocale() == 'ru')
        <span class="title">{{$g->name_ru}}</span>
        @endif
      </div>
  </div>


  <div class="row menleagueScors">
      <div class="col-md-10">
        <div class="table-responsive">
          <table class="table text-white">
            <thead class="bg-color">
              <tr>
                @if (app()->getLocale() == 'az')
                <th scope="col" class="">{{$g->name_az}}</th>
                <th scope="col">O</th>
                <th scope="col">Q</th>
                <th scope="col">B</th>
                <th scope="col">M</th>
                <th scope="col">AQ</th>
                <th scope="col">YQ</th>
                <th scope="col">AV</th>
                <th scope="col">Xal</th>
                @elseif (app()->getLocale() == 'en')
                <th scope="col" class="">{{$g->name_en}}</th>
                <th scope="col">G</th>
                <th scope="col">W</th>
                <th scope="col">D</th>
                <th scope="col">L</th>
                <th scope="col">AG</th>
                <th scope="col">YG</th>
                <th scope="col">AV</th>
                <th scope="col">Point</th>
                @elseif (app()->getLocale() == 'ru')
                <th scope="col" class="">{{$g->name_en}}</th>
                <th scope="col">И</th>
                <th scope="col">П</th>
                <th scope="col">Н</th>
                <th scope="col">П</th>
                <th scope="col">AG</th>
                <th scope="col">YG</th>
                <th scope="col">AV</th>
                <th scope="col">Очки</th>
                @endif    
                
              </tr>
            </thead>
            <tbody class="">
              @foreach ($g->teams as $t)
              <tr class="bg-second">
                @if (app()->getLocale() == 'az')
                <th scope="row">{{$t->name_az}}</th>
                @elseif (app()->getLocale() == 'en')
                <th scope="row">{{$t->name_en}}</th>
                @elseif (app()->getLocale() == 'ru')
                <th scope="row">{{$t->name_ru}}</th>
                @endif
                <td>{{$t->game}}</td>
                <td>{{$t->win}}</td>
                <td>{{$t->draw}}</td>
                <td>{{$t->lose}}</td>
                <td>{{$t->ag}}</td>
                <td>{{$t->yg}}</td>
                <td>{{$t->av}}</td>
                <td>{{$t->point}}</td>
              </tr>
              @endforeach
            
            </tbody>
          </table>
          </div>
        </div>
  </div>
    @endforeach

    
</section>

@endsection

@section('men-league-fixtures')

<section class="gameSchedule">
  <div class="container-fluid">
    @foreach ($gamestages as $g)
    <div class="row">
      <div class="gameScheduleText">
        @if (app()->getLocale() == 'az')
        <span class="title">{{$g->stage_az}}</span>
        @elseif (app()->getLocale() == 'en')
        <span class="title">{{$g->stage_en}}</span>
        @elseif (app()->getLocale() == 'ru')
        <span class="title">{{$g->stage_ru}}</span>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="gameScheduleDate">
          <span class="title">{{$g->time}} / {{$g->hour}}</span>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-8 col-md-8 col-sm-12 boxs">
        <div class="box1">
          @foreach ($g->games as $o)
          @if (app()->getLocale() == 'az')
          <h1>{{$o->team1->name_az}}</h1>
          @elseif (app()->getLocale() == 'en')
          <h1>{{$o->team1->name_en}}</h1>
          @elseif (app()->getLocale() == 'ru')
          <h1>{{$o->team1->name_ru}}</h1>
          @endif
          @endforeach
        </div>
        <div class="box2">
          @foreach ($g->games as $h)
          <h2>{{$h->team1goal}} <span>- </span> {{$h->team2goal}}</h2>
          @endforeach
        </div>
        <div class="box3">
          @foreach ($g->games as $o)
          @if (app()->getLocale() == 'az')
          <h1>{{$o->team2->name_az}}</h1>
          @elseif (app()->getLocale() == 'en')
          <h1>{{$o->team2->name_en}}</h1>
          @elseif (app()->getLocale() == 'ru')
          <h1>{{$o->team2->name_ru}}</h1>
          @endif
          @endforeach
        </div>
      </div>

    </div>
    @endforeach
  



  </div>

  <div class="container bombers">
    <div class="row">
      <div class="bombersText">
        <span class="title">{{__('home.topscorers')}}</span>
      </div>
    </div>
    <div class="row bombersMens">
        <div class="col-md-12">
          @foreach ($topscorers as $t)
          <h1>{{$t->name_az}} - ("{{$t->team->name_az}}") - {{$t->goal}} qol</h1>
          @endforeach
        </div>
    </div>
  </div>

</section>

@endsection
