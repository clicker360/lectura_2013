<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type.php' ); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'bones-thumb-900', 600, 450, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'bonestheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!


/************* REGISTROS NUEVOS CAMPOS *****************/

function tml_user_register($user_id) {
   if (!empty($_POST['first_name']))
       add_user_meta($user_id, 'first_name', $_POST['first_name']);
   if (!empty($_POST['last_name']))
       add_user_meta($user_id, 'last_name', $_POST['last_name']);
   if (!empty($_POST['codigo_postal']))
       add_user_meta($user_id, 'codigo_postal', $_POST['codigo_postal']);
   if (!empty($_POST['estado']))
       add_user_meta($user_id, 'estado', $_POST['estado']);
   if (!empty($_POST['pais']))
       add_user_meta($user_id, 'pais', $_POST['pais']);
   if (!empty($_POST['sexo']))
       add_user_meta($user_id, 'sexo', $_POST['sexo']);
   if (!empty($_POST['ano_nacimiento']))
       add_user_meta($user_id, 'ano_nacimiento', $_POST['ano_nacimiento']);



   if (!empty($_POST['user_nombre']))
       add_user_meta($user_id, 'user_nombre', $_POST['user_nombre']);
   if (!empty($_POST['user_login']))
       add_user_meta($user_id, 'user_login', $_POST['user_login']);
    if (!empty($_POST['user_escuela']))
       add_user_meta($user_id, 'user_escuela', $_POST['user_escuela']);
    if (!empty($_POST['user_email']))
       add_user_meta($user_id, 'user_email', $_POST['user_email']);
    if (!empty($_POST['user_estado']))
       add_user_meta($user_id, 'user_estado', $_POST['user_estado']);



   if (!empty($_POST['user_profesor']))
       add_user_meta($user_id, 'user_profesor', $_POST['user_profesor']);
   if (!empty($_POST['user_telefono']))
       add_user_meta($user_id, 'user_telefono', $_POST['user_telefono']);



   if (!empty($_POST['user_centroescolar']))
       add_user_meta($user_id, 'user_centroescolar', $_POST['user_centroescolar']);
   if (!empty($_POST['user_domicilio']))
       add_user_meta($user_id, 'user_domicilio', $_POST['user_domicilio']);
   if (!empty($_POST['user_cct']))
       add_user_meta($user_id, 'user_cct', $_POST['user_cct']);
   if (!empty($_POST['user_horario']))
       add_user_meta($user_id, 'user_horario', $_POST['user_horario']);
   if (!empty($_POST['user_director']))
       add_user_meta($user_id, 'user_director', $_POST['user_director']);
   if (!empty($_POST['user_emaildirector']))
       add_user_meta($user_id, 'user_emaildirector', $_POST['user_emaildirector']);



   if (!empty($_POST['user_circulo']))
       add_user_meta($user_id, 'user_circulo', $_POST['user_circulo']);
   if (!empty($_POST['user_integrantes']))
       add_user_meta($user_id, 'user_integrantes', $_POST['user_integrantes']);



   if (!empty($_POST['user_nombrealumno1']))
       add_user_meta($user_id, 'user_nombrealumno1', $_POST['user_nombrealumno1']);
   if (!empty($_POST['user_gradoalumno1']))
       add_user_meta($user_id, 'user_gradoalumno1', $_POST['user_gradoalumno1']);
   if (!empty($_POST['user_edadalumno1']))
       add_user_meta($user_id, 'user_edadalumno1', $_POST['user_edadalumno1']);
   if (!empty($_POST['user_generoalumno1']))
       add_user_meta($user_id, 'user_generoalumno1', $_POST['user_generoalumno1']);



   if (!empty($_POST['user_nombrealumno2']))
       add_user_meta($user_id, 'user_nombrealumno2', $_POST['user_nombrealumno2']);
   if (!empty($_POST['user_gradoalumno2']))
       add_user_meta($user_id, 'user_gradoalumno2', $_POST['user_gradoalumno2']);
   if (!empty($_POST['user_edadalumno2']))
       add_user_meta($user_id, 'user_edadalumno2', $_POST['user_edadalumno2']);
   if (!empty($_POST['user_generoalumno2']))
       add_user_meta($user_id, 'user_generoalumno2', $_POST['user_generoalumno2']);



   if (!empty($_POST['user_nombrealumno3']))
       add_user_meta($user_id, 'user_nombrealumno3', $_POST['user_nombrealumno3']);
   if (!empty($_POST['user_gradoalumno3']))
       add_user_meta($user_id, 'user_gradoalumno3', $_POST['user_gradoalumno3']);
   if (!empty($_POST['user_edadalumno3']))
       add_user_meta($user_id, 'user_edadalumno3', $_POST['user_edadalumno3']);
   if (!empty($_POST['user_generoalumno3']))
       add_user_meta($user_id, 'user_generoalumno3', $_POST['user_generoalumno3']);



   if (!empty($_POST['user_nombrealumno4']))
       add_user_meta($user_id, 'user_nombrealumno4', $_POST['user_nombrealumno4']);
   if (!empty($_POST['user_gradoalumno4']))
       add_user_meta($user_id, 'user_gradoalumno4', $_POST['user_gradoalumno4']);
   if (!empty($_POST['user_edadalumno4']))
       add_user_meta($user_id, 'user_edadalumno4', $_POST['user_edadalumno4']);
   if (!empty($_POST['user_generoalumno4']))
       add_user_meta($user_id, 'user_generoalumno4', $_POST['user_generoalumno4']);



   if (!empty($_POST['user_nombrealumno5']))
       add_user_meta($user_id, 'user_nombrealumno5', $_POST['user_nombrealumno5']);
   if (!empty($_POST['user_gradoalumno5']))
       add_user_meta($user_id, 'user_gradoalumno5', $_POST['user_gradoalumno5']);
   if (!empty($_POST['user_edadalumno5']))
       add_user_meta($user_id, 'user_edadalumno5', $_POST['user_edadalumno5']);
   if (!empty($_POST['user_generoalumno5']))
       add_user_meta($user_id, 'user_generoalumno5', $_POST['user_generoalumno5']);



   if (!empty($_POST['user_nombrealumno6']))
       add_user_meta($user_id, 'user_nombrealumno6', $_POST['user_nombrealumno6']);
   if (!empty($_POST['user_gradoalumno6']))
       add_user_meta($user_id, 'user_gradoalumno6', $_POST['user_gradoalumno6']);
   if (!empty($_POST['user_edadalumno6']))
       add_user_meta($user_id, 'user_edadalumno6', $_POST['user_edadalumno6']);
   if (!empty($_POST['user_generoalumno6']))
       add_user_meta($user_id, 'user_generoalumno6', $_POST['user_generoalumno6']);



   if (!empty($_POST['user_nombrealumno7']))
       add_user_meta($user_id, 'user_nombrealumno7', $_POST['user_nombrealumno7']);
   if (!empty($_POST['user_gradoalumno7']))
       add_user_meta($user_id, 'user_gradoalumno7', $_POST['user_gradoalumno7']);
   if (!empty($_POST['user_edadalumno7']))
       add_user_meta($user_id, 'user_edadalumno7', $_POST['user_edadalumno7']);
   if (!empty($_POST['user_generoalumno7']))
       add_user_meta($user_id, 'user_generoalumno7', $_POST['user_generoalumno7']);



   if (!empty($_POST['user_nombrealumno8']))
       add_user_meta($user_id, 'user_nombrealumno8', $_POST['user_nombrealumno8']);
   if (!empty($_POST['user_gradoalumno8']))
       add_user_meta($user_id, 'user_gradoalumno8', $_POST['user_gradoalumno8']);
   if (!empty($_POST['user_edadalumno8']))
       add_user_meta($user_id, 'user_edadalumno8', $_POST['user_edadalumno8']);
   if (!empty($_POST['user_generoalumno8']))
       add_user_meta($user_id, 'user_generoalumno8', $_POST['user_generoalumno8']);

}

add_action('user_register', 'tml_user_register');

add_action('show_user_profile', 'my_show_extra_profile_fields');
add_action('edit_user_profile', 'my_show_extra_profile_fields');


?>
