<?php /* Template Name: Página Nosotros Plantilla */ ?>

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
	
	<!-- Sección de Descripción -->
	<section class="pageNosotros__description text-xs-center">
		<div class="container">

			<!-- 	Extraer el contenido -->
			<?= apply_filters('the_content' , $post->post_content ); ?>

		</div> <!-- /.container -->
	</section> <!-- /&.pageNosotros__description -->

	<!-- Sección Aptitudes -->
	<section class="pageNosotros__aptitudes">
		<div class="container">
			<div class="row">
				
				<div class="col-xs-4 text-justify">
					
					<!-- Contenedor  -->
					<div class="pageNosotros__aptitudes__content">

						<!-- Item Vision -->
						<?php if( isset($options['text_vision']) && !empty($options['text_vision']) ) : ?>
						<div class="pageNosotros__aptitudes__item">
							<!-- Titulo --> <h3 class="text-capitalize"><?php _e('visión' , LANG ); ?></h3>
							<?= apply_filters('the_content' , $options['text_vision'] ); ?>
						</div> <!-- /.pageNosotros__aptitudes__item -->
						<?php endif; ?>

						<!-- Item Mision -->
						<?php if( isset($options['text_mision']) && !empty($options['text_mision']) ) : ?>
						<div class="pageNosotros__aptitudes__item">
							<!-- Titulo --> <h3 class="text-capitalize"><?php _e('misión' , LANG ); ?></h3>
							<?= apply_filters('the_content' , $options['text_mision'] ); ?>
						</div> <!-- /.pageNosotros__aptitudes__item -->
						<?php endif; ?>

						<!-- Item Valores -->
						<?php if( isset($options['text_valores']) && !empty($options['text_valores']) ) : ?>
						<div class="pageNosotros__aptitudes__item">
							<!-- Titulo --> <h3 class="text-capitalize"><?php _e('valores' , LANG ); ?></h3>
							<?= apply_filters('the_content' , $options['text_valores'] ); ?>
						</div> <!-- /.pageNosotros__aptitudes__item -->
						<?php endif; ?>

						<!-- Botón Redirigir a Servicios -->
						<a href="#" class="btnCommon__show-more btnCommon__show-more--small">
							<?php _e('Ver servicios' , LANG ); ?>
						</a> <!-- /.btnCommon__show-more btnCommon__show-more--small -->
						
					</div> <!-- /.pageNosotros__aptitudes__content -->
				
				</div> <!-- /.col-xs-3 -->
				
				<!-- Imagen de la Sección -->	
				<div class="col-xs-8">
					<?php if( has_post_thumbnail($post->ID) ) : 
						echo get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid') );
						endif;
					?>
				</div> <!-- /.col-xs-9 -->
			
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /&.pageNosotros__description -->

</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion banner de servicios -->
<?php include( locate_template("partials/banner-services.php") ); ?>

<div class="container">
	<!-- Incluir Seccion banner de promociones -->
	<?php include( locate_template("partials/banner-promociones.php") ); ?>
</div> <!-- /.container -->


<!-- Get Footer -->
<?php get_footer(); ?>