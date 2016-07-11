
<!-- Si existe el post  -->
<?php if( isset($banner) ) : ?>
	
	<!-- BANNER DE LA PAGINA -->
	<section class="pageCommon__banner relative">
		<!-- Conseguir el banner por defecto -->
		<?php 
			$img_banner = get_post_meta( $banner->ID, 'input_img_banner_'.$banner->ID , true);

			$img_banner = !empty( $img_banner ) ? $img_banner : "https://placeimg.com/1920/251/any";
		?>
		<figure style='background-image: url("<?= $img_banner; ?>")'>
			<!--img src="<?= $img_banner ?>" alt="banner-nosotros-empresa-pbg" class="img-fluid hidden-xs-down" /-->
		</figure>

		<!-- Título de la pagina posicion absoluta -->
		<h2 class="pageCommon__banner__title text-capitalize container-flex align-content"> 
			<?php
				if( isset($banner_title) && !empty($banner_title) ){
				 _e(  $banner_title , LANG ); 
				}else{
				 _e(  $banner->post_title , LANG ); 
				}
			?>
		</h2>

	</section> <!-- /.pageCommon__banner -->

<?php endif; ?>