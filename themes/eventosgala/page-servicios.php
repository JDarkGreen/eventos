<?php /* Template Name: Página Servicios Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('ingenioart_custom_settings'); 
	$banner  = $post;
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- Contenedor Global -->
<main class="pageWrapper">

	<!-- Contenedor de Página  -->
	<div class="pageServicios">
		
		<div class="container">
			<?php  
				//Argumentos y query
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
					'post_status'    => 'publish',
					'post_type'      => 'servicio',
					'posts_per_page' => -1,
				);
				$servicios = get_posts( $args );
				
				if( !empty($servicios) ) : foreach( $servicios as $servicio ) : 
			?> <!-- Articulo de Servicio -->		
				<article class="pageServicios__item">
					<div class="row">
						
						<!-- Imagen -->
						<div class="col-xs-12 col-md-5">
							<!-- Conseguir url de imagen -->
							<?php 
								if( has_post_thumbnail( $servicio->ID ) ) : 
									$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $servicio->ID ) );
							?>
							<a href="<?= $feat_img; ?>" class="gallery-fancybox">
								<figure>	
								<?php echo get_the_post_thumbnail( $servicio->ID , 'full' , array('class'=>'img-fluid') );
								?>
								</figure>								
							</a> <!-- /.gallery-fancybox -->
							<?php endif; ?>
						</div> <!-- /.col-xs-4 -->

						<!-- Contenido -->
						<div class="col-xs-12 col-md-7">
							<!-- Titulo --> <h2 class="pageServicios__item__title text-uppercase text-xs-center"><?php _e( $servicio->post_title , LANG ); ?></h2>

							<!-- Contenido  -->
							<div class="pageServicios__item__content">
								
								<div class="row">
									
									<div class="col-xs-12 col-md-6">
										<!-- Paquete 1 -->
										<!-- Subtitulo --> <h3 class="pageServicios__item__subtitle"><?php _e( "Paquete 1" , LANG ); ?></h3>
										<!-- Lista -->
										<?= apply_filters('the_content' , $servicio->post_content ); ?>
									</div> <!-- /.col-xs-6 -->

									<div class="col-xs-12 col-md-6">
										<!-- Paquete 2 -->
										<!-- Subtitulo --> <h3 class="pageServicios__item__subtitle"><?php _e( "Paquete 2" , LANG ); ?></h3>
										<!-- Lista -->
										<?php $textpack2 = get_post_meta( $servicio->ID , 'custom_theme_'.$servicio->ID.'_pack2' , true ); 
											echo htmlspecialchars_decode( $textpack2 );
										?>
									</div> <!-- /.col-xs-6 -->

								</div> <!-- /.row -->

							</div> <!-- /.pageServicios__item__content -->
							
						</div> <!-- /.col-xs8 -->

					</div> <!-- /.row -->
				</article> <!-- /.pageServicios__item -->

			<?php endforeach; endif; ?>
		</div> <!-- /.container -->

	</div> <!-- /.pageServicios -->

</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion banner de servicios -->
<?php include( locate_template("partials/banner-services.php") ); ?>

<div class="container">
	<!-- Incluir Seccion banner de promociones -->
	<?php include( locate_template("partials/banner-promociones.php") ); ?>
</div> <!-- /.container -->

<!-- Get Footer -->
<?php get_footer(); ?>