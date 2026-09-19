<?php
/**
 * Fallback template.
 *
 * For the front page this theme is a single-page experience —
 * see front-page.php. This template keeps the theme valid for any
 * other URL and gracefully renders page content.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_front_page() ) {
	include get_template_directory() . '/front-page.php';
	return;
}

get_header();
?>
<main id="main" class="site-main">
	<div class="container responsive-pad">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</div>
</main>
<?php
get_footer();