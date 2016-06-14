<?php /* Template Name: Página Contacto Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('theme_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenedor Global -->
<main class="pageWrapper">

	<!-- Sección Información -->
	<section class="pageContacto">

		<div class="container">
			<!-- Titulo --> <h2 class="pageCommon__title text-xs-center"> <?php _e('Puedes comunicarte con nosotros' ); ?></h2>

			<!-- Seccíon de Información  -->
			<section class="pageContacto__information">
				<div class="row">
					<!-- Seccion de Datos -->
					<div class="col-xs-12 col-md-5">

						<h2 class="pageContacto__title"><?php _e( 'Datos' , LANG ); ?></h2>

						<!-- Lista de Datos -->
						<ul class="pageContacto__list-datos">
							<!-- Teléfono -->
							<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) : ?>
							<li> <!-- Icono -->  <i class="fa fa-phone" aria-hidden="true"></i>
								<?= $options['contact_tel']; ?>
							</li>
							<?php endif; ?>

							<!-- Celular -->
							<?php if( isset($options['contact_cel']) && !empty($options['contact_cel']) ) : ?>
							<li> <!-- Icono --> <i class="fa fa-mobile" aria-hidden="true"></i>
								<?= $options['contact_cel']; ?>
							</li>
							<?php endif; ?>

							<!-- Email -->
							<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?>
							<li class="text-featured"> <!-- Icono --> <i class="fa fa-envelope" aria-hidden="true"></i>
								<?= $options['contact_email']; ?>
							</li>
							<?php endif; ?>

						</ul> <!-- /.pageContacto__list-datos -->

						<!-- Redes Sociales -->
						<h2 class="pageContacto__title"><?php _e( 'Redes Sociales' , LANG ); ?></h2>
					
						<!-- Redes Sociales -->
						<ul class="social-links">
							<!-- Facebook -->
							<?php if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) : ?>
								<li><a href="<?= $options['red_social_fb']; ?>">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a></li>
							<?php endif; ?>
							<!-- Twitter -->
							<?php if( isset($options['red_social_twitter']) && !empty($options['red_social_twitter']) ): ?>
								<li><a href="<?= $options['red_social_twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<?php endif; ?>
							<!-- Youtube -->
							<?php if( isset($options['red_social_ytube']) && !empty($options['red_social_ytube']) ) : ?>
								<li><a href="<?= $options['red_social_ytube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
							<?php endif; ?>
						</ul> <!-- /.social-links -->

						<!-- Separación Solo en mobile -->
						<p class="hidden-sm-up"></p>

					</div> <!-- /.col-xs-5 -->
					
					<!-- Sección de Formulario -->
					<div class="col-xs-12 col-md-7">
						<!-- Título -->
						<h2 class="pageContacto__title"><?php _e( 'Formulario' , LANG ); ?></h2>
						
						<!-- Formulario -->
						<form id="form-contacto" action="" class="pageContacto__form">
							
							<div class="row">

								<!-- Nombre --> 
								<div class="col-xs-12">
									<input type="text" id="input_name" name="input_name" placeholder="Nombres y Apellidos" required="" />
								</div> <!-- /col-xs-12 -->						

								<!-- Telefono --> 
								<div class="col-xs-12 col-md-6">
									<input type="text" id="input_phone" name="input_phone" placeholder="Teléfono" data-parsley-type='digits' data-parsley-type-message="Solo debe contener números" required="" />
								</div> <!-- /col-xs-12 -->

								<!-- Correo --> 
								<div class="col-xs-12 col-md-6">
									<input type="email" id="input_email" name="input_email" placeholder="E-Mail" required="" data-parsley-type-message="Escribe un email válido" />
								</div> <!-- /col-xs-12 -->	

								<!-- Asunto --> 
								<div class="col-xs-12">
									<input type="text" id="input_subject" name="input_subject" placeholder="Asunto" required="" />
								</div> <!-- /col-xs-12 -->						

								<!-- Mensaje --> 
								<div class="col-xs-12">
									<textarea name="input_message" id="input_message" placeholder="Mensaje"  data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
								</div> <!-- /col-xs-12 -->

							</div> <!-- /.row -->

							<!-- Boton Enviar -->
							<button type="submit" id="btn_send_form" class="btnCommon__show-more btnCommon__show-more--small"><?php _e('enviar',LANG); ?></button>

						</form> <!-- /.pageContacto__form -->

					</div> <!-- /.col-xs-7 -->

				</div> <!-- /.row -->
			</section> <!-- /.pageContacto__information -->

		</div> <!-- /.container -->

		<!-- Sección de Mapas -->
		<section class="pageContacto__maps">
			<!-- Mapa --> <div id="canvas-map" class="canvas-map"></div>
		</section> <!-- /.pageContacto__maps -->

	</section> <!-- /.pageContacto -->
</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion banner de servicios -->
<?php include( locate_template("partials/banner-services.php") ); ?>

<div class="container">
	<!-- Incluir Seccion banner de promociones -->
	<?php include( locate_template("partials/banner-promociones.php") ); ?>
</div> <!-- /.container -->

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- Scripts Solo para esta plantilla -->
<?php 
	if( !empty($options['contact_mapa']) ) : 
	$mapa = explode(',', $options['contact_mapa'] ); 
?>
	<script type="text/javascript">	

		<?php  
			$lat = $mapa[0];
			$lng = $mapa[1];
		?>

	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : 16
	      });

	      //infowindow
	      var infowindow    = new google.maps.InfoWindow({
	        content: '<?= "IngenioArt" ?>'
	      });

	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";

	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        icon     : "<?= IMAGES . '/icon/icon_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }

	    google.maps.event.addDomListener(window, "load", initialize);

	</script>
<?php endif; ?>


<!-- Get Footer -->
<?php get_footer(); ?>