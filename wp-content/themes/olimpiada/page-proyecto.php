<?php
/*
Template Name: Un proyecto
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

		<!-- Comienza Contenedor 4 Imagenes -->
			
			<div class="contenedor-cuatro-imagenes fullcol clearfix">
				
				<div class="cuatro-imagenes wrap">
				
					<div class="cuatro-imagenes-a unodedos first wrap" align="center">
				
						<?php echo(types_render_field( "un-proyecto-cuatro-imagenes-a", array( 'size' => 'full' ) ));?>								
				
					</div>
				
					<div class="cuatro-imagenes-b unodedos first wrap" align="center">
				
						<?php echo(types_render_field( "un-proyecto-cuatro-imagenes-b", array( 'size' => 'full' ) ));?>								
				
					</div>
				
					<div class="cuatro-imagenes-c unodedos first wrap" align="center">
				
						<?php echo(types_render_field( "un-proyecto-cuatro-imagenes-c", array( 'size' => 'full' ) ));?>								
				
					</div>
				
					<div class="cuatro-imagenes-d unodedos first wrap" align="center">
				
						<?php echo(types_render_field( "un-proyecto-cuatro-imagenes-d", array( 'size' => 'full' ) ));?>								
				
					</div>
				
				</div>
			
			</div>

		<!-- Comienza Contenedor 1 Imagen -->
			
			<div class="contenedor-una-imagen  wrap clearfix">
			
				<div class="una-imagen wrap" align="center">
					<div class="imagen-una-imagen">
					<?php echo(types_render_field( "un-proyecto-una-imagen", array( 'size' => 'full' ) ));?>
				</div>
			
				</div>
			
			</div>

		<!-- Comienza Contenido -->

			<div id="inner-content" class="wrap clearfix"> <!-- Contenedor Interno -->

				<div id="main" class="fullcol first clearfix" role="main"> <!-- Contenedor Principal -->		

					<!-- Comienza contenedor general -->

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
						
								<h1 class="page-title" itemprop="headline"></h1>
						
							</header>

							<section class="contenido-general-sin-fondo clearfix" itemprop="articleBody">						
							
								 <?php the_content(); ?>
											
							</section> 

							<footer class="article-footer">
							
								<?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?>

							</footer> 

								
						</article> 

						<!-- Comienza Mensaje Cuando NO HAY CONTENIDO -->

							<?php endwhile; else : ?>

							<article id="post-not-found" class="hentry clearfix">
							
								<header class="article-header">
							
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
							
								</header>
								
								<section class="entry-content">
									
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								
								</section>
								
								<footer class="article-footer">
								
									<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
								
								</footer>
							
							</article>

							<?php endif; ?>

							<!-- Comienza Tabla Actividades -->

						<!--	<div class="contenedor-actividades wrap">
							<div class="titulo-actividades">
								<?php echo(types_render_field( "titulo-del-calendario", array( 'raw' => 'true'  ) ));?>
								<div class="boton-descarga">
									<a href="<?php echo(types_render_field( "boton-de-descarga", array( 'raw' => 'true'  ) ));?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/descarga.png" ?></a>
								</div>
							</div>

							<div class="actividades-interior">
								<div class="actividad actgrid clearfix"><img src="http://dev.clicker360.com/lectura/wp-content/uploads/2013/09/n1.png"><div class="texto-actividad"><?php echo(types_render_field( "actividad-1", array( 'raw' => 'true'  ) ));?></div></div>
								<div class="descripcion actgrid clearfix"><?php echo(types_render_field( "descripcion-1", array( 'raw' => 'true'  ) ));?></div>
								<div class="actividad actgrid clearfix"><img src="http://dev.clicker360.com/lectura/wp-content/uploads/2013/09/n2.png"><div class="texto-actividad"><?php echo(types_render_field( "actividad-2", array( 'raw' => 'true'  ) ));?></div></div>
								<div class="descripcion actgrid clearfix"><?php echo(types_render_field( "descripcion-2", array( 'raw' => 'true'  ) ));?></div>
								<div class="actividad actgrid clearfix"><img src="http://dev.clicker360.com/lectura/wp-content/uploads/2013/09/n3.png"><div class="texto-actividad"><?php echo(types_render_field( "actividad-3", array( 'raw' => 'true'  ) ));?></div></div>
								<div class="descripcion actgrid clearfix"><?php echo(types_render_field( "descripcion-3", array( 'raw' => 'true'  ) ));?></div>
								<div class="actividad actgrid clearfix"><img src="http://dev.clicker360.com/lectura/wp-content/uploads/2013/09/n4.png"><div class="texto-actividad"><?php echo(types_render_field( "actividad-4", array( 'raw' => 'true'  ) ));?></div></div>
								<div class="descripcion actgrid clearfix"><?php echo(types_render_field( "descripcion-4", array( 'raw' => 'true'  ) ));?></div>
								<div class="actividad actgrid clearfix"><img src="http://dev.clicker360.com/lectura/wp-content/uploads/2013/09/n5.png"><div class="texto-actividad"><?php echo(types_render_field( "actividad-5", array( 'raw' => 'true'  ) ));?></div></div>
								<div class="descripcion actgrid clearfix"><?php echo(types_render_field( "descripcion-5", array( 'raw' => 'true'  ) ));?></div>
								<div class="actividad actgrid clearfix"><img src="http://dev.clicker360.com/lectura/wp-content/uploads/2013/09/n6.png"><div class="texto-actividad"><?php echo(types_render_field( "actividad-6", array( 'raw' => 'true'  ) ));?></div></div>
								<div class="descripcion actgrid clearfix"><?php echo(types_render_field( "descripcion-6", array( 'raw' => 'true'  ) ));?></div>
								<div class="actividad actgrid clearfix"><img src="http://dev.clicker360.com/lectura/wp-content/uploads/2013/09/n7.png"><div class="texto-actividad"><?php echo(types_render_field( "actividad-7", array( 'raw' => 'true'  ) ));?></div></div>
								<div class="descripcion actgrid clearfix"><?php echo(types_render_field( "descripcion-7", array( 'raw' => 'true'  ) ));?></div>
							</div>
						</div> -->

						</div> <!-- Contenido Principal -->

			</div> <!-- Contenedor Interno -->

		</div> <!-- Contenedor General -->

	<!-- Comienza Footer -->

	<?php get_footer(); ?>
