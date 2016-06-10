<?php /* Template Name: Página Fotos Plantilla */ ?>

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

			<!-- Botones que filtran los proyectos -->
			<section class="button-group filter-button-group text-xs-center">
				<button class="active" data-filter="*"><?php _e( 'Todas', LANG ); ?></button>
				<!-- Extraer taxonomias -->
				<?php  
					$args = array(
						'taxonomy'   => 'image_category',
						'hide_empty' => false,
					);
					$cats_imagenes = get_terms( $args ); #var_dump($cats_imagenes);
					foreach( $cats_imagenes as $cat_imagen ) : 
				?>
					<button data-filter="<?= "." . $cat_imagen->slug ?>"><?= $cat_imagen->name ?></button>
				<?php endforeach; ?>
			</section> <!-- /. -->

			<!-- Obtener todos las imágenes  -->
			<section id="galeria-imagenes" class="pageMedia__multimedia__content row">
				<?php 
					$args = array(
						'order'          => 'DESC',
						'orderby'        => 'date',
						'post_status'    => 'publish',
						'post_type'      => 'galery-images',
						'posts_per_page' => -1,
					);
					$imagenes = get_posts( $args );
					if( !empty($imagenes) ) :
					foreach( $imagenes as $imagen ) :
				?>  <!-- Article -->
				<!-- Obtener Terminos para Cada Imagen -->
				<?php 
					$args = array("fields"=>"slugs");
					$terms_imagen  = wp_get_post_terms( $imagen->ID, 'image_category', $args );
					//unir los términos
					$terminos_imagen = "";
					$terminos_imagen = implode( " " , $terms_imagen ); 
				?>
				<article class="item-imagen <?= $terminos_imagen; ?> col-xs-12 col-md-4">

					<!-- Extrar url de la Imagen y Colocar Imagen Destacada -->
					<?php $feat_img = wp_get_attachment_url( get_post_thumbnail_id( $imagen->ID ) ); ?>
					<a href="<?= $feat_img ?>" class="gallery-fancybox" rel="group">
						<figure>
							<?php if( has_post_thumbnail( $imagen->ID ) ) :  
								echo get_the_post_thumbnail($imagen->ID,'full',array('class'=>'img-fluid'));
								else : 
							?>
								<img src="<?= IMAGES ?>/actualizando-info.jpg" alt="actualizando-eventos-catering-info" class="img-fluid" />
							<?php endif;  ?>
						</figure> <!-- /figure -->
					</a>

				</article> <!-- /.item-imagen -->
				<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>

			</section> <!-- /.pageMedia__multimedia__content -->

			<!-- Limpiar floats --><div class="clearfix"></div>

			<!-- Mensaje Isotope en caso no se haya encontrado elementos -->
			<div id="message-isotope" style="display:none;">
				<h2 class="pageCommon__title text-xs-center text-uppercase"> <?php _e('No hay Imágenes en esta categoría aún' , LANG ); ?></h2>
			</div> <!-- /#message-proyecto -->



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

