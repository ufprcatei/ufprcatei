jQuery(function($) {

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
	});

	$( '.centered' ).each(function( e ) {
		$(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
	});

	$(window).resize(function(){
		$( '.centered' ).each(function( e ) {
			$(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
		});
	});

	//portfolio
	$(window).load(function(){
		$portfolio_selectors = $('.portfolio-filter >li>a');
		if($portfolio_selectors!='undefined'){
			$portfolio = $('.portfolio-items');
			$portfolio.isotope({
				itemSelector : 'li',
				layoutMode : 'fitRows'
			});
			$portfolio_selectors.on('click', function(){
				$portfolio_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$portfolio.isotope({ filter: selector });
				return false;
			});
		}
	});

	//contact form
	var form = $('.contact-form');
	form.submit(function () {
		$this = $(this);
		var values = {};
		
		$.each($this.serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		
		$.post($(this).attr('action'), values, function(data) {
			var typeAlert = (data.type == 'success') ? 'success' : 'danger';

			$.notify({
				message: data.message,
			},{
				element: 'body',
				type: typeAlert,
				placement: {
					from: "top",
					align: "left"
				},
				delay: 5000,
				animate: {
					enter: 'animated fadeInUp',
					exit: 'animated fadeOutDown'
				}
			});
		},'json');
		
		return false;
	});

	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	
});

// Google Map Customization
(function(){

	var map;

	map = new GMaps({
		el: '#gmap',
		lat: -25.457132,
		lng: -49.236089,
		scrollwheel:false,
		zoom: 16,
		zoomControl : true,
		panControl : true,
		streetViewControl : true,
		mapTypeControl: true,
		overviewMapControl: true,
		clickable: true
	});

	map.addMarker({
		lat: -25.457132,
		lng: -49.236089,
		title: 'Setor de Educação Profissional e Tecnológica - SEPT UFPR',
		infoWindow: {
		  content: '<p style="color:black"><h4 style="color:black">Setor de Educação Profissional e Tecnológica - SEPT UFPR</h4><p style="color:black">R. Dr. Alcides Vieira Arcoverde, 1225<br>Jardim das Américas, Curitiba/PR <br>CEP: 81520-260</p></p>'
		}
	});
}());
