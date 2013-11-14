<?php
/*
Template Name: Preguntas Frecuentes
*/
?>

<?php get_header('dudas'); ?>

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
			
					<!-- Comienza Segmento Preguntas Frecuentes -->

						<div class="preguntas-frecuentes wrap clearfix">
							<div class="titulo-preguntas-frecuentes">
								<?php echo(types_render_field( "titulo-seccion-de-preguntas-frecuentes", array( 'raw' => 'true'  ) ));?>
							</div>

							<div class="contenedor-preguntas-frecuentes clearfix">
								<div class="contenido-preguntas-frecuentes">		

									<!-- Comienza Acordeon --> 

										<div class="ajax-loaders clearfix" id="accordion">	
											<?php
											$preguntas=get_post_meta($post->ID,'wpcf-preguntas-frecuentes');
											$respuestas=get_post_meta($post->ID,'wpcf-respuestas-frecuentes');

											$cuenta = 0;
											foreach ($preguntas as $pregunta) {
												echo '<li class="pregunta current"><span>'.$pregunta.'</span></li>';
												echo '<div class="pregunta pane" style="display: none;">'.$respuestas[$cuenta].'</div>';
												$cuenta++;
											}
											?>	
										</div>
									
									<!-- Termina Acordeon -->
								
								</div>
							</div>
						</div>						 

					<!-- Comienza Segmento Contacto -->

						<div class="contacto-preguntas-frecuentes wrap clearfix">
							<div class="interior-contacto-preguntas-frecuentes wrap">							

								<div class="titulo-contacto-preguntas-frecuentes" align="center">
									<?php echo(types_render_field( "titulo-seccion-de-contacto", array( 'size' => 'full' ) ));?>
								</div>

								<div class="form-contacto-preguntas-frecuentes">
									<?php echo do_shortcode('[contact-form-7 id="81" title="Contacto Preguntas Frecuentes"]'); ?>
								</div>
							</div>
						</div>


				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
