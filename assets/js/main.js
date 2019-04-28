$(document).ready(function(){

	//SLIDER 
	$('.responsive').slick({
		dots: true,
		arrows: false,
		infinite: true,
		autoplay: true,
  		autoplaySpeed: 3000,
		speed: 500,
		  slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [
		    {
		    	breakpoint: 1024,
		    	settings: {
			      	arrows: false,
			        slidesToShow: 3,
			        slidesToScroll: 3,
			        infinite: true,
			        dots: true
		      }
		    },
		    {
			    breakpoint: 600,
			    settings: {
				    arrows: false,
				    slidesToShow: 2,
				    slidesToScroll: 2
		      	}
		    },
		    {
			    breakpoint: 480,
			    settings:  {
			      	arrows: false,
			        slidesToShow: 1,
			        slidesToScroll: 1
		      }
		    }
	 	]
	});	

	// LIGHTBOX
	$('.gallery-sobre').magnificPopup({
	    delegate: 'a', // the selector for gallery item
	    type: 'image',
	    gallery: {
		 	enabled: true, // set to true to enable gallery
			preload: [0,1], // read about this option in next Lazy-loading section
			navigateByImgClick: true,
			arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
			tPrev: 'Previous (Left arrow key)', // title for left button
			tNext: 'Next (Right arrow key)', // title for right button
		  	tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
		}
	});

	$('.gallery-slider').magnificPopup({
	    delegate: 'a', // the selector for gallery item
	    type: 'image',
	    gallery: {
		 	enabled: true, // set to true to enable gallery
			preload: [0,1], // read about this option in next Lazy-loading section
			navigateByImgClick: true,
			arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
			tPrev: 'Previous (Left arrow key)', // title for left button
			tNext: 'Next (Right arrow key)', // title for right button
		  	tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
		}
	});

	$('.gallery-galeria').magnificPopup({
	    delegate: 'a', // the selector for gallery item
	    type: 'image',
	    gallery: {
		 	enabled: true, // set to true to enable gallery
			preload: [0,1], // read about this option in next Lazy-loading section
			navigateByImgClick: true,
			arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
			tPrev: 'Previous (Left arrow key)', // title for left button
			tNext: 'Next (Right arrow key)', // title for right button
		  	tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
		}
	});
});

//  ANIMÃÇÃO NÚMERO 
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});;

// MEGA MENU
$(function() {
	window.prettyPrint && prettyPrint()
	$(document).on('click', '.yamm .dropdown-menu', function(e) {
		e.stopPropagation()
	})
})

// FIXED MENU
menu();
$(window).bind('scroll', function() {
	menu();
});
function menu(){
	if($(window).scrollTop() > 50){
		menuOn();
	}else{
		menuOff();	
	}
	$('body').scrollspy({ 
		target: '.navbar-default',
		offset: 50
	})
}
function menuOn(){
	$('.menu').addClass('fixed');
}
function menuOff(){
	$('.menu').removeClass('fixed');
}

// ACCORDION PÁGINA CURSOS
$(document).ready(function() {
  $('.collapse.in').prev('.panel-heading').addClass('active');
  $('#accordion, #bs-collapse')
    .on('show.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').addClass('active');
    })
    .on('hide.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').removeClass('active');
    });
});

// FUNÇÃO IR PARA O TOPO
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
	$('html, body').animate({
		scrollTop: 0
	}, 1000, 'linear');
}

// MAPA
function initMap() {
    var uluru = {lat: -4.9461555, lng: -37.982387};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
