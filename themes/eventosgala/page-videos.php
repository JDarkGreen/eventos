<?php /* Template Name: Página Videos Plantilla */ ?>

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
	
	<!-- Sección de Galería -->
	<section class="pageMedia__multimedia">
	
		<div class="container">

			<!-- Obtener todos los videos -->
			<section id="galeria-videos" class="pageMedia__multimedia__content row">
				<?php 
					$args = array(
						'order'          => 'DESC',
						'orderby'        => 'date',
						'post_status'    => 'publish',
						'post_type'      => 'galery-videos',
						'posts_per_page' => -1,
					);
					$videos = get_posts( $args );
					if( !empty($videos) ) :
					foreach( $videos as $video ) :
				?>  <!-- Article -->
				<article class="item-imagen col-xs-12 col-md-6">
					<?php  
						$video = $video->post_content;
						$video = str_replace( "watch?v=" , "embed/" , $video );
					?>
					<iframe src="<?= $video; ?>" width="100%" height="266" frameborder="0" allowfullscreen ></iframe>
				</article> <!-- /.item-imagen -->
				<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>

			</section> <!-- /.pageMedia__multimedia__content -->

			<!-- Limpiar floats --><div class="clearfix"></div>

		</div> <!-- /.container -->

	</section> <!-- /.pageMedia__multimedia -->

</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion banner de servicios -->
<?php include( locate_template("partials/banner-services.php") ); ?>

<div class="container">
	<!-- Incluir Seccion banner de promociones -->
	<?php include( locate_template("partials/banner-promociones.php") ); ?>
</div> <!-- /.container -->

<!-- Get Footer -->
<?php get_footer(); ?>

