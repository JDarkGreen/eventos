<?php /* Categoría Plantilla */ ?>

<!-- Global Post -->
<?php 
	$category = get_queried_object(); #var_dump($category);
	$options  = get_option('theme_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner       = $category; 
	$banner_title = $category->name; 
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Global -->
<main class="pageWrapper pageBlog">
	
	<div class="container">
		<div class="row">

			<!--  Sección Artículos - Previews  -->
			<div class="col-xs-12 col-md-8">
				<div class="row pageCommon__preview-blog">
					<!-- Artículos -->
					<?php  
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'post_type'      => 'post',
							'posts_per_page' => -1,
							'category_name'  => $category->slug,
						);
						$articulos = get_posts( $args );
						if( !empty($articulos) ) : foreach( $articulos as $articulo ) :
					?>
						<!-- Articulo -->
						<article class="item-blog">

							<div class="col-xs-12 col-md-4">
								<a href="<?= get_permalink( $articulo->ID  ); ?>">
									<!-- Imagen Preview --> 
									<figure> 
										<?php 
											if( has_post_thumbnail( $articulo->ID ) ) : 
												echo get_the_post_thumbnail( $articulo->ID ,'full', array('class'=>'img-fluid') );
											else: 
										?>
											<img src="http://placekitten.com/980/874" alt="eventos-gala-eventosgala" class="img-fluid" />
										<?php endif; ?>
									</figure>
								</a>
							</div> <!-- /.col-xs-4 -->
							
							<div class="col-xs-12 col-md-8">

								<!-- Titulo -->
								<h2 class="text-capitalize"><?php _e( $articulo->post_title , LANG ); ?></h2>
								<!-- Extracto -->
								<div class="item-blog__excerpt"> 
									<?= apply_filters('the_content' , wp_trim_words( $articulo->post_content , 30 , '' ) ); ?> 
								</div> <!-- /.item-blog__excerpt -->

								<!-- Boton al articulo [derecha] -->
								<a href="<?= get_permalink( $articulo->ID  ); ?>" class="pull-xs-right btnCommon__show-more btnCommon__show-more--small"><?php _e( 'Leer más', LANG ); ?></a>
								
							</div> <!-- /.col-xs-8 -->

							<!-- Limpiar Floats --> <div class="clearfix"></div>

						</article> <!-- /.item-blog -->

					<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
				</div> <!-- /.row -->
			</div> <!-- /.col-xs-8 -->

			<!-- Aside Categorías-->
			<div class="col-xs-4 hidden-xs-down">
				<!-- Incluir template categorias -->
				<?php include( locate_template("partials/sidebar-categories.php" ) ); ?>
			</div> <!-- /.col-xs-4 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->

</main> <!-- /.pageWrapper -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Get Footer -->
<?php get_footer(); ?>