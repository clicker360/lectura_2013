<?php
/*
Template Name: Contácto
*/
?>

<?php get_header('contacto'); ?>

			<div id="content">

		<!-- Comienza Fondo Personalizado -->

			<style type="text/css">

				#content{
				
					background: url(<?php echo(types_render_field( "fondo-personalizado", array( 'raw' => 'true'  ) ));?>) repeat;
				
				}

			</style>


		<!-- Comienza Fondo Banner -->

		<style type="text/css">

				.baner-titulo{
				
					background-color:<?php echo (types_render_field( "color-banner", array( 'raw' => 'true'  ) ));?>; 
				
				}

		</style>

		<!-- Comienza Banner de Titulo -->

			<div class="baner-titulo fullcol">
			
				<div class="baner-interior wrap">
			
						<?php echo(types_render_field( "titulo-personalizado-paginas", array( 'size' => 'full' ) ));?>
			
				</div>
			</div>

				<div id="inner-content" class="wrap clearfix">

					<!-- Comienza Informacion Contacto -->

						<div class="informacion-contacto wrap clearfix">
							<div class="interior-informacion-contacto wrap">
								
								<div class="fondo-contacto">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/fondo-contacto.png"?> 							
								</div>

								<div class="logo-informacion-contacto" align="center">
									<?php echo(types_render_field( "logo-del-contacto", array( 'size' => 'full' ) ));?>
								</div>			
									
								<div class="texto-informacion-contacto">
									<p> <?php echo(types_render_field( "texto-seccion-de-contacto", array( 'raw' => 'true'  ) ));?></p>
								</div>	
								
								<div class="correo-informacion-contacto">
									<p> <?php echo(types_render_field( "correo-del-contacto", array( 'raw' => 'true'  ) ));?></p>
								</div>									

							</div>
						</div>

					<!-- Termina Segmento Contacto -->

					<!-- Comienza Segmento Redes Sociales -->

						<div class="redes-sociales-contacto wrap clearfix">
							<div class="titulo-social-contacto">
								<?php echo(types_render_field( "titulo-redes-sociales", array( 'raw' => 'true'  ) ));?>
							</div>

							<div class="contenido-social-contacto clearfix">

								<div class="contacto-social-empresa trescol clearfix">
									<div class="contacto-logo" align="center">
										<?php echo(types_render_field( "logo-empresa-1", array( 'size' => 'full' ) ));?>
									</div>
									<div class="contacto-facebook seiscol" align="right">
										<a href="<?php echo(types_render_field( "liga-facebook-empresa-1", array( 'raw' => 'true'  ) ));?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/facebook.png"?></a>	
									</div>
									<div class="contacto-twitter seiscol" align="left">
								<!--		<a href="<?php echo(types_render_field( "liga-twitter-empresa-1", array( 'raw' => 'true'  ) ));?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/twitter.png"?></a>	-->
									</div>
								</div>

								<div class="contacto-social-empresa trescol clearfix">
									<div class="contacto-logo" align="center">
										<?php echo(types_render_field( "logo-empresa-2", array( 'size' => 'full' ) ));?>
									</div>
									<div class="contacto-facebook seiscol" align="right">
										<a href="<?php echo(types_render_field( "liga-facebook-empresa-2", array( 'raw' => 'true'  ) ));?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/facebook.png"?></a>	
									</div>
									<div class="contacto-twitter seiscol" align="left">
										<a href="<?php echo(types_render_field( "liga-twitter-empresa-2", array( 'raw' => 'true'  ) ));?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/twitter.png"?></a>	
									</div>
								</div>

								<div class="contacto-social-empresa trescol clearfix">
									<div class="contacto-logo" align="center">
										<?php echo(types_render_field( "logo-empresa-3", array( 'size' => 'full' ) ));?>
									</div>
									<div class="contacto-facebook seiscol" align="right">
										<a href="<?php echo(types_render_field( "liga-facebook-empresa-3", array( 'raw' => 'true'  ) ));?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/facebook.png"?></a>	
									</div>
									<div class="contacto-twitter seiscol" align="left">
										<a href="<?php echo(types_render_field( "liga-twitter-empresa-3", array( 'raw' => 'true'  ) ));?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/twitter.png"?></a>	
									</div>
								</div>
							</div>									
						</div>

					<!-- Termina Segmento Redes Sociales -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
