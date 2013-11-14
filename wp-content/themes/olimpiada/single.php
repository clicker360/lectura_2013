

<?php get_header('post'); ?>

			<div id="content" class="body-lo-nuevo">

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

						<div id="main" class="fullcol first clearfix" role="main">

							<!-- Comienza Imagen Destacada -->

							<div class="contenedor-lo-nuevo-imagen-destacada">
								<div class="lo_nuevo-imagen-destacada">
									<?php the_post_thumbnail('full', array('')); ?>
								</div>
							</div>

							<!-- Comienza contenido -->						
									
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

									<header class="article-header">								

									</header> 

									<section class="contenido-lo-nuevo wrap clearfix">
										<?php the_content(); ?>
									</section> 

									<footer class="article-header">
										<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?></p>
									</footer>

								
								</article> 

							<?php endwhile; ?>

							<?php else : ?>

								<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
								
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
								
									<footer class="article-footer">
										<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
									</footer>
									</article>

							<?php endif; ?>


								</div>


						</div> <!-- end #main -->
					

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
