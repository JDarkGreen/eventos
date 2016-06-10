<?php /* Incluir banner de promocion */ ?>

<!-- Sección Promociones -->
<section class="pageInicio__promocion relative">
	<!-- Extraer Una promocion ramdom -->
	<?php  
		$args = array(
			'orderby'        => 'rand', 
			'post_status'    => 'publish',
			'post_type'      => 'promocion',
			'posts_per_page' => 1,
		);
		$promociones = get_posts( $args );
		$promocion   = $promociones[0];
		
		/* Extraer Imagen */
		$image = get_the_post_thumbnail( $promocion->ID ,'full', array('class'=>'img-fluid') );
		if( !empty($image) ) : echo $image; endif;
	?> 
	<!-- Contenido -->
	<div class="content-promocion">
		<!-- Título --> <h2 class=""><?php _e( $promocion->post_title , LANG ); ?></h2>
		<!-- Botón Ver más  --> <a href="#" class="btnCommon__show-more btnCommon__show-more--small"><?php _e('Ver más' , LANG ); ?></a>
	</div> <!-- /.content-promocion -->

</section> <!-- /.pageInicio__promocion -->