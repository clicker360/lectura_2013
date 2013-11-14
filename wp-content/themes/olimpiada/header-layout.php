<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Olimpiada de Lectura</title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
                <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery-validate.min.js"></script>                
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

		<!--  <script>
		    jQuery(window).load(function(){
		      jQuery("#menu-contenedor").sticky({ topSpacing: 0, center:true, className:"hey" });
		      url=window.location.href;
		      jQuery(".menu a[href='"+url+"']").addClass(".activo");

		    });


		  </script> -->
		<script type="text/javascript">
			var $ = jQuery.noConflict();
		</script>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<!-- Comienza Header Logos -->
					<div class="cabecera-logos fullcol clearfix">
						<div class="wrap">
							<div class="cincocol first logos-header" align="center">
								<a href="http://www.fundacion-sm.org.mx/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/fundacion-sm-logo.png" ?></a>
							</div>

							<div class="cincocol first logos-header" align="center">
								<a href="http://www.cc.org.mx/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/consejo-logo.png" ?></a>
							</div>

							<div class="cincocol first logos-header" align="center">
								<a href="http://www.fundaciontelevisa.org/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/televisa-logo.png" ?></a>
							</div>

							<div class="cincocol first logos-header" align="center">
								<a href="http://www.sep.gob.mx/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/sep-logo.png" ?></a>    
							</div>
							
							<div class="cincocol first logos-header" align="center">
								<a href="http://lectura.dgme.sep.gob.mx/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/programa-lectura-logo.png" ?></a>
							</div>
							
							
							
						</div>
					</div>

				<!-- Comienza Header -->

					<div class="slider-header fullcol clearfix">
						<div class="contenedor-slider fullcol wrap">
							<div class="imagen-slider">
								<!-- <img src="<?php echo get_template_directory_uri(); ?>/library/images/slider.jpg" ?>-->
							</div>
							<div class="logo-slider" align="center">
								<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-header.png" ?></a>
							</div>
							<div class="registrate-slider">
								<a href="<?php echo home_url(); ?>/registro" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/registrate.png" ?></a>
							</div>
							<div class="sesion-slider">
								<a href="<?php echo home_url(); ?>/concurso/login" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/inicio-sesion.png" ?></a>
							</div>

							<!-- Comienza Pajarito -->

								<div class="pajarito-home">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/ave2.png" ?>
								</div>

						</div>
					</div>




				<!-- Comienza Menu -->
					
					<!--<div class="contenedor-menu fullcol clearfix" id="menu-contenedor">
						<div class="contenedor-menu-interior wrap clearfix">
							<nav role="navigation">
								<?php bones_main_nav(); ?>
							</nav>
						</div>				

					</div>-->				

			<div id="inner-header" class="wrap clearfix">
			</div> <!-- end #inner-header -->

		</header> <!-- end header --><!-- Header Fin-->
