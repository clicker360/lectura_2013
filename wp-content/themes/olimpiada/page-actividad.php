<?php
/*
Template Name: Actividad
*/
?>

<?php get_header(); ?>

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

						<div class="contenedor-actividad-individual wrap clearfix">
							<div class="titulo-actividad-individual">
								<?php echo(types_render_field( "titulo-actividad", array( 'raw' => 'true'  ) ));?>
							</div>

							<div class="interior-actividad-individual clearfix">

								<div class="imagen-actividad">	<?php echo(types_render_field( "imagen-actividad", array( 'size' => 'full' ) ));?></div>
								<div class="contenido-actividad-indivudal">		

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

								</div>

								<div class="imagen-descarga"><a href="<?php echo(types_render_field( "descarga-de-la-actividad", array( 'raw' => 'true'  ) ));?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/actividad-descarga.png" ?></a></div>
							</div>
						</div>						

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
