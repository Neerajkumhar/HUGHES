<?php
/**
 * Site header.
 *
 * @package Hughes_SF
 */
$hughes_sf_contact = hughes_sf_contact();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1b1814">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<meta name="description" content="Hughes SF is a premium residential construction and custom home company in San Francisco — custom home construction, high-end renovations, remodeling, custom millwork and detailed craftsmanship, with home care continued through Insight HM.">
	<meta property="og:title" content="<?php echo esc_attr( wp_get_document_title() ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
	<meta property="og:image" content="<?php echo esc_url( hughes_sf_asset( 'img/hero.jpg' ) ); ?>">
	<meta property="og:description" content="Custom homes built with intention. Premium residential construction in San Francisco.">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'hughes-sf' ); ?></a>

<header class="site-header" id="site-header" data-header>
	<div class="site-header__inner">

		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				echo '<span class="site-logo__text">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
			}
			?>
		</a>

		<nav class="site-nav" aria-label="<?php esc_attr_e( 'Primary', 'hughes-sf' ); ?>">
			<?php hughes_sf_primary_nav(); ?>
		</nav>

		<a class="site-header__insight" href="<?php echo esc_url( $hughes_sf_contact['insight'] ); ?>" target="_blank" rel="noopener">
			<span class="site-header__insight-name"><?php esc_html_e( 'INSIGHT HM', 'hughes-sf' ); ?><span aria-hidden="true"> →</span></span>
			<span class="site-header__insight-tag"><?php esc_html_e( 'Home Maintenance & Care', 'hughes-sf' ); ?></span>
		</a>

		<button class="site-nav-toggle" data-nav-toggle aria-expanded="false" aria-controls="mobile-menu" aria-label="<?php esc_attr_e( 'Toggle menu', 'hughes-sf' ); ?>">
			<span class="site-nav-toggle__bar"></span>
			<span class="site-nav-toggle__bar"></span>
		</button>

	</div>
</header>

<div class="mobile-menu" id="mobile-menu" data-mobile-menu aria-hidden="true">
	<nav class="mobile-menu__nav" aria-label="<?php esc_attr_e( 'Mobile', 'hughes-sf' ); ?>">
		<?php hughes_sf_primary_nav(); ?>
		<a class="mobile-menu__insight" href="<?php echo esc_url( $hughes_sf_contact['insight'] ); ?>" target="_blank" rel="noopener">
			<?php esc_html_e( 'INSIGHT HM', 'hughes-sf' ); ?><span aria-hidden="true"> →</span>
			<small><?php esc_html_e( 'Home Maintenance & Care', 'hughes-sf' ); ?></small>
		</a>
		<a class="mobile-menu__contact" href="tel:<?php echo esc_attr( $hughes_sf_contact['phone_tel'] ); ?>"><?php echo esc_html( $hughes_sf_contact['phone'] ); ?></a>
	</nav>
</div>