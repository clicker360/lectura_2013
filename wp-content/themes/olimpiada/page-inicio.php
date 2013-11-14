<?php
/*
Template Name: Inicio
*/
?>

<?php get_header('home');?>
<script type="text/javascript">
    $.post('<?php echo get_bloginfo('url').'/concurso/registro'; ?>',function(data){
        $('#box-reg').html(data)
        //alert(data)
    });
</script>

	<div id="content"> <!-- Contenedor General -->

		<!-- Comienza Fondo Personalizado -->

		<style type="text/css">

				#content{
				
					background: url(<?php echo (types_render_field( "fondo-personalizado", array( 'raw' => 'true'  ) ));?>) repeat;
				
				}

		</style>

		<!-- Comienza Banner de Titulo -->

			<div class="baner-titulo fullcol">
			
				<div class="baner-interior wrap">
			
						<?php echo(types_render_field( "titulo-personalizado-paginas", array( 'size' => 'full' ) ));?>
			
				</div>
			
			</div>

		<!-- Comienza Contenido -->

			<div id="inner-content" class="wrap clearfix"> <!-- Contenedor Interno -->

				<div id="main" class="eightcol first clearfix" role="main"> <!-- Contenedor Principal -->

				<!-- Comienza Video Vimeo -->

					<div class="video-home fullcol clearfix">						
						
							<iframe src="//player.vimeo.com/video/<?php echo(types_render_field( "video-vimeo", array( 'raw' => 'true'  ) ));?>?portrait=0&amp;badge=0&amp;color=ffffff"
								
								width="100%" height="400px" frameborder="0"
							
								webkitallowfullscreen mozallowfullscreen allowfullscreen>
						
							</iframe>
					
					</div>

				<!-- Comienza Segmento Proyecto -->

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<!-- Comienza Titulo Proyecto -->

							<header class="article-header">

								<div class="titulo-proyecto">	

									<h1 class="page-title">	

										<?php echo(types_render_field( "titulo-del-proyecto", array( 'raw' => 'true'  ) ));?>

									</h1>

								</div>

							</header> 

						<!-- Comienza Descripcion del Proyecto -->	

							<section class="contenido-proyecto clearfix" itemprop="articleBody">									
										
								<p> <?php echo(types_render_field( "descripcion-del-proyecto", array( 'raw' => 'true'  ) ));?></P>
																		
							</section> 

							<footer class="article-footer">
							
								<p class="clearfix"><?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

							</footer> 

						</article> 

						<!-- Comienza contenedor general -->

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
						
								<h1 class="page-title" itemprop="headline"></h1>
						
							</header>

							<section class="contenido-general clearfix" itemprop="articleBody">						
							
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

						</div> <!-- Contenido Principal -->

						<?php get_sidebar(); ?>

			</div> <!-- Contenedor Interno -->

		</div> <!-- Contenedor General -->

	<!-- Comienza Footer -->

	<?php get_footer(); ?>
