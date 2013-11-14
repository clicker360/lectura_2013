<?php
/*
Template Name: Contenido general
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

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="contenedor-contenido-general clearfix wrap" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">									

								</header> <!-- end article header -->

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer> <!-- end article footer -->
							

							</article> <!-- end article -->

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

						</div> <!-- end #main -->
					

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

		</div>

<?php get_footer(); ?>
