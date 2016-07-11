
var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

	j(document).on('ready',function(){

		/* Flecha Navegar Hacia arriba de la página */
		/* Si existe la flecha hacia arriba */
		if( j("#arrow-up-page").length ){
			j("#arrow-up-page").on('click',function(e){
				e.preventDefault(); /* Detener evento por defecto */
				j('html,body').animate({
					scrollTop: 0
				}, 900 );
			});	
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  SLIDEBAR VERSION MOBILE  -----|*/
		/*|----------------------------------------------------------------------|*/

		var mySlidebars = new j.slidebars({
			disableOver       : 568, // integer or false
			hideControlClasses: true, // true or false
			scrollLock        : false, // true or false
			siteClose         : true, // true or false
		});

		//Eventos

		//Abrir contenedor izquierda
		j("#toggle-left-nav").on('click',function(){
			mySlidebars.slidebars.toggle('left');
		});

		//Abrir contenedor derecha
		j("#toggle-right-nav").on('click',function(){
			mySlidebars.slidebars.toggle('right');
		});
		

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME LIBRERIA  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_home = j("#carousel-home").carousel({ interval: 5000 , pause : "" });

		//Eventos - al finalizar el carousel
		var i = 1;
		carousel_home.on('slid.bs.carousel', function ( e ) {

			if( i > 2 ){ i = 1 };
			
			var current_item = j(this).find('.active');
  			//imagen actual
  			var image_carousel = current_item.find('img');
  			//animacion de la imagen
  			if( i == 1 ){ image_carousel.addClass('box-expand'); }
  			else{ image_carousel.addClass('box-left-to-right'); }

  			i++;
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  EVENTOS FLECHAS CAROUSEL COMUNES  -----|*/
		/*|----------------------------------------------------------------------|*/		
		j(".arrow__common-slider").on('click',function(e){ e.preventDefault(); });


		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL CLIENTES  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_clientes = j('#carousel-clientes');
		carousel_clientes.owlCarousel({
			items          : 4,
			lazyLoad       : false,
			loop           : true,
			margin         : 100,
			nav            : false,
			autoplay       : true,
			responsiveClass: true,
			mouseDrag      : false,
			autoplayTimeout: 2500,
			fluidSpeed     : 2000,
			smartSpeed     : 2000,
			responsive:{
		        320:{
		            items: 2
		        },
		      	640:{
		            items: 4
		        },
	    	}			
		});

		/* Eventos de flechas */
		j("#arrow__cliente--prev").on('click',function(e){
			carousel_clientes.trigger('prev.owl.carousel', [700]);
		});
		j("#arrow__cliente--next").on('click',function(e){
			carousel_clientes.trigger('next.owl.carousel', [700]);
		});
		
		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL SERVICIOS - PAGINA SERVICIOS  -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_service = j('#carousel-single-servicio');
		carousel_service.owlCarousel({
			items          : 3,
			lazyLoad       : false,
			loop           : true,
			margin         : 7,
			nav            : false,
			autoplay       : true,
			responsiveClass: true,
			mouseDrag      : false,
			autoplayTimeout: 2500,
			fluidSpeed     : 2000,
			smartSpeed     : 2000,
			responsive:{
		        320:{
		            items: 1
		        },
		      	640:{
		            items: 3
		        },
	    	}			
		});

		/* Eventos de flechas */
		j("#demo__arrows--prev").on('click',function(e){
			carousel_service.trigger('prev.owl.carousel', [900]);
		});
		j("#demo__arrows--next").on('click',function(e){
			carousel_service.trigger('next.owl.carousel', [900]);
		});


		/*|----------------------------------------------------------------------|*/
		/*|-----  ISOTOPE DE IMAGENES  -----|*/
		/*|----------------------------------------------------------------------|*/

		var container_imagenes = j("#galeria-imagenes");
		if( container_imagenes.length ){

			//Isotope
			container_imagenes.isotope({
				// options
				itemSelector: '.item-imagen',
				layoutMode  : 'fitRows',
			});

			container_imagenes.isotope( 'layout' );

			//Filtros
			j('.filter-button-group').on( 'click', 'button', function() {
			 	var filterValue = j(this).attr('data-filter');
				container_imagenes.isotope({ filter: filterValue });
				//activar elemento actual
				j('.filter-button-group button').removeClass('active');
				j(this).addClass('active');

				//Si no encuentra contenido
				if ( !container_imagenes.data('isotope').filteredItems.length ) {
				    j('#message-isotope').fadeIn('slow');
				} else { j('#message-isotope').fadeOut('fast'); }
				
			});
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  FANCYBOX GALERIAS   -----|*/
		/*|----------------------------------------------------------------------|*/

		j("a.gallery-fancybox").fancybox({
			'overlayShow'  :	false,
			'speedIn'      :	600, 
			'speedOut'     :	200, 
			'transitionIn' :	'elastic',
			'transitionOut':	'elastic',
		});


		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL DE GALERÍAS   -----|*/
		/*|----------------------------------------------------------------------|*/		

		var carousel_gallery = j(".js-carousel-gallery");
		if( carousel_gallery.length ){
			carousel_gallery.owlCarousel({
				autoplay       : true,
				autoplayTimeout: 2500,
				dots           : true,			
				fluidSpeed     : 2000,
				items          : 1,
				lazyLoad       : false,
				loop           : true,
				margin         : 0,
				mouseDrag      : false,
				nav            : false,
				responsiveClass: true,
				smartSpeed     : 2000,
			});			
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  TABS SECCION BLOG ARTICULOS   -----|*/
		/*|----------------------------------------------------------------------|*/

		j(".group-buttons-tabs a").on('click',function(e){
			e.preventDefault();

			/* Activar elemento activo */
			j(".group-buttons-tabs a").removeClass('active');
			j(this).addClass('active');

			/* Mostrar contenedor respectivo */
			var container = j(this).attr('href');
			if( container.length ){
				/* Ocultar los otros contenedores */
				j(".articles-features__item").slideUp( 'fast' );
				j(container).delay(300).fadeIn(900);
			}
		});

		/*|-------------------------------------------------------------|*/
		/*|-----  TABS SECCIÓN PREGUNTAS  ------|*/
		/*|--------------------------------------------------------------|*/	

		j(".pagePreguntas__section .panel .panel-heading .panel-title a")
		.on('click',function(){
			//Quitar todas las clases activas
			j(".pagePreguntas__section .panel .panel-heading .panel-title a")
			.removeClass('active');
			//Agregar la clase activa al elemento actual
			j(this).addClass('active');
		});	

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDADOR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/

		j('#form-contacto').parsley();

		j("#form-contacto").submit( function(e){
			e.preventDefault();
			//Subir el formulario mediante ajax
			j.post( url + '/email/enviar.php', 
			{ 
				name   : j("#input_name").val(),
				email  : j("#input_email").val(),
				phone  : j("#input_phone").val(),
				subject: j("#input_subject").val(),
				message: j("#input_message").val(),
			},function(data){
				alert( data );

				j("#input_name").val("");
				j("#input_email").val("");
				j("#input_phone").val("");
				j("#input_subject").val("");
				j("#input_message").val("");

				window.location.reload(false);
			});			
		});

	});

	/* ------------ Eventos Scroll ------------------------ */
	j(window).on('scroll',function(){

		/* Si existe la flecha hacia arriba */
		if( j("#arrow-up-page").length ){
			//Si el scroll del navegador es mayor que la posicion de 300 pixeles
			if( j('body').scrollTop() > 300 ){
				//Mostrar flecha de dirección hacia arriba
				j("#arrow-up-page").fadeIn('slow');
			}else{ 
				/* Si no Ocultar esta flecha */ j("#arrow-up-page").fadeOut('slow');
			}
		}

		/* NAVEGACIÓN PRINCIPAL */
		if( j(".mainHeader").length ){
			//Si el scroll del navegador es mayor que la posicion de 7 pixeles
			if( j('body').scrollTop() > 7 ){
				//
				j(".mainHeader").addClass('mainHeader--fixed');
				j(".mainNavigation").addClass('mainNavigation--fixed');

			}else{ 
				/* Si no  */ 
				j(".mainHeader").removeClass('mainHeader--fixed');
				j(".mainNavigation").removeClass('mainNavigation--fixed');
			}

		}

		/* CONTENEDOR ISOTOPE - Permite reorganizar el contenedor del isotope */
		if( j("#galeria-imagenes").length ){
			j("#galeria-imagenes").isotope( 'layout' );
		}

	});

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);