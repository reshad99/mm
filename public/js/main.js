var swiperWorkPrice = new Swiper('.sliders .swiper-container',{
    slidesPerView: 7,
    spaceBetween: 10,
    infinite: false,
    autoplaySpeed:3000,
    autoplay:false,
    speed: 1000,
    margin:5,
    freeMode: true,
    loop: true,
    breakpoints: {
        200: {
            slidesPerView: 1,
           
            
        },
        320: {
            slidesPerView: 2,
           
            
        },
        400: {
            slidesPerView: 3,
           
            
        },
        600: {
            slidesPerView: 3,
            
           
        },
        640: {
            slidesPerView: 3,
           
           
        },
        767: {
            slidesPerView: 4,
         
            infinite: true,
          
        },
        991: {
            slidesPerView: 4,
            infinite: true,
        
        },
        1200:{
            slidesPerView: 7,
          
        }
    },

    pagination: {
        el: '.main-slider .swiper-pagination',
        type: 'progressbar',
    },

    navigation: {
        nextEl: '.main-slider .swiper-button-next',
        prevEl: '.main-slider .swiper-button-prev'
    },
});

// jQuery('.activissty_frames').slick({
//     slidesToShow:3,
//     autoplay: false,
//     speed:1000,
//     autoplaySpeed:2000,
//     slidesToScroll:1,
//     infinite: true,
//     responsive:[
//         {
//             breakpoint: 1200,
//             settings: {
//                 slidesToShow: 4,
//                 infinite: true,
//             }
//         },
//         {
//             breakpoint: 991,
//             settings: {
//                 slidesToShow: 3
//             }
//         },
//         {
//             breakpoint: 768,
//             settings: {
//                 slidesToShow: 2
//             }
//         },

//         {
//             breakpoint: 600,
//             settings: {
//                 slidesToShow: 1
//             }
//         }
//     ]
// });

$(document).ready(function(){
    $(".btnRead").click(function(){
        var id = $(this).data('id');
        $.ajax({
            url: "/activity/"+id,
            type: "get",
            beforeSend: function(){
                $('.imag').find('img').attr('src', '/images/spinner.gif');
            },
            success: function(e){
                $('.imag').find('img').attr('src', '/images/action/'+e.cover);
                $('.about-p').find('p').html(e.text_az);
            }
        });
        $(".activity_frames_about").fadeIn();
        $(".activity_frames").css("display","none");
        $(".activity_frames_about").css("display","flex");
        $(".activity_frames_about").css("justifyContent","center");
    })
    $("#showothers").click(function(){
        $(".activity_frames_about").css("display","none");
        $(".activity_frames").fadeIn();
        $(".activity_framest").css("display","flex");
        $(".activity_frames").css("justifyContent","center");
    })
    
});


// allowTouchMove: false,

window.addEventListener("scroll",function(){
    if(this.pageYOffset>60){
        document.querySelector(".header-down").classList.add("active");
        document.querySelector(".header-up").classList.add("active");
        
    }else{
        document.querySelector(".header-down").classList.remove("active");
        document.querySelector(".header-up").classList.remove("active");
        
    }
});


var wind = $(window);

wind.on("scroll", function () {

    var bodyScroll = wind.scrollTop(),
        navbar = $(".navbar"),
        logo = $(".navbar .navbar-brand> img");

    if (bodyScroll > 60) {

        navbar.addClass("nav-scroll");
 
        logo.attr('src', 'img/logo-dark.webp');

    } else {

        navbar.removeClass("nav-scroll");
       
        logo.attr('src', 'img/logo.webp');
    }
});


$( ".navbar-toggler").click(function() {
    $(".vs-menu-wrapper").addClass("vs-body-visible");
});
$( ".vs-menu-toggle" ).click(function() {
    $(".vs-menu-wrapper").removeClass("vs-body-visible");
});





window.addEventListener("load",()=>{
    document.querySelector(".page-preloader").classList.add("active");
 
	setTimeout(function(){
		document.querySelector(".page-preloader").style.display="none";
       
	},500);
})












