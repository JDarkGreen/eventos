<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
	<?php 
		$options = get_option('theme_custom_settings'); 
		global $post;

		//Comprobar si esta desplegada la barra de Navegación
		$admin_bar = is_admin_bar_showing() ? 'mainHeader__active' : '';
	?>

<!-- Header -->
<main class="mainHeader">
	<!-- Sección Datos -->
	<section class="mainHeader__info">
		<div class="container">

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

			<!-- Teléfonos -->
			<p class="pull-right">
				<?php 
					if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) : 
						echo 'T. ' . $options['contact_tel'];
					endif; 
				?>
			</p> <!-- /.pull-right -->

			<!-- Limpiar Floats --> <div class="clearfix"></div>
		</div> <!-- /.container -->

	</section> <!-- /.mainHeader__info -->

	<!-- Navegación Principal -->
	<nav class="mainNavigation text-uppercase">
		<div class="container">

			<div class="mainNavigation__content">
				<!-- Menu Principal Lado Izquierdo -->
				<?php wp_nav_menu(
					array(
						'menu_class'     => 'main-menu text-center',
						'theme_location' => 'main-menu-left'
					));
				?>

				<!-- Logo Principal -->
				<h1 class="logo">
					<a href="<?= site_url() ?>">
						<?php if( !empty($options['logo']) ) : ?>
							<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
						<?php else: ?>
							<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
						<?php endif; ?>
					</a>
				</h1> <!-- /.lgoo -->		

				<!-- Menu Principal Lado Derecho -->
				<?php wp_nav_menu(
					array(
						'menu_class'     => 'main-menu text-center',
						'theme_location' => 'main-menu-right'
					));
				?>		
				
			</div> <!-- /.mainNavigation__content container-flex align-content -->
		</div> <!-- /.container -->
	</nav> <!-- /.mainNavigation -->
</main> <!-- /.mainHeader -->



<!-- Flecha Indicador hacia arriba -->
<a href="#" id="arrow-up-page"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<!-- Contenedor version mobile libreria sliderbar js -->
<div id="sb-site" class="">








