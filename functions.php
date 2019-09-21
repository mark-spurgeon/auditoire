<?php
/**
 * auditoire functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package auditoire
 */


if ( ! function_exists( 'auditoire_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function auditoire_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on auditoire, use a find and replace
		 * to change 'auditoire' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'auditoire', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1-categories' => esc_html__( 'Categories', 'auditoire' ),
		) );
		register_nav_menus( array(
			'menu-2-about' => esc_html__( 'About', 'auditoire' ),
		) );

		register_nav_menus( array(
			'journal-ad-links' => esc_html__( 'Journal', 'auditoire' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'auditoire_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-header', array(
			'height'   => 400,
			'width'    => 1400,
		));
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 600,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'auditoire_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function auditoire_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'auditoire_content_width', 640 );
}
add_action( 'after_setup_theme', 'auditoire_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function auditoire_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'auditoire' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'auditoire' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Post Sidebar', 'auditoire' ),
		'id'            => 'sidebar-2-post',
		'description'   => esc_html__( 'Add widgets here.', 'auditoire' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'auditoire' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'auditoire' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Index', 'auditoire' ),
		'id'            => 'index-1',
		'description'   => esc_html__( 'Add widgets here.', 'auditoire' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'auditoire_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function auditoire_scripts() {
	wp_enqueue_style( 'auditoire-style', get_stylesheet_uri() );
	wp_enqueue_style( 'auditoire-style-header', get_template_directory_uri().'/css/header.css' );
	wp_enqueue_style( 'auditoire-style-content', get_template_directory_uri().'/css/content.css' );
	wp_enqueue_style( 'auditoire-style-widgets', get_template_directory_uri().'/css/widgets.css' );

	wp_enqueue_script( 'auditoire-smoothstate', get_template_directory_uri() . '/js/jquery.smoothState.min.js', array('jquery'), '0.5.2', true );
	wp_enqueue_script( 'auditoire-navigation', get_template_directory_uri() . '/js/main.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'auditoire-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'auditoire_scripts' );

function auditoire_init_scripts() {
	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');
}
add_action('admin_enqueue_scripts', 'auditoire_init_scripts');
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Post : JOURNAL
 *  */

function auditoire_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Journal', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Numéro', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Journal'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Numéros'),
		'view_item'           => __( 'Voir les numéros'),
		'add_new_item'        => __( 'Ajouter un nouveau numéro'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le journal'),
		'update_item'         => __( 'Modifier le journal'),
		'search_items'        => __( 'Rechercher un numéro du journal'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Journal'),
		'description'         => __( 'Découvrez les derniers numéros du journal imprimé'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'journaux'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'journal', $args );

}
add_action( 'init', 'auditoire_custom_post_type', 0 );

function add_custom_meta_boxes() {  
	add_meta_box('journal_date', 'Date de publication', 'journal_date_callback', 'journal', 'normal', 'high');  
	add_meta_box('journal_attachment', 'Journal PDF', 'journal_attachment_callback', 'journal', 'normal', 'high'); 
	add_meta_box('journal_color', 'Couleur du poste', 'journal_color_callback', 'journal', 'normal', 'high');   
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');  

function journal_date_callback( $post ) {  
	wp_nonce_field(plugin_basename(__FILE__), 'journal_date_nonce');

	?>
		<input type="text" placeholder="Date" name="journal_date" id="journal_date_input" value="<?php echo get_post_meta($post->ID, 'journal_date', true) ?>" />
	<?php
}
function journal_color_callback( $post ) {  
	wp_nonce_field(plugin_basename(__FILE__), 'journal_color_nonce');

	?>
		<input data-default-color="#ffda0a" class="color-field" type="text" name="journal_color" value="<?php echo get_post_meta($post->ID, 'journal_color', true) ?>"></input>
		<script>
			jQuery(document).ready(function($){
    		$('.color-field').wpColorPicker();
			});
    </script>
	<?php
}
function journal_attachment_callback( $post ) {  
	wp_nonce_field(plugin_basename(__FILE__), 'journal_attachment_nonce');
	$meta = get_post_meta($post->ID, 'journal_attachment', true);
	$pdf_file = null;
	if (isset($meta)) {
		$pdf_file = wp_get_attachment_url($meta);
	}
	?>
	<div class="media-upload">
		<object data="<?php echo $pdf_file; ?>" type="application/pdf" width="400" height="590">
		</object>
    <table>
      <tr valign="top">
				<td><input onclick="openMedia()" class="button" type="button" value="Choisir un fichier PDF" /></td>
			</tr>
			<tr valign="top">
			</tr>
			<tr valign="top">
				<td><input style="display: none;" type="text" placeholder="Media ID [don't change this]" name="journal_attachment" id="journal_attachment_input" value="<?php echo get_post_meta($post->ID, 'journal_attachment', true) ?>" readonly /></td>
      </tr>
    </table>
	</div>
	<script>
		function openMedia() {
			metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
				title: 'hey',
				button: { text:  'Use this file' },
				});
			metaImageFrame.on('select', function() {
				var media_attachment = metaImageFrame.state().get('selection').first().toJSON();
				console.log(media_attachment);
				document.getElementById('journal_attachment_input').value = media_attachment.id;
			})
			metaImageFrame.open();
		} 
	</script>
	<?php
}

function save_custom_meta_box( $post_id ) {

	if(!wp_verify_nonce($_POST['journal_attachment_nonce'], plugin_basename(__FILE__))) {
		return $post_id;
	}

	if(!wp_verify_nonce($_POST['journal_date_nonce'], plugin_basename(__FILE__))) {
		return $post_id;
	}

	if(!wp_verify_nonce($_POST['journal_color_nonce'], plugin_basename(__FILE__))) {
		return $post_id;
	}

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if(!current_user_can('edit_page', $post_id)) {
		return $post_id;
	}

	if (isset($_POST['journal_attachment'])) {
		update_post_meta($post_id, 'journal_attachment', sanitize_text_field($_POST['journal_attachment']));     
	}
	if (isset($_POST['journal_date'])) {
		update_post_meta($post_id, 'journal_date', sanitize_text_field($_POST['journal_date']));     
	}

	if (isset($_POST['journal_color'])) {
		update_post_meta($post_id, 'journal_color', sanitize_text_field($_POST['journal_color']));     
	}
}
add_action('save_post', 'save_custom_meta_box');

flush_rewrite_rules( false );
