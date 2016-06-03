<?php  
	// The Query
	$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_status'    => 'publish',
		'post_type'      => 'banner',
		'posts_per_page' => -1,
	);

	$the_query = new WP_Query( $args );

	//Control Loop
	$i = $j = 0;

	// The Loop
	if ( $the_query->have_posts() ) : 

?>

<!-- Contenedor de bannner   -->
<section id="carousel-home" class="pageInicio__slider carousel slide" data-ride="carousel">

	<ol class="carousel-indicators">
	<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
  	<li data-target="#carousel-home" data-slide-to="<?= $j ?>" class="<?= $j == 0 ? 'active' : '' ?>"></li>
	<?php $j++; endwhile; wp_reset_postdata(); ?>
  </ol> <!-- /.carousel-indicators -->

	<!-- Wrapper for Carousel -->
	<div class="carousel-inner" role="listbox">

		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
	    <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
	    	<?php if( has_post_thumbnail() ) : the_post_thumbnail('full',array('class'=>'img-fluid')); ?>
	    	<?php endif; ?>

	    	<!-- Caption o Información -->
				<div class="carousel-caption">
    			<!-- Título -->
    			<?php 
    				$title    = explode(" ", get_the_title() );
    				$title1   = array_slice( $title , 0 , 2 ) ;
    				$title2   = array_slice( $title , 2 ) ;
    			?>
    			<h3><?= implode(" ", $title1 ) ?> <span><?= implode(" ", $title2 ) ?></span> </h3>
  			</div>	<!-- /.carousel-caption -->    

	    </div> <!-- /.arousel-item -->
  	<?php $i++; endwhile; wp_reset_postdata(); ?>

  </div> <!-- /.carousel-inner -->

</section> <!-- /.carousel-home -->


<?php endif; wp_reset_postdata(); ?>

