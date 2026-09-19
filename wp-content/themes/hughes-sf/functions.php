<?php
/**
 * Hughes SF theme functions.
 *
 * @package Hughes_SF
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HUGHES_SF_VERSION', '1.0.0' );
define( 'HUGHES_SF_DIR', get_template_directory() );
define( 'HUGHES_SF_URI', get_template_directory_uri() );

/**
 * Company contact settings.
 *
 * Verified from hughessf.com / insighthm.com. All values can be overridden
 * via the WordPress Customizer (Hughes SF → Contact) without touching code.
 *
 * @return array
 */
function hughes_sf_contact() {
	$defaults = array(
		'email'      => 'david@hughessf.com',
		'phone'      => '415-463-5069',
		'phone_tel'  => '+14154635069',
		'address'    => '180 Harbor Drive, Suite 202, Sausalito, CA 94965',
		'city'       => 'San Francisco, California',
		'insight'    => 'https://insighthm.com',
		'insight_tel'=> '+14155592967',
		'insight_email' => 'david@insighthm.com',
	);

	return wp_parse_args(
		get_theme_mod( 'hughes_sf_contact', array() ),
		$defaults
	);
}

/**
 * Theme setup.
 */
function hughes_sf_setup() {
	load_theme_textdomain( 'hughes-sf', HUGHES_SF_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
		'style',
		'script',
		'navigation-widgets',
	) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'hughes-sf' ),
		'footer'  => __( 'Footer Navigation', 'hughes-sf' ),
	) );
}
add_action( 'after_setup_theme', 'hughes_sf_setup' );

/**
 * Enqueue fonts, styles and scripts.
 */
function hughes_sf_assets() {
	// Google Fonts: elegant editorial serif + clean modern sans.
	wp_enqueue_style(
		'hughes-sf-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Inter:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'hughes-sf',
		HUGHES_SF_URI . '/assets/css/hughes-sf.css',
		array( 'hughes-sf-fonts' ),
		HUGHES_SF_VERSION
	);

	wp_enqueue_script(
		'hughes-sf',
		HUGHES_SF_URI . '/assets/js/hughes-sf.js',
		array(),
		HUGHES_SF_VERSION,
		true
	);

	wp_localize_script( 'hughes-sf', 'HUGHES_SF', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'hughes_sf_assets' );

/**
 * Body classes to aid styling.
 *
 * @param array $classes Body classes.
 * @return array
 */
function hughes_sf_body_class( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'hughes-front';
	}
	return $classes;
}
add_filter( 'body_class', 'hughes_sf_body_class' );

/**
 * Customizer: store contact details centrally and expose them as editable.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function hughes_sf_customize( $wp_customize ) {
	$wp_customize->add_section( 'hughes_sf_contact_section', array(
		'title'    => __( 'Hughes SF — Contact & Links', 'hughes-sf' ),
		'priority' => 30,
	) );

	$fields = array(
		'email'         => __( 'Email', 'hughes-sf' ),
		'phone'         => __( 'Phone (display)', 'hughes-sf' ),
		'phone_tel'     => __( 'Phone (tel: link)', 'hughes-sf' ),
		'address'       => __( 'Office Address', 'hughes-sf' ),
		'city'          => __( 'Location / City line', 'hughes-sf' ),
		'insight'       => __( 'Insight HM URL', 'hughes-sf' ),
		'insight_email' => __( 'Insight HM Email', 'hughes-sf' ),
		'insight_tel'   => __( 'Insight HM Phone (tel: link)', 'hughes-sf' ),
	);

	$defaults = hughes_sf_contact();

	foreach ( $fields as $key => $label ) {
		$wp_customize->add_setting( "hughes_sf_contact[$key]", array(
			'default'           => $defaults[ $key ],
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'theme_mod',
		) );
		$wp_customize->add_control( "hughes_sf_contact[$key]", array(
			'label'   => $label,
			'section' => 'hughes_sf_contact_section',
			'type'    => 'text',
		) );
	}
}
add_action( 'customize_register', 'hughes_sf_customize' );

/**
 * Primary navigation: anchor links on the single-page front page,
 * fallback to the registered menu if one is assigned.
 */
function hughes_sf_primary_nav() {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'site-nav__list',
			'depth'          => 1,
			'fallback_cb'    => '__return_false',
		) );
		return;
	}

	$links = array(
		'#work'          => __( 'WORK', 'hughes-sf' ),
		'#capabilities'  => __( 'CAPABILITIES', 'hughes-sf' ),
		'#about'         => __( 'ABOUT', 'hughes-sf' ),
		'#process'       => __( 'PROCESS', 'hughes-sf' ),
		'#contact'       => __( 'CONTACT', 'hughes-sf' ),
	);

	echo '<ul class="site-nav__list">';
	foreach ( $links as $href => $label ) {
		printf(
			'<li class="site-nav__item"><a class="site-nav__link" href="%1$s">%2$s</a></li>',
			esc_attr( $href ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/**
 * Asset helper — resolves a local theme asset path to a URL.
 *
 * @param string $file Relative path within the theme.
 * @return string
 */
function hughes_sf_asset( $file ) {
	return HUGHES_SF_URI . '/assets/' . ltrim( $file, '/' );
}