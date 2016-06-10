
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option('theme_custom_settings'); 
?>

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/portada/content-banner.php'));
?>

<!-- Contenedor -->
<div class="container">
	
	<!-- Seccíon Banner Común - Nosotros -->
	<section class="sectionCommon__banner">
		<!-- Imagen --> <figure><img src="<?= IMAGES ?>/banners/nosotros_gala_eventos.jpg" alt="nosotros-galaeventos" class="img-fluid" /></figure>
		<!-- Contenido -->
		<div class="sectionCommon__banner__content text-xs-center">
			<!-- Título --> <h2 class=""><?php _e('Nosotros', LANG ); ?></h2>
			<!-- Subtítulo --> <h3 class=""><?php _e( 'Estamos felices de brindarle nuestra asesoría.' ,LANG ); ?></h3>
			<!-- Párrafo --> <p class=""><?php _e( 'Especialistas en eventos y salones de recepción.' ,LANG ); ?></p>
			<!-- Botón en Común --> <a href="#" class="btnCommon__show-more"><?php _e('Ver más' , LANG ); ?></a>
		</div> <!-- /.sectionCommon__banner__content -->
	</section> <!-- /.sectionCommon__banner -->	

	<!-- Seccíon Banner Común - Nuestros Servicios -->
	<section class="sectionCommon__banner">
		<!-- Imagen --> <figure><img src="<?= IMAGES ?>/banners/servicio1_gala_eventos.jpg" alt="nosotros-galaeventos" class="img-fluid" /></figure>
		<!-- Contenido -->
		<div class="sectionCommon__banner__content text-xs-center">
			<!-- Título --> <h2 class=""><?php _e('Nuestros Servicios', LANG ); ?></h2>
			<!-- Subtítulo --> <h3 class=""><?php _e( 'Servicios para tus eventos.' ,LANG ); ?></h3>
			<!-- Párrafo --> <p class=""><?php _e( 'Te invitamos a ver nuestros servicios.' ,LANG ); ?></p>
			<!-- Botón en Común --> <a href="#" class="btnCommon__show-more"><?php _e('Ver más' , LANG ); ?></a>
		</div> <!-- /.sectionCommon__banner__content -->
		<!-- Imagen --> <figure><img src="<?= IMAGES ?>/banners/servicio1_gala_eventos.jpg" alt="nosotros-galaeventos" class="img-fluid" /></figure>
	</section> <!-- /.sectionCommon__banner -->

	<!-- Sección Miscelaneo -->
	<section class="pageInicio__miscelaneo">
		<div class="row">

			<!-- Sección de Galerías -->
			<div class="col-xs-8">
				<!-- Titulo --> <h2 class="sectionCommon__title-section"> <?php _e('Galerías' , LANG ); ?>
				</h2> <!-- /.sectionCommon__title-section -->
				<!-- Contenedor Galerías -->
				<section class="container-flex align-content">
					<!-- Extraer imagenes de la galería -->
					<?php  
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'post_type'      => 'galery-images',
							'posts_per_page' => 6,
						); 
						$imagenes = get_posts( $args );
						foreach( $imagenes as $imagen ) :

						// Extraer Imágenes Destacadas 
						$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $imagen->ID ) );
						if( !empty( $feat_img ) ) :
					?> <!-- Artículo -->
						<article class="item-gallery">
							<a href="<?= $feat_img; ?>" class="gallery-fancybox" rel="group">
								<img src="<?= $feat_img; ?>" alt="<?= get_post_meta( get_post_thumbnail_id( $imagen->ID ) , '_wp_attachment_image_alt' , true ); ?>" class="img-fluid" />
							</a>
						</article> <!-- /.item-gallery -->
					<?php endif; endforeach; ?>
				</section> <!-- /.section -->
				<!-- Botón ver más -->
				<div class="text-xs-center">
					<a href="#" class="btnCommon__show-more"> <?php _e('Ver más' , LANG ); ?> </a>
				</div> <!-- /.text-xs-center -->
			</div> <!-- /.col-xs-8 -->

			<!-- Sección de Facebook -->
			<div class="col-xs-4">
				<!-- Titulo --> <h2 class="sectionCommon__title-section"> <?php _e('Facebook' , LANG ); ?>
				</h2> <!-- /.sectionCommon__title-section -->

				<!-- Red social -->
				<?php $link_facebook = $options['red_social_fb']; 
					if( !empty($link_facebook) ) :
				?>
					<section class="container__facebook">
						<!-- Contebn -->
						<div id="fb-root" class=""></div>

						<!-- Script -->
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-height="493" data-hide-cover="false" data-show-facepile="true">
						</div> <!-- /. fb-page-->
					</section> <!-- /.container__facebook -->
				<?php else: ?>
					<p class="text-xs-center">Opcion no habilitada temporalmente</p>
				<?php endif; ?>

			</div> <!-- /.col-xs-4 -->

		</div> <!-- /.row -->
	</section> <!-- /.pageInicio__miscelaneo -->

</div> <!-- /.container -->
	
<!-- Incluir Seccion banner de servicios -->
<?php include( locate_template("partials/banner-services.php") ); ?>

<div class="container">
	<!-- Incluir Seccion banner de promociones -->
	<?php include( locate_template("partials/banner-promociones.php") ); ?>
</div> <!-- /.container -->

<!-- Footer -->
<?php get_footer(); ?>