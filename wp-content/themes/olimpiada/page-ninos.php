<?php
/*
Template Name: Para los niños
*/
?>

<?php get_header('circular');?>

	<div id="content"> <!-- Contenedor General -->

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

					<!-- Comienzan Descargas -->

						<div class="contenedor-ninos wrap clearfix" align="center">
							<div class="boton-descarga-ninos">
								<a href="<?php echo(types_render_field( "liga-de-la-descarga", array( 'raw' => 'true'  ) ));?>", target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-descarga.png" ?></a>
							</div>
							<div class="contenedor-imagen-ninos">
								<?php echo(types_render_field( "vista-previa-descarga", array( 'size' => 'full' ) ));?>
							</div>
							
							<div class="titulo-ninos">
								<?php echo(types_render_field( "titulo-de-la-descarga", array( 'raw' => 'true'  ) ));?>
							</div>
							
						</div>	

					<!-- Comienzan Descargas -->

						<div class="contenedor-ninos wrap clearfix" align="center">
							<div class="boton-descarga-ninos">
								<a href="<?php echo(types_render_field( "liga-de-la-descarga2", array( 'raw' => 'true'  ) ));?>", target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-descarga.png" ?></a>
							</div>
							<div class="contenedor-imagen-ninos">
								<?php echo(types_render_field( "vista-previa-descarga2", array( 'size' => 'full' ) ));?>
							</div>
							
							<div class="titulo-ninos">
								<?php echo(types_render_field( "titulo-de-la-descarga2", array( 'raw' => 'true'  ) ));?>
							</div>
							
						</div>			

					<!-- Comienzan Descargas -->

						<div class="contenedor-ninos wrap clearfix" align="center">
							<div class="boton-descarga-ninos">
								<a href="<?php echo(types_render_field( "liga-de-la-descarga3", array( 'raw' => 'true'  ) ));?>", target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-descarga.png" ?></a>
							</div>
							<div class="contenedor-imagen-ninos">
								<?php echo(types_render_field( "vista-previa-descarga3", array( 'size' => 'full' ) ));?>
							</div>
							
							<div class="titulo-ninos">
								<?php echo(types_render_field( "titulo-de-la-descarga3", array( 'raw' => 'true'  ) ));?>
							</div>
							
						</div>


				</div> <!-- end #inner-content -->



	</div> <!-- Contenedor General -->

	<!-- Comienza Footer -->

	<?php get_footer(); ?>
