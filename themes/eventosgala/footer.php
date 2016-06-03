
<!-- Extraer opciones  -->
<?php $options = get_option('theme_custom_settings'); ?>
	
	<!-- Footer -->
	<footer class="mainFooter">
		<div class="container">
			<div class="row container-flex align-content">

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
				<div class="col-xs-3">
					
				</div> <!-- /.col-xs-3 -->
				
				<!-- Nuestros Servicios -->
				<div class="col-xs-3">
					
				</div> <!-- /.col-xs-3 -->
				
				<!-- Contactos -->
				<div class="col-xs-3">
					
				</div> <!-- /.col-xs-3 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</footer><!-- /.mainFooter -->

	</div> <!-- /#sb-slidebar -->

	<?php wp_footer(); ?>

	<script> var url = "<?= THEMEROOT ?>"; </script>
</body>
</html>

