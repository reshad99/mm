@extends('front.layouts.master')

@section('content')
    


<!--MAIN SECTION START-->
<section class="contact-section fix">
 
   
    <div class="container-fluid">
       <div class="row">
           <div class="texts">
            <h2>{{__('nav.contact')}}</h2>
           </div>
       </div>
       <div class="row">
            <div class="contact_columns">

                <div class="contact names">
                    
                   
                    <form method="post">
                        @csrf
                        <input type="text" name="name" placeholder="{{__('home.name')}}">
                        <input type="tel" name="phone" placeholder="{{__('home.phone')}}">
                        <input type="email" name="email" placeholder="{{__('home.email')}}">
                </div>
                <div class="button">
                   
                    <button type="submit" class="btn">{{__('home.send')}}</button>
                </div>
                <div class="contact textarea">
                    <textarea placeholder="Mesajınız" name="message"></textarea>
                </div>
                     </form>
                    
              
                <div class="contact map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.769046453976!2d49.85760551564886!3d40.413966863730984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403087ff1afca763%3A0xc6ad928be0016fef!2sCORN%20Advertising!5e0!3m2!1str!2s!4v1638345845665!5m2!1str!2s"></iframe>
                </div>
                @if ($errors->any())
                <span class="alert alert-danger">{{$errors->first()}}</span>    
                @endif
                @if (session('success'))
                <span class="alert alert-success">{{session('success')}}</span>    
                @endif
            </div>
           
       </div>
       <div class="links">
       
            <li>
                <a href="tel:+994502901133"><i class="fas fa-phone-alt"></i>{{$contact->phone1}}</a>
            </li>
            <li>
                <a href="mailto:info@mmlogistics.az"><i class="far fa-envelope"></i>{{$contact->email}}</a>
            </li>
            <li>
                @if (app()->getLocale() == 'az')
                <a><i class="fas fa-home"></i>{{$contact->address_az}}</a>
                @elseif (app()->getLocale() == 'en')
                <a><i class="fas fa-home"></i>{{$contact->address_en}}</a>
                @elseif (app()->getLocale() == 'ru')
                <a><i class="fas fa-home"></i>{{$contact->address_ru}}</a>
                    
                @endif
                
            </li>
        
       </div>
    </div>
</section>


@endsection
