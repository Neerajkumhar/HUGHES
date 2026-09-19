<?php
/**
 * Site footer.
 *
 * @package Hughes_SF
 */
$hughes_sf_contact = hughes_sf_contact();
?>

<footer class="site-footer" itemscope itemtype="https://schema.org/GeneralContractor">
	<div class="site-footer__top">

		<div class="site-footer__brand">
			<p class="site-footer__name">HUGHES SF</p>
			<p class="site-footer__desc"><?php esc_html_e( 'Custom Residential Construction', 'hughes-sf' ); ?></p>
			<p class="site-footer__city"><?php echo esc_html( $hughes_sf_contact['city'] ); ?></p>
		</div>

		<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Footer', 'hughes-sf' ); ?>">
			<?php hughes_sf_primary_nav(); ?>
		</nav>

		<div class="site-footer__ext">
			<a class="site-footer__insight" href="<?php echo esc_url( $hughes_sf_contact['insight'] ); ?>" target="_blank" rel="noopener">
				<?php esc_html_e( 'INSIGHT HM', 'hughes-sf' ); ?><span aria-hidden="true"> →</span>
			</a>
			<p class="site-footer__small"><?php esc_html_e( 'Home Maintenance & Care', 'hughes-sf' ); ?></p>
		</div>

	</div>

	<div class="site-footer__contact">
		<a href="mailto:<?php echo esc_attr( $hughes_sf_contact['email'] ); ?>"><?php echo esc_html( $hughes_sf_contact['email'] ); ?></a>
		<a href="tel:<?php echo esc_attr( $hughes_sf_contact['phone_tel'] ); ?>"><?php echo esc_html( $hughes_sf_contact['phone'] ); ?></a>
		<span><?php echo esc_html( $hughes_sf_contact['address'] ); ?></span>
	</div>

	<div class="site-footer__legal">
		<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'hughes-sf' ); ?></p>
		<p class="site-footer__legal-links">
			<a href="#hero" rel="nofollow"><?php esc_html_e( 'Top', 'hughes-sf' ); ?></a>
		</p>
	</div>

	<meta itemprop="name" content="Hughes SF">
	<meta itemprop="email" content="<?php echo esc_attr( $hughes_sf_contact['email'] ); ?>">
	<meta itemprop="telephone" content="<?php echo esc_attr( $hughes_sf_contact['phone_tel'] ); ?>">
	<span itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
		<meta itemprop="streetAddress" content="180 Harbor Drive, Suite 202">
		<meta itemprop="addressLocality" content="Sausalito">
		<meta itemprop="addressRegion" content="CA">
		<meta itemprop="postalCode" content="94965">
	</span>
</footer>

<?php wp_footer(); ?>
</body>
</html>