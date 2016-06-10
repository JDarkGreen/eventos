
<!-- Extraer opciones  -->
<?php $options = get_option('theme_custom_settings'); ?>
	
	<!-- Footer -->
	<footer class="mainFooter">

		<div class="container">

			<div class="row">

				<!-- Logo -->
				<div class="col-xs-3">
					<h1 class="logo">
						<a href="<?= site_url() ?>">
							<?php if( !empty($options['logo']) ) : ?>
								<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
							<?php else: ?>
								<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
							<?php endif; ?>
						</a>
					</h1> <!-- /.lgoo -->	
				</div> <!-- /.col-xs-3 -->

				<!-- Información -->
				<div class="col-xs-3 text-justify">
					<!-- Extrar la data de la opcion text nosotros -->
					<?php 
						if( isset($options['widget_footer']) && !empty($options['widget_footer']) ) :  echo apply_filters('the_content' , $options['widget_footer'] );
						else: 
							echo apply_filters('the_content' , "Actualizando Contenido." );
						endif;
					?>
				</div> <!-- /.col-xs-3 -->
				
				<!-- Nuestros Servicios -->
				<div class="col-xs-3">
					<!-- Título --> <h2 class="pageCommon__section-subtitle"> <?php _e('Nuestros Servicios' , LANG ); ?></h2>
					<!-- Contenido -->
					<?php 
						if( isset($options['widget_footer_service']) && !empty($options['widget_footer_service']) ) :  echo apply_filters('the_content' , $options['widget_footer_service'] );
						else: 
							echo apply_filters('the_content' , "Actualizando Contenido." );
						endif;
					?>
				</div> <!-- /.col-xs-3 -->
				
				<!-- Contactos -->
				<div class="col-xs-3">
					<!-- Título --> <h2 class="pageCommon__section-subtitle"> <?php _e('Contáctanos' , LANG ); ?></h2>

					<!-- Contenido Lista Datos -->
					<ul class="mainFooter__list-data">

						<!-- Telefono -->
						<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) : ?>
							<li> <!-- Icono --> <i class="fa fa-mobile" aria-hidden="true"></i>
							<?= $options['contact_tel']; ?>
							</li>
						<?php endif; ?>

						<!-- Mensaje -->
						<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?>
							<li> <!-- Icono --> <i class="fa fa-envelope-o" aria-hidden="true"></i>
							<?= $options['contact_email']; ?>
							</li>
						<?php endif; ?>

						<!-- Ubicación -->
						<?php if( isset($options['contact_address']) && !empty($options['contact_address']) ) : ?>
							<li> <!-- Icono --> <i class="fa fa-map-marker" aria-hidden="true"></i>
							<?= $options['contact_address']; ?>
							</li>
						<?php endif; ?>

					</ul> <!-- /.mainFooter__list-data -->

					<!-- Texto Web -->
					<a href="<?= site_url(); ?>" class="text-web">www.<span>GalaEventos</span>.com</a>

					<!-- Redes Sociales color blanco -->
					<ul class="social-links social-links--white">
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

				</div> <!-- /.col-xs-3 -->

			</div> <!-- /.row -->

		</div> <!-- /.container -->

		<!-- Sección Desarrollador  -->
		<section class="mainFooter__developer">
			<div class="container">
				<?= date('Y'); ?> <a target="_blank" href="http://ingenioart.com/">Ingenioart.com</a>				
			</div> <!-- /.container -->
		</section> <!-- /.mainFooter__developer -->

	</footer><!-- /.mainFooter -->

	</div> <!-- /#sb-slidebar -->

	<?php wp_footer(); ?>

	<script> var url = "<?= THEMEROOT ?>"; </script>
</body>
</html>

