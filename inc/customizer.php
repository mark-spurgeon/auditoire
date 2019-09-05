<?php
/**
 * auditoire Theme Customizer
 *
 * @package auditoire
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function auditoire_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* 
		Header Additions
	*/
	$wp_customize->add_section( 'header_bigbanner' , array(
		'title'      => __( 'Image: bannière', 'topolitik' ),
		'priority'   => 20,
	));
	$wp_customize->add_setting( 'header_bigbanner_bg' , array(
			'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'header_bigbanner_link' , array(
			'transport' => 'postMessage',
	));
	$wp_customize->add_setting( 'header_bigbanner_image' , array(
		'transport' => 'postMessage',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bigbanner_link_text', array(
		'label'      => __( 'Image (1400x250 px)', 'topolitik' ),
		'section'    => 'header_bigbanner',
		'settings'   => 'header_bigbanner_image',
		'priority'   => 1
	)));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bigbanner_background_color', array(
		'label'      => __( 'Couleur de fond', 'topolitik' ),
		'section'    => 'header_bigbanner',
		'settings'   => 'header_bigbanner_bg',
		'priority'   => 2
	)));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bigbanner_image_src', array(
		'label'      => __( 'URL', 'topolitik' ),
		'section'    => 'header_bigbanner',
		'settings'   => 'header_bigbanner_link',
		'priority'   => 3
	)));
	/*
	Social media
	*/ 

	$wp_customize->add_section( 'social_media' , array(
		'title'      => __( 'Réseaux sociaux', 'auditoire' ),
		'priority'   => 20,
	));
	$wp_customize->add_setting( 'social_fb' , array(
			'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_fb_text', array(
		'label'      => __( 'Facebook', 'auditoire' ),
		'section'    => 'social_media',
		'settings'   => 'social_fb',
		'priority'   => 1
	)));
	$wp_customize->add_setting( 'social_twitter' , array(
			'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_tw_text', array(
		'label'      => __( 'Twitter', 'auditoire' ),
		'section'    => 'social_media',
		'settings'   => 'social_twitter',
		'priority'   => 2
	)));
	$wp_customize->add_setting( 'social_yt' , array(
			'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_yt_text', array(
		'label'      => __( 'Youtube', 'auditoire' ),
		'section'    => 'social_media',
		'settings'   => 'social_yt',
		'priority'   => 3
	)));
	$wp_customize->add_setting( 'social_insta' , array(
			'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_inst_text', array(
		'label'      => __( 'Instagram', 'auditoire' ),
		'section'    => 'social_media',
		'settings'   => 'social_insta',
		'priority'   => 4
	)));


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'auditoire_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'auditoire_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'auditoire_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function auditoire_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function auditoire_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function auditoire_customize_preview_js() {
	wp_enqueue_script( 'auditoire-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'auditoire_customize_preview_js' );
