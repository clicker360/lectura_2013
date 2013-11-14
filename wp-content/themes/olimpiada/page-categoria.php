<?php
/*
Template Name: Categoria - Fondos Claros
*/
?>

<?php get_header('post'); ?>

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

		<!-- Comienza Contenido -->		

		
			<div id="main" class="fullcol first clearfix" role="main"> <!-- Contenedor Principal -->

				<div id="inner-content" class="wrap clearfix">	<!-- Contenedor Interno -->						
								
					<!-- Comienzan Llamado de Posts -->

						<div class="contenedor-post-individual">

							<?php $idcat = types_render_field( "id-categoria", array( "raw" => "true"  ) );?>
							
								<?php
									query_posts('cat='.$idcat);
									if (have_posts()) : while (have_posts()) : the_post(); ?>																		

										<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

											<div class="imagen-post-individual first unodedos">
											
												<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
											
											</div>

														
											<div class="titulo-post-individual dosdedos">
											
												<h3 class="h2"><?php the_title(); ?></h3> 
											
											</div>

											<div class="fecha-post-individual dosdedos">
											
												<p ><?php the_time('j F Y')?></p>
											
											</div>

											<div class="contenido-post-individual dosdedos">
											
												<?php the_excerpt( '<span class="read-more">'  . __( 'VER MÁS;', 'bonestheme' ) . '</span>' ); ?>
											
											</div>			

													
										</article> <!-- end article -->

										<?php endwhile; ?>

									<?php endif; ?>
						</div>
				</div>
			
			</div>

									

					<!-- Comienza contenedor general -->

					<!-- Comienza List de Post -->

								<div class="contenedor-post-individual">
																	


				
					
						

			
				</div> <!-- Contenido Principal -->	
			
			</div>


	</div> <!-- Contenedor General -->

	<!-- Comienza Footer -->

	<?php get_footer(); ?>
