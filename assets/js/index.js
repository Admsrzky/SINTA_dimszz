$(document).ready(function(){

	$('#menu').click(function(){
		$(this).toggleClass('fa-times');
		$('header').toggleClass('toggle');
	});

	$(window).on('scroll load',function(){

		$('#menu').removeClass('fa-times');
		$('header').removeClass('toggle');
	});
});

var typed = new typed("#text", {
    strings: ["FrontEnd Developer", "Youtubers", "Web Developer"],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 1000,
    loop: true
});


