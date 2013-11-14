<?php
/*
Template Name: Para los profesores
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

		<!-- Comienzan Imagenes Superior e Inferior -->

			<div class="imagen-top" align="center" >
			
				<?php echo(types_render_field( "imagen-superior-profesores", array( 'size' => 'full' ) ));?>								
			
			</div>

				

		<!-- Comienza Contenido -->

			<div id="main" class="fullcol first clearfix" role="main"> <!-- Contenedor Principal -->

				<div id="inner-content" class="wrap clearfix">	<!-- Contenedor Interno -->						
								
					<!-- Comienzan Actividades Sugeridas -->

						<div class="contenedor-actividades-sugeridas wrap">
							
					
							<div class="titulo-actividades-sugeridas">
					
								<?php echo(types_render_field( "titulo-actividades-sugeridas", array( 'raw' => 'true'  ) ));?>							
					
							</div>
					
							<div class="actividades-sugeridas">
					
								<div class="contenedor-actividades-sugeridas-izquierdo sugeridas" align="center">
					
									<a href="<?php echo(types_render_field( "actividad-sugerida-1", array( 'raw' => 'true'  ) ));?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-actividad1.png" ?></a>
					
									<a href="<?php echo(types_render_field( "actividad-sugerida-2", array( 'raw' => 'true'  ) ));?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-actividad2.png" ?></a>
					
									<a href="<?php echo(types_render_field( "actividad-sugerida-3", array( 'raw' => 'true'  ) ));?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-actividad3.png" ?></a>
					
								</div>
					
								<div class="contenedor-actividades-sugeridas-derecho sugeridas" align="center">
					
									<a href="<?php echo(types_render_field( "actividad-sugerida-4", array( 'raw' => 'true'  ) ));?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-actividad4.png" ?></a>
					
									<a href="<?php echo(types_render_field( "actividad-sugerida-5", array( 'raw' => 'true'  ) ));?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-actividad5.png" ?></a>
					
									<a href="<?php echo(types_render_field( "actividad-sugerida-6", array( 'raw' => 'true'  ) ));?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/boton-actividad6.png" ?></a>
					
								</div>
					
							</div>
					
						</div>

						<div class="imagen-footer">			
							<?php echo(types_render_field( "imagen-inferior-profesores", array( 'size' => 'full' ) ));?>
						</div>		

				

					<!-- Comienza contenedor general -->

					
					

			
				</div> <!-- Contenido Principal -->	
			
			</div>


	</div> <!-- Contenedor General -->

	<!-- Comienza Footer -->

	<?php get_footer(); ?>
